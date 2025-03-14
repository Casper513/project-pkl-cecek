<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    // Fungsi untuk menampilkan dan mengupdate pengaturan
    public function settings()
    {
        $setting = Settings::first();
        return view('database.settings', compact('setting'));
    }

    // Fungsi untuk menyimpan pengaturan
    public function updateSettings(Request $request)
    {
        $request->validate([
            'jam_masuk' => 'required',
            'jam_pulang' => 'required',
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric',
            'lokasi' => 'required|string',
            'radius' => 'required|integer',
        ]);

        $setting = Settings::first();

        if (!$setting) {
            Settings::create([
                'jam_masuk' => $request->jam_masuk,
                'jam_pulang' => $request->jam_pulang,
                'longitude' => $request->longitude,
                'latitude' => $request->latitude,
                'lokasi' => $request->lokasi,
                'radius' => $request->radius,
            ]);
        } else {
            $setting->update([
                'jam_masuk' => $request->jam_masuk,
                'jam_pulang' => $request->jam_pulang,
                'longitude' => $request->longitude,
                'latitude' => $request->latitude,
                'lokasi' => $request->lokasi,
                'radius' => $request->radius,
            ]);
        }

        return redirect()->route('database.settings')->with('success', 'Pengaturan berhasil disimpan');
    }
}
