<?php

namespace App\Http\Controllers;

use App\Contracts\PeopleContract;
use App\Data\PeopleData;
use App\Http\Requests\People\CreatePeopleRequest;
use Illuminate\Http\JsonResponse;

class PeopleController extends Controller
{
    public function __construct(private readonly PeopleContract $personService)
    {
    }

    public function get(int $id): JsonResponse
    {
        return response()->json($this->personService->getById($id));
    }

    public function index(): JsonResponse
    {
        return response()->json($this->personService->allByPaginate());
    }

    public function create(CreatePeopleRequest $request): JsonResponse
    {
        ///TODO fix
        $people = $this->personService->create(PeopleData::from($request->all()));

        return response()->json($people);
    }
}
