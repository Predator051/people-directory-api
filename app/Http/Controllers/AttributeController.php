<?php

namespace App\Http\Controllers;

use App\Data\AttributeData;
use App\Enums\AttributeType;
use App\Models\Attribute;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/// TODO replace data files on Request object
class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): mixed
    {
        $filterByTitle = $request->query('title', '');

        return AttributeData::collect(
            Attribute::query()
                ->whereLike('title', '%' . $filterByTitle . '%')
                ->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AttributeData $data): AttributeData
    {
        return AttributeData::from(Attribute::create($data->all()));
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
