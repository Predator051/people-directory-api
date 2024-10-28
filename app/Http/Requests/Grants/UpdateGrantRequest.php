<?php

namespace App\Http\Requests\Grants;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Validation\Rule;

class UpdateGrantRequest extends CreateGrantRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            ...parent::rules(),
            'id' => ['required', 'numeric', Rule::exists('grants')],
        ];
    }
}
