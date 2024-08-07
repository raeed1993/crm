<?php

namespace App\DAL;

use App\DAL\IRepositories\IAuthRepository;
use App\DAL\IRepositories\ICompanyRepository;
use App\DAL\IRepositories\IImportRepository;
use App\DAL\IRepositories\IUserRepository;
use App\DAL\Repositories\AuthRepository;
use App\DAL\Repositories\CompanyRepository;
use App\DAL\Repositories\ImportRepository;
use App\DAL\Repositories\UserRepository;

class UnitOfWork implements IUnitOfWork
{
    private IAuthRepository $authRepository;
    private ICompanyRepository $companyRepository;
    private IImportRepository $importRepository;
    private IUserRepository $userRepository;

    public function getAuthRepository(): IAuthRepository
    {
        return $this->authRepository ??= new AuthRepository();
    }

    public function getCompanyRepository(): ICompanyRepository
    {
        return $this->companyRepository ??= new CompanyRepository();
    }

    public function getImportRepository(): IImportRepository
    {
        return $this->importRepository ??= new ImportRepository();
    }

    public function getUserRepository(): IUserRepository
    {
        return $this->userRepository ??= new UserRepository();
    }
}
