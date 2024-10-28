<?php

namespace App\Contracts;

use App\Data\GrantData;
use App\Models\Grant;
use Illuminate\Database\Eloquent\Collection;

interface GrantContract
{
    public function store(GrantData $dto): Grant;

    public function update(GrantData $dto): int;

    public function all(): Collection;
}
