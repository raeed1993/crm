<?php

namespace App\DAL;


use App\DAL\IRepositories\IAuthRepository;
use App\DAL\IRepositories\ICompanyRepository;

interface IUnitOfWork
{
    public function getAuthRepository(): IAuthRepository;
    public function getCompanyRepository(): ICompanyRepository;
}
