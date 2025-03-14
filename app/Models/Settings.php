<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    //
    protected $table = 'settings';
    protected $fillable = ['jam_masuk', 'jam_pulang', 'longitude', 'latitude', 'lokasi', 'radius'];
}
