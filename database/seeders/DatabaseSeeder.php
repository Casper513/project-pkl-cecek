<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Absensi;
use App\Models\Karyawan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat 50 user terlebih dahulu
        User::factory(8)->create();
        Karyawan::factory(8)->create();
        Absensi::factory(300)->create();
    }
}
