<?php

namespace App\DAL\IRepositories;

interface IAuthRepository
{
    public function findByEmail($data);
}
