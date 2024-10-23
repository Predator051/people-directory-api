<?php

namespace App\Http\Controllers;

use App\Data\UnionData;
use App\Models\Union;

class UnionController extends Controller
{
    public function store(UnionData $data): UnionData
    {
        return UnionData::from(Union::create($data->all()));
    }

    public function index(): mixed
    {
        return UnionData::collect(Union::all());
    }

    public function get(int $id): UnionData
    {
        return UnionData::from(Union::findOrFail($id));
    }

    public function update(
        UnionData $data
    ): UnionData {
        $union = Union::query()->where(['id' => $data->id])->update($data->all());

        return UnionData::from(Union::find($data->id));
    }
}
