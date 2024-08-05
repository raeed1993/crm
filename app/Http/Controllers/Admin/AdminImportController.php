<?php

namespace App\Http\Controllers\Admin;

use App\BL\IServices\IImportService;
use App\Http\Controllers\Controller;
use App\Import\CompanyImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AdminImportController extends Controller
{
    private $service = null;

    public function __construct(IImportService $service)
    {
        $this->service = $service;
    }

    public function importCompanies(Request $request)
    {
        //validate
        Excel::import(new CompanyImport, $request->file('companies'));

        //import
        $arrayIndexes = $this->service->importCompanies($request);
        if (count($arrayIndexes['failArray']['message']) > 0)
            return response()->json([
                'data' => $arrayIndexes,
                'message' => 'there are some rows not added',
                'status' => false,
            ]);
        return response()->json([
            'data' => $arrayIndexes,
            'message' => 'success',
            'status' => true,
        ]);
    }
}
