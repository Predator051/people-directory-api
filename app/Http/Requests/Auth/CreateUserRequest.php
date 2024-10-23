<?php

namespace App\Http\Requests\Auth;

use App\Dto\CreateUserDto;
use App\Exceptions\RegisterUserException;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateUserRequest extends FormRequest
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'people_id' => ['required', 'numeric', 'unique:users', Rule::exists('people', 'id')]
        ];
    }

    /**
     * @throws RegisterUserException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new RegisterUserException(response()->json($validator->errors(), 422));
    }

    public function Dto(): CreateUserDto
    {
        return CreateUserDto::fromArray($this->all());
    }
}
