<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'user_id',
        'task_id',
        'start_time',
        'end_time',
        'duration',
    ];
    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];
}
