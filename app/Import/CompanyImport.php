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
            '*.phone_number' => ['required', 'string'],
            '*.email' => ['required', 'string'],
            '*.register_number' => ['nullable', 'string'],
            '*.address' => ['nullable', 'string'],
            '*.contract_duration' => ['nullable', 'string'],
            '*.scope' => ['nullable', 'string'],
            '*.contract_type' => ['nullable', 'string'],
            '*.status' => ['nullable', 'string'],
        ])->validate();
    }
}
