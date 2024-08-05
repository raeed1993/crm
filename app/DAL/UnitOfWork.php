<?php

namespace App\DAL;

use App\DAL\IRepositories\IAuthRepository;
use App\DAL\IRepositories\ICompanyRepository;
use App\DAL\Repositories\AuthRepository;
use App\DAL\Repositories\CompanyRepository;

class UnitOfWork implements IUnitOfWork
{
    private IAuthRepository $authRepository;
    private ICompanyRepository $companyRepository;

    public function getAuthRepository(): IAuthRepository
    {
        return $this->authRepository ??= new AuthRepository();
    }

    public function getCompanyRepository(): ICompanyRepository
    {
        return $this->companyRepository ??= new CompanyRepository();
    }
}
