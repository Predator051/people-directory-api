<?php

namespace App\Http\Controllers;

use App\Http\Requests\Addresses\CreateAddressRequest;
use App\Models\Address;

class AddressController extends Controller
{
    public function store(CreateAddressRequest $request)
    {
        $user = Address::create($request->all());

        return response()->json($user);
    }

    public function index()
    {
        $unions = Address::all();

        return response()->json($unions);
    }
}
