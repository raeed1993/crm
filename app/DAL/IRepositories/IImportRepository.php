<?php

namespace App\DAL\IRepositories;

interface IImportRepository
{
    public function importCompanies($data);
    public function importUsers($data);
}
