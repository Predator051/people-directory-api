<?php

namespace App\Http\Controllers;

use App\Data\ChurchData;
use App\Models\Church;

class ChurchController extends Controller
{
    public function store(ChurchData $data): ChurchData
    {
        $church = Church::create($data->all())->load(['union']);

        return ChurchData::from($church);
    }

    public function index(): mixed
    {
        $churches = Church::with(['union', 'address'])->get();

        return ChurchData::collect($churches);
    }

    public function get(int $id): ChurchData
    {
        return ChurchData::from(Church::with(['union', 'address'])->findOrFail($id));
    }

    public function update(ChurchData $data): ChurchData
    {
        $union = Church::query()->where(['id' => $data->id])->update(
            [
                'name' => $data->name,
                'address_id' => $data->address_id,
                'union_id' => $data->union_id
            ],
        );

        return $data;
    }
}
