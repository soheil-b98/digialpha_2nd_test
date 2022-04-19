<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\auth\LoginRequest;
use App\Http\Requests\auth\SignupRequest;
use App\Services\Auth\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Create user
     *
     * @param SignupRequest $request
     * @return JsonResponse [string] message
     */
    public function register(SignupRequest $request)
    {
        if ($this->authService->registerUSer($request->validated())){
            return $this->success('Successfully registered user!',200);
        }
        return $this->success('Register user failed!',400);
    }

    /**
     * Login user and create token
     *
     * @param LoginRequest $request
     * @return JsonResponse [string] access_token
     */
    public function login(LoginRequest $request)
    {
        $response_data = $this->authService->login($request);
        return $this->success('Successfully logged in',200,$response_data);
    }

    /**
     * Logout user (Revoke the token)
     *
     * @param Request $request
     * @return JsonResponse [string] message
     */
    public function logout(Request $request)
    {
        $this->authService->logout($request);
        return $this->success('Successfully logged out',200);
    }


}
