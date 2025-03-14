<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'tgl_absen', 'jam_absen', 'status'];

    /**
     * Relasi ke model User (Setiap absen dimiliki oleh satu user).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
