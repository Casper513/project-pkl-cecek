<?php

namespace Database\Factories;

use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Karyawan>
 */
class KaryawanFactory extends Factory
{
  protected $model = Karyawan::class;

  public function definition()
  {
    return [
      'user_id' => User::factory(), // Buat user otomatis
      'TMT' => $this->faker->date(),
      'nama_lengkap' => $this->faker->name(),
      'jabatan' => $this->faker->jobTitle(),
    ];
  }
}
