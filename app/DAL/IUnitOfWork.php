<?php

namespace App\DAL;


use App\DAL\IRepositories\IAuthRepository;
use App\DAL\IRepositories\ICompanyRepository;
use App\DAL\IRepositories\IImportRepository;
use App\DAL\IRepositories\ITaskRepository;
use App\DAL\IRepositories\IUserRepository;

interface IUnitOfWork
{
    public function getAuthRepository(): IAuthRepository;
    public function getCompanyRepository(): ICompanyRepository;
    public function getImportRepository(): IImportRepository;
    public function getUserRepository(): IUserRepository;
    public function getTaskRepository(): ITaskRepository;
}
