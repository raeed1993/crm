<?php

namespace App\DAL;


use App\DAL\IRepositories\IAuthRepository;

interface IUnitOfWork
{
    public function getAuthRepository(): IAuthRepository;
}
