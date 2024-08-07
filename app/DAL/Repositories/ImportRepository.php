<?php

namespace App\DAL\Repositories;

use App\DAL\IRepositories\IImportRepository;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ImportRepository implements IImportRepository
{
    public function importCompanies($data)
    {
        ini_set('max_execution_time', 180);
        $failArray = ['item' => [], 'message' => []];
        $successArray = ['item' => [], 'message' => []];

        foreach ($data[0] as $index => $row) {
            try {
                DB::beginTransaction();
                $company = new Company();
                $company->name = $row['name'];
                $company->email = $row['email'];
                $company->phone_number = $row['phone_number'];
                $company->address = $row['address'];
                $company->scope = $row['scope'];
                $company->contract_type = $row['contract_type'];
                $company->status = $row['status'];
                $company->register_number = $row['register_number'];
                $company->contract_duration = $row['contract_duration'];
                if ($company->save()) {
                    $successArray['item'][$index + 2][] = $row;
                    $successArray['message'][$index + 2][] = 'Company is added';
                }
                DB::commit();
            } catch (\Exception $exception) {
                DB::rollBack();
                $failArray['item'][$index + 2][] = $row;
                $failArray['message'][$index + 2][] = $exception->getMessage();
            }
        }
        return [
            'failArray' => $failArray,
            'successArray' => $successArray
        ];
    }

    public function importUsers($data)
    {
        ini_set('max_execution_time', 180);
        $failArray = ['item' => [], 'message' => []];
        $successArray = ['item' => [], 'message' => []];
        foreach ($data as $index => $row) {
            try {
                DB::beginTransaction();
                $company = new User();
                $company->name = $row['name'];
                $company->email = $row['email'];
                $company->phone_number = $row['phone_number'];
                $company->national_id = $row['national_id'];
                $company->company_id = $row['company_id'];
                $company->role = $row['role'];
                $company->password = $row['password'];

                if ($company->save()) {
                    $successArray['item'][$index + 2][] = $row;
                    $successArray['message'][$index + 2][] = 'User is added';
                }
                DB::commit();
            } catch (\Exception $exception) {
                DB::rollBack();
                $failArray['item'][$index + 2][] = $row;
                $failArray['message'][$index + 2][] = $exception->getMessage();
            }
        }
        return [
            'failArray' => $failArray,
            'successArray' => $successArray
        ];
    }
}
