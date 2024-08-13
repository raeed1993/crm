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

    public function task()
    {
        return $this->hasOne(Task::class, 'id', 'task_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function getTaskObjectAttribute()
    {
        $task = $this->task;
        if (!$task) {
            return null;
        }
        return ['name' => $task->title, 'id' => $task->id];
    }

    public function getUserObjectAttribute()
    {
        $user = $this->user;
        if (!$user) {
            return null;
        }
        return ['name' => $user->name, 'id' => $user->id];
    }

    public function toArray()
    {
        $array = parent::toArray();
        $array['user'] = $this->getUserObjectAttribute();
        $array['task'] = $this->getTaskObjectAttribute();
        return $array;
    }
}
