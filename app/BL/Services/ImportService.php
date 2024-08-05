<?php

namespace App\BL\Services;

use App\BL\IServices\IImportService;
use App\BL\UnitOfWorkService;
use App\Import\CompanyImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class ImportService extends UnitOfWorkService  implements IImportService
{
    public function importCompanies(Request $request)
    {
        $data = Excel::toArray(new CompanyImport, $request->file('companies'));
        return $this->unitOfWork()->getImportRepository()->importCompanies($data);
    }
}
