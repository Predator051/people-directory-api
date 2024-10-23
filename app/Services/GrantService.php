<?php

namespace App\Services;

use App\Contracts\GrantContract;
use App\Dto\CreateGrantDto;
use App\Dto\UpdateGrantDto;
use App\Models\Grant;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;

class GrantService implements GrantContract
{
    public function store(CreateGrantDto $dto): Grant
    {
        return Grant::create($dto->toArray());
    }

    public function update(UpdateGrantDto $dto): int
    {
        return Grant::query()
            ->where(['id' => $dto->getId()])
            ->update(Arr::except($dto->toArray(), 'id'));
    }

    public function all(): Collection
    {
        return Grant::all();
    }
}
