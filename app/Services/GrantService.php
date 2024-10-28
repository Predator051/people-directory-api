<?php

namespace App\Services;

use App\Contracts\GrantContract;
use App\Data\GrantData;
use App\Models\Grant;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;

class GrantService implements GrantContract
{
    public function store(GrantData $dto): Grant
    {
        return Grant::create($dto->toArray());
    }

    public function update(GrantData $dto): int
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
