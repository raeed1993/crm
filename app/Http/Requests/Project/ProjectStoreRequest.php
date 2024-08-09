<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;

class ProjectStoreRequest extends FormRequest
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
            'contract_duration' => ['required'],
            'status' => ['required', 'email'],
            'start_date' => ['required'],
            'end_date' => ['nullable', 'numeric'],
            'type' => ['required', 'numeric'],
            'desc' => ['required'],
            'priority' => ['required'],
            'test_url' => ['required'],
            'real_url' => ['required'],
        ];
    }
}
