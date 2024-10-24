<?php

namespace App\Http\Controllers;

use App\Http\Requests\Roles\CreateRoleRequest;
use App\Http\Requests\Roles\UpdateRoleRequest;
use App\Models\Role;

/// TODO replace data files on Request object
class RoleController extends Controller
{
    public function store(CreateRoleRequest $request)
    {
        return response()->json(Role::create($request->all()));
    }

    public function update(UpdateRoleRequest $request)
    {
        $grant = Role::query()->where(['id' => $request->all(['id'])])->update($request->all([
            'name',
        ]));

        return response()->json($grant);
    }

    public function index()
    {
        return response()->json(Role::all());
    }
}
