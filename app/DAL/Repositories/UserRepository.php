<?php

namespace App\DAL\Repositories;


use App\DAL\IRepositories\IUserRepository;
use App\Models\User;
use App\Traits\CRUDGenericRepositoryTraits;

class UserRepository implements IUserRepository
{
    use CRUDGenericRepositoryTraits;

    private $model = User::class;
}
