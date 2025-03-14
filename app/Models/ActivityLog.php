<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    //
    protected $table = 'activity_logs';

    protected $fillable = ['user_id', 'action', 'description', 'ip_address', 'user_agent', 'data', 'created_at'];
}
