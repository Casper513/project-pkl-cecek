<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Jika tidak ada user login, redirect atau berikan pesan error
        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $today = Carbon::now()->format('Y-m-d');
        $bulanIni = Carbon::now()->format('m');
        $tahunIni = Carbon::now()->format('Y');

        // Admin melihat semua data, user hanya melihat data sendiri
        if ($user->role === 'admin') {
            $todayPresence = Absensi::all(); // Semua data absensi
            $absensis = Absensi::where('status', 'hadir')
                ->whereMonth('tgl_absen', $bulanIni)
                ->whereYear('tgl_absen', $tahunIni)
                ->get();
        } else {
            $todayPresence = Absensi::where('user_id', $user->id)->get();
            $absensis = Absensi::where('user_id', $user->id)
                ->where('status', 'hadir')
                ->whereMonth('tgl_absen', $bulanIni)
                ->whereYear('tgl_absen', $tahunIni)
                ->get();
        }

        // Hitung summary status absensi bulan ini
        // Hitung summary status absensi bulan ini
        if ($user->role === 'admin') {
            $summary = (object) [
                'hadir' => Absensi::where('status', 'hadir')
                    ->whereMonth('tgl_absen', $bulanIni)
                    ->whereYear('tgl_absen', $tahunIni)
                    ->count(),

                'izin' => Absensi::where('status', 'izin')
                    ->whereMonth('tgl_absen', $bulanIni)
                    ->whereYear('tgl_absen', $tahunIni)
                    ->count(),

                'sakit' => Absensi::where('status', 'sakit')
                    ->whereMonth('tgl_absen', $bulanIni)
                    ->whereYear('tgl_absen', $tahunIni)
                    ->count(),

                'terlambat' => Absensi::whereMonth('tgl_absen', $bulanIni)
                    ->whereYear('tgl_absen', $tahunIni)
                    ->where(function ($query) {
                        $query->whereTime('jam_absen', '>', '08:30:00')
                            ->where('status', 'hadir');
                    })
                    ->count()
            ];
        } else {
            $summary = (object) [
                'hadir' => Absensi::where('user_id', $user->id)
                    ->where('status', 'hadir')
                    ->whereMonth('tgl_absen', $bulanIni)
                    ->whereYear('tgl_absen', $tahunIni)
                    ->count(),

                'izin' => Absensi::where('user_id', $user->id)
                    ->where('status', 'izin')
                    ->whereMonth('tgl_absen', $bulanIni)
                    ->whereYear('tgl_absen', $tahunIni)
                    ->count(),

                'sakit' => Absensi::where('user_id', $user->id)
                    ->where('status', 'sakit')
                    ->whereMonth('tgl_absen', $bulanIni)
                    ->whereYear('tgl_absen', $tahunIni)
                    ->count(),

                'terlambat' => Absensi::where('user_id', $user->id)
                    ->whereMonth('tgl_absen', $bulanIni)
                    ->whereYear('tgl_absen', $tahunIni)
                    ->where(function ($query) {
                        $query->whereTime('jam_absen', '>', '08:30:00')
                            ->where('status', 'hadir');
                    })
                    ->count()
            ];
        }


        // Data untuk leaderboard (10 user dengan kehadiran terbanyak)
        $leaderboard = User::select('users.id', 'users.name', DB::raw('COUNT(absensis.id) as total_hadir'))
            ->leftJoin('absensis', function ($join) use ($bulanIni, $tahunIni) {
                $join->on('users.id', '=', 'absensis.user_id')
                    ->where('absensis.status', '=', 'hadir')
                    ->whereMonth('absensis.tgl_absen', '=', $bulanIni)
                    ->whereYear('absensis.tgl_absen', '=', $tahunIni);
            })
            ->groupBy('users.id', 'users.name')
            ->orderBy('total_hadir', 'desc')
            ->limit(10)
            ->get();

        // Ambil pengaturan sistem
        $setting = Settings::first();

        return view('Dashboard.dashboard', compact('todayPresence', 'absensis', 'summary', 'leaderboard', 'setting'));
    }


    public function monthlyReport(Request $request)
    {
        $bulan = $request->input('bulan', Carbon::now()->format('m'));
        $tahun = $request->input('tahun', Carbon::now()->format('Y'));

        $users = User::all();
        $reports = [];

        foreach ($users as $user) {
            $hadir = Absensi::where('user_id', $user->id)
                ->where('status', 'hadir')
                ->whereMonth('tgl_absen', $bulan)
                ->whereYear('tgl_absen', $tahun)
                ->count();

            $izin = Absensi::where('user_id', $user->id)
                ->where('status', 'izin')
                ->whereMonth('tgl_absen', $bulan)
                ->whereYear('tgl_absen', $tahun)
                ->count();

            $sakit = Absensi::where('user_id', $user->id)
                ->where('status', 'sakit')
                ->whereMonth('tgl_absen', $bulan)
                ->whereYear('tgl_absen', $tahun)
                ->count();

            $terlambat = Absensi::where('user_id', $user->id)
                ->whereMonth('tgl_absen', $bulan)
                ->whereYear('tgl_absen', $tahun)
                ->where(function ($query) {
                    $query->whereTime('jam_absen', '>', '08:30:00')
                        ->where('status', 'hadir');
                })
                ->count();

            $reports[] = [
                'user' => $user,
                'hadir' => $hadir,
                'izin' => $izin,
                'sakit' => $sakit,
                'terlambat' => $terlambat,
                'total' => $hadir + $izin + $sakit,
            ];
        }

        return view('database.monthly_report', compact('reports', 'bulan', 'tahun'));
    }
}
