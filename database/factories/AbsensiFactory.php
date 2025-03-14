<?php

namespace Database\Factories;

use App\Models\Absensi;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class AbsensiFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = Absensi::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    $users = User::pluck('id')->toArray();
    $status = $this->faker->randomElement(['hadir', 'izin', 'sakit']);

    // Generate tanggal acak dalam bulan ini
    $date = Carbon::now()->startOfMonth()->addDays(rand(0, Carbon::now()->daysInMonth - 1));

    // Jam masuk antara jam 7:00 - 9:00
    $jamMasuk = Carbon::createFromTime(rand(7, 8), rand(0, 59), 0);

    // Jam pulang antara jam 16:00 - 18:00
    $jamPulang = Carbon::createFromTime(rand(16, 17), rand(0, 59), 0);

    return [
      'user_id' => $this->faker->randomElement($users),
      'tgl_absen' => $date,
      'jam_absen' => $jamMasuk->format('H:i:s'),
      'status' => $status,
      'keterangan' => $status !== 'hadir' ? $this->faker->sentence(10) : null,
      'file_foto' =>'foto_' . $this->faker->randomNumber(5) . '.jpg',
      'lokasi' => $status === 'hadir' ? $this->faker->address() : null,
      'longitud' => $status === 'hadir' ? $this->faker->longitude() : null,
      'latitud' => $status === 'hadir' ? $this->faker->latitude() : null,
      'created_at' => $date,
      'updated_at' => $date
    ];
  }
}
