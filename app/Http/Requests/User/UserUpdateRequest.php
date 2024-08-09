<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'national_id' => ['required'],
            'company_id' => ['nullable', 'numeric'],
            'role' => ['required', 'numeric'],
            'password' => ['nullable','confirmed'],
        ];
    }
}
