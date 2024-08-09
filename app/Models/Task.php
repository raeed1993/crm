<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',
        'desc',
        'status',
        'start_date',
        'end_date',
        'project_id',
        'user_id',
        'priority',
        'duration',
        'duration_type',
    ];


    public static $STATUS = [
        0 => 'todo',
        1 => 'in progress',
        2 => 'done',
        3 => 'hold',
        4 => 'archived',
    ];
    public static $DURATIONTYPE = [
        0 => 'hour',
        1 => 'day',
        2 => 'week',
        3 => 'month',
        4 => 'year',
    ];

    public static $STATUSLABLE = [
        'todo' => 0,
        'in progress' => 1,
        'done' => 2,
        'hold' => 3,
        'archived' => 4
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }

}
