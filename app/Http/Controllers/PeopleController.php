<?php

namespace App\Http\Controllers;

use App\Contracts\PeopleContract;
use App\Data\PeopleData;
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

    public function create(PeopleData $data): JsonResponse
    {
        $people = $this->personService->create($data);

        return response()->json($people);
    }
}
