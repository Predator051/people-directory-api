<?php

namespace App\Http\Controllers;

use App\Http\Requests\Churches\CreateChurchRequest;
use App\Http\Requests\Churches\UpdateChurchRequest;
use App\Models\Church;
use Illuminate\Http\JsonResponse;

/// TODO replace data files on Request object
class ChurchController extends Controller
{
    public function store(CreateChurchRequest $request): JsonResponse
    {
        $church = Church::create($request->all())->load(['union']);

        return response()->json($church);
    }

    public function index(): JsonResponse
    {
        $churches = Church::with(['union', 'address'])->get();

        return response()->json($churches);
    }

    public function get(int $id): JsonResponse
    {
        return response()->json(Church::with(['union', 'address'])->findOrFail($id));
    }

    public function update(int $id, UpdateChurchRequest $data): JsonResponse
    {
        $union = Church::query()->where(['id' => $id])->update($data->all());

        return response()->json(Church::find($id));
    }
}
