<?php

namespace App\Contracts;

use App\Dto\CreateUserDto;
use App\Dto\LoginUserDto;
use App\Models\User;

interface UserContract
{
    public function create(CreateUserDto $dto): User;

    public function login(LoginUserDto $dto): string|bool;

    public function logout(): void;
}
