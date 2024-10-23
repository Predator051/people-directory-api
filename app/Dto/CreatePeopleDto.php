<?php

namespace App\Dto;

use App\Contracts\DtoContract;

readonly class CreatePeopleDto implements DtoContract
{
    public function __construct(
        private array $attributes
    ) {
    }

    public static function fromArray(array $data): CreatePeopleDto
    {
        return new self(
            $data['attributes']
        );
    }

    public function toArray(): array
    {
        return [
            'attributes' => $this->attributes
        ];
    }

    public function getAttributes(): array
    {
        return $this->attributes;
    }
}
