<?php

namespace App\Contracts;

use App\Data\UserData;
use App\Models\User;

interface UserContract
{
    public function create(UserData $dto): User;

    public function login(UserData $dto): string|bool;

    public function logout(): void;
}
