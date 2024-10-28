<?php

namespace App\Http\Controllers;

use App\Enums\AttributeType;
use App\Http\Requests\Attributes\CreateAttributeRequest;
use App\Models\Attribute;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $filterByTitle = $request->query('title', '');

        return response()->json(
            Attribute::query()
                ->whereLike('title', '%' . $filterByTitle . '%')
                ->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateAttributeRequest $request): JsonResponse
    {
        return response()->json(Attribute::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function types(): JsonResponse
    {
        return response()->json(AttributeType::cases());
    }
}
