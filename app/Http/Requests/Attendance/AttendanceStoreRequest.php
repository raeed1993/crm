<?php

namespace App\Http\Requests\Attendance;

use Illuminate\Foundation\Http\FormRequest;

class AttendanceStoreRequest extends FormRequest
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
            'items' => ['required', 'array'],
            'items.*.task_id' => ['required', 'numeric'],
            'items.*.user_id' => ['required', 'numeric'],
            'items.*.duration' => ['required'],
            'items.*.start_time' => ['required'],
            'items.*.end_time' => ['required'],
        ];
    }
}
