<?php

namespace App\Http\Controllers;

use App\Contracts\GrantContract;
use App\Http\Requests\Grants\CreateGrantRequest;
use App\Http\Requests\Grants\UpdateGrantRequest;

class GrantController extends Controller
{
    public function __construct(private readonly GrantContract $grantService)
    {
    }

    public function store(CreateGrantRequest $request)
    {
        return response()->json($this->grantService->store($request->dto()));
    }

    public function update(UpdateGrantRequest $request)
    {
        return response()->json($this->grantService->update($request->dto()));
    }

    public function index()
    {
        return response()->json($this->grantService->all());
    }
}
