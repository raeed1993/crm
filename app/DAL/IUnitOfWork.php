<?php

namespace App\DAL;


use App\DAL\IRepositories\IAuthRepository;
use App\DAL\IRepositories\ICompanyRepository;
use App\DAL\IRepositories\IImportRepository;

interface IUnitOfWork
{
    public function getAuthRepository(): IAuthRepository;
    public function getCompanyRepository(): ICompanyRepository;
    public function getImportRepository(): IImportRepository;
}
