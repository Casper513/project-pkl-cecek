<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawan';

    protected $fillable = [
        'user_id',
        'TMT',
        'nama_lengkap',
        'jabatan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
