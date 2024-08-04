<?php

namespace App\DAL;

use App\DAL\IRepositories\IAuthRepository;
use App\DAL\Repositories\AuthRepository;

class UnitOfWork implements IUnitOfWork
{
    private IAuthRepository $authorRepository;

    public function getAuthRepository(): IAuthRepository
    {
        return $this->authorRepository ??= new AuthRepository();
    }
}
