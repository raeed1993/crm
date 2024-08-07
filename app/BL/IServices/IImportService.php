<?php

namespace App\BL\IServices;

use Illuminate\Http\Request;

interface IImportService
{
    public function importCompanies(Request $request);
    public function importUsers(Request $request);
}
