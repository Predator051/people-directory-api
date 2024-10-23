<?php

namespace App\Contracts;

use App\Data\PeopleData;
use App\Models\People;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface PeopleContract
{
    public function create(PeopleData $data): People;

    public function allByPaginate(): LengthAwarePaginator;

    public function getById(int $id): People;
}
