<?php

namespace App\Http\Controllers;

use App\Http\Requests\Unions\CreateUnionRequest;
use App\Http\Requests\Unions\UpdateUnionRequest;
use App\Models\Union;
use Illuminate\Http\JsonResponse;

/// TODO replace data files on Request object
class UnionController extends Controller
{
    public function store(CreateUnionRequest $request): JsonResponse
    {
        return response()->json(Union::create($request->all()));
    }

    public function index(): JsonResponse
    {
        return response()->json(Union::all());
    }

    public function get(int $id): JsonResponse
    {
        return response()->json(Union::findOrFail($id));
    }

    public function update(
        int $id,
        UpdateUnionRequest $request
    ): JsonResponse {
        $union = Union::query()->where(['id' => $id])->update($request->all());

        return response()->json(Union::find($id));
    }
}
