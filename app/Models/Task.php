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

//    public static $statusName = [
//
//    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }

//    public function getStatusLabelAttribute()
//    {
//
//    }
}
