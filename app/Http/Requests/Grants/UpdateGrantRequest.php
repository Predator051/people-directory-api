<?php

namespace App\Http\Requests\Grants;

use App\Contracts\DtoContract;
use App\Dto\UpdateGrantDto;
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

    public function dto(): DtoContract
    {
        return UpdateGrantDto::fromArray($this->all());
    }
}
