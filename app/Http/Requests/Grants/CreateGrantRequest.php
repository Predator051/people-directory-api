<?php

namespace App\Http\Requests\Grants;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateGrantRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'allow_read' => ['required', 'boolean'],
            'allow_write' => ['required', 'boolean'],
            'allow_history_read' => ['required', 'boolean'],
            'decline_read' => ['required', 'boolean'],
            'decline_write' => ['required', 'boolean'],
            'decline_history_read' => ['required', 'boolean'],
        ];
    }
}
