<?php

namespace App\Import;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CompanyImport implements ToCollection, WithHeadingRow
{
    use Importable;


    public function collection(Collection $rows)
    {

        Validator::make($rows->toArray(), [
            '*.name' => ['required'],
            '*.phone_number' => ['required'],
            '*.email' => ['required', 'email'],
            '*.register_number' => ['nullable'],
            '*.address' => ['nullable'],
            '*.contract_duration' => ['nullable'],
            '*.scope' => ['nullable'],
            '*.contract_type' => ['nullable'],
            '*.status' => ['nullable'],
        ])->validate();
    }
}
