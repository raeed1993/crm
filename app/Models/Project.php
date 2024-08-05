<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'contract_duration',
        'start_date',
        'end_date',
        'status',
        'type',
        'priority',
        'desc',
        'test_url',
        'real_url',
    ];
}
