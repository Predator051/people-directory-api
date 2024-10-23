<?php

namespace App\Services;

use App\Contracts\UserContract;
use App\Dto\CreateUserDto;
use App\Dto\LoginUserDto;
use App\Models\User;

class UserService implements UserContract
{
    public function create(CreateUserDto $dto): User
    {
        return User::create($dto->toArray());
    }

    public function login(LoginUserDto $dto): string|bool
    {
        return auth()->attempt($dto->toArray());
    }

    public function logout(): void
    {
        auth()->logout();
    }
}
