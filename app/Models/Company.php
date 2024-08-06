<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    protected $fillable = [
        'name',
        'phone_number',
        'email',
        'register_number',
        'address',
        'contract_duration',
        'scope',
        'contract_type',
        'status',
    ];
}
