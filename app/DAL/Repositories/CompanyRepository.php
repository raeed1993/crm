<?php

namespace App\DAL\Repositories;

use App\DAL\IRepositories\IAuthRepository;
use App\DAL\IRepositories\ICompanyRepository;
use App\Models\Company;
use App\Models\User;
use App\Traits\CRUDGenericRepositoryTraits;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class CompanyRepository implements ICompanyRepository
{
    use CRUDGenericRepositoryTraits;

    private $model = Company::class;
}
