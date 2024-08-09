<?php

namespace App\Import;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UserImport implements ToCollection, WithHeadingRow
{
    use Importable;


    public function collection(Collection $rows)
    {
        Validator::make($rows->toArray(), [
            '*.name' => ['required'],
            '*.phone_number' => ['required', 'string'],
            '*.email' => ['required', 'string'],
            '*.national_id' => ['required', 'string'],
            '*.company_id' => ['nullable', 'string'],
            '*.password' => ['required', 'string'],

        ])->validate();
    }
}
