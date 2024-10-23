<?php

namespace App\Contracts;

use App\Dto\CreateGrantDto;
use App\Dto\UpdateGrantDto;
use App\Models\Grant;
use Illuminate\Database\Eloquent\Collection;

interface GrantContract
{
    public function store(CreateGrantDto $dto): Grant;

    public function update(UpdateGrantDto $dto): int;

    public function all(): Collection;
}
