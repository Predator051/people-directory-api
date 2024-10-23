<?php

namespace App\Dto;

use App\Contracts\DtoContract;

readonly class CreateUserDto implements DtoContract
{
    public function __construct(
        private string $name,
        private string $email,
        private string $password,
        private int $peopleId
    ) {
    }

    public static function fromArray(array $data): CreateUserDto
    {
        return new self(
            $data['name'],
            $data['email'],
            $data['password'],
            $data['people_id']
        );
    }

    public function toArray(): array
    {
        return [
            'email' => $this->email,
            'name' => $this->name,
            'password' => $this->password,
            'people_id' => $this->peopleId
        ];
    }
}
