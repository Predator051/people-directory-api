<?php

namespace App\Http\Controllers;

use App\Contracts\UserContract;
use App\Data\UserData;
use App\Http\Requests\Auth\CreateUserRequest;
use App\Http\Requests\Auth\LoginUserRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseCode;

class UserController extends Controller
{
    public function __construct(private readonly UserContract $userService)
    {
    }

    /**
     * Get the token array structure.
     *
     * @param string $token
     *
     * @return JsonResponse
     */
    protected function respondWithToken(string $token): JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    public function store(CreateUserRequest $request)
    {
        $user = $this->userService->create(UserData::from($request->all()));

        return response()->json($user);
    }

    /**
     * Refresh a token.
     *
     * @return JsonResponse
     */
    public function refresh(): JsonResponse
    {
        return $this->respondWithToken(auth()->refresh());
    }

    public function login(LoginUserRequest $request): JsonResponse
    {
        if (!$token = $this->userService->login(UserData::from($request->all()))) {
            return response()->json(['error' => 'Unauthorized'], ResponseCode::HTTP_UNAUTHORIZED);
        }

        return $this->respondWithToken($token);
    }

    public function me(): JsonResponse
    {
        return response()->json(auth()->user());
    }

    public function logout(): JsonResponse
    {
        $this->userService->logout();

        return response()->json();
    }
}
