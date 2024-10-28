<?php

namespace App\Services;

use App\Contracts\UserContract;
use App\Data\UserData;
use App\Models\User;

class UserService implements UserContract
{
    public function create(UserData $dto): User
    {
        return User::create($dto->toArray());
    }

    public function login(UserData $dto): string|bool
    {
        return auth()->attempt($dto->toArray());
    }

    public function logout(): void
    {
        auth()->logout();
    }
}
