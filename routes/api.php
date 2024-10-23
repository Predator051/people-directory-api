<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\ChurchController;
use App\Http\Controllers\GrantController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UnionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['api'])
    ->prefix('v1')
    ->group(function () {
        Route::post('/user/register', [UserController::class, 'store'])->middleware(['jwt.auth']);
        Route::post('/user/login', [UserController::class, 'login']);
        Route::post('/user/refresh', [UserController::class, 'refresh'])->middleware(['jwt.auth']);
        Route::delete('/user/logout', [UserController::class, 'logout'])->middleware(['jwt.auth']);
        Route::get('/user', [UserController::class, 'me'])->middleware(['jwt.auth']);

        Route::post('/union/create', [UnionController::class, 'store'])->middleware(['jwt.auth']);
        Route::get('/union', [UnionController::class, 'index'])->middleware(['jwt.auth']);
        Route::put('/union/{id}', [UnionController::class, 'update'])->middleware(['jwt.auth']);
        Route::get('/union/{id}', [UnionController::class, 'get'])->middleware(['jwt.auth']);

        Route::post('/address/create', [AddressController::class, 'store'])->middleware(['jwt.auth']);
        Route::get('/address', [AddressController::class, 'index'])->middleware(['jwt.auth']);

        Route::post('/church/create', [ChurchController::class, 'store'])->middleware(['jwt.auth']);
        Route::get('/church', [ChurchController::class, 'index'])->middleware(['jwt.auth']);
        Route::put('/church/{id}', [ChurchController::class, 'update'])->middleware(['jwt.auth']);
        Route::get('/church/{id}', [ChurchController::class, 'get'])->middleware(['jwt.auth']);

        Route::post('/grant/create', [GrantController::class, 'store'])->middleware(['jwt.auth']);
        Route::put('/grant', [GrantController::class, 'update'])->middleware(['jwt.auth']);
        Route::get('/grant', [GrantController::class, 'index'])->middleware(['jwt.auth']);

        Route::post('/role/create', [RoleController::class, 'store'])->middleware(['jwt.auth']);
        Route::put('/role', [RoleController::class, 'update'])->middleware(['jwt.auth']);
        Route::get('/role', [RoleController::class, 'index'])->middleware(['jwt.auth']);

        Route::get('/people', [PeopleController::class, 'index'])->middleware(['jwt.auth']);
        Route::post('/people', [PeopleController::class, 'create'])->middleware(['jwt.auth']);
        Route::get('/people/{id}', [PeopleController::class, 'get'])->middleware(['jwt.auth']);

        Route::get('/attribute/types', [AttributeController::class, 'types'])->middleware(['jwt.auth']);
        Route::put('/attribute', [AttributeController::class, 'store'])->middleware(['jwt.auth']);
        Route::get('/attribute', [AttributeController::class, 'index'])->middleware(['jwt.auth']);
    });
