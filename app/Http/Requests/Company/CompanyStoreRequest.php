<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class CompanyStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'phone_number' => ['required'],
            'email' => ['required', 'email'],
            'register_number' => ['required'],
            'address' => ['required'],
            'contract_duration' => ['required', 'numeric'],
            'scope' => ['required'],
                'contract_type' => ['required'],
            'status' => ['required', 'numeric'],

            'admin_name' => ['required'],
            'admin_phone_number' => ['required'],
            'admin_email' => ['required', 'email'],
            'admin_national_id' => ['required'],
            'admin_password' => ['required', 'confirmed'],
        ];
    }
}
