<?php

namespace App\Http\Requests\People;

use App\Rules\UniqueAttributes;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreatePeopleRequest extends FormRequest
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
            'attributes' => ['required', 'array', new UniqueAttributes()],
            'attributes.*.id' => 'required|numeric',
            'attributes.*.value' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (is_null($value)) {
                        $fail("The {$attribute} cannot be null.");

                        return;
                    }

                    if (!is_string($value) && !is_bool($value) && !is_numeric($value) && !$this->isDate($value)) {
                        $fail("The {$attribute} must be a valid string, boolean, numeric or a date.");
                    }

                    if (is_string($value) && trim($value) === '') {
                        $fail("The {$attribute} cannot be an empty string.");
                    }
                }
            ],
        ];
    }

    private function isDate($value): bool
    {
        return strtotime($value) !== false;
    }
}
