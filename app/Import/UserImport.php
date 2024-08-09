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
            '*.phone_number' => ['required'],
            '*.email' => ['required', 'email'],
            '*.national_id' => ['required'],
            '*.company_id' => ['nullable'],
            '*.password' => ['required'],
        ])->validate();
    }
}
