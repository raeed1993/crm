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
        'company_id',
    ];
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime'
    ];

    public function company()
    {
        return $this->hasOne(Company::class, 'id', 'company_id');
    }

    public function getCompanyObjectAttribute()
    {
        $company = $this->company;
        if (!$company) {
            return null;
        }
        return ['name' => $company->name, 'id' => $company->id];
    }

    public function toArray()
    {
        $array = parent::toArray();
        $array['company'] = $this->getCompanyObjectAttribute();
        return $array;
    }
}
