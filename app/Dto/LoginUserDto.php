<?php

namespace App\Dto;

use App\Contracts\DtoContract;

readonly class LoginUserDto implements DtoContract
{
    public function __construct(
        private string $email,
        private string $password
    ) {
    }

    public static function fromArray(array $data): LoginUserDto
    {
        return new self(
            $data['email'],
            $data['password']
        );
    }

    public function toArray(): array
    {
        return [
            'email' => $this->email,
            'password' => $this->password
        ];
    }
}
