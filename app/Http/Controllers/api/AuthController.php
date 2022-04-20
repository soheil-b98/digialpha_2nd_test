<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\auth\LoginRequest;
use App\Http\Requests\auth\SignupRequest;
use App\Services\Auth\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }


    public function register(SignupRequest $request)
    {
        if ($this->authService->registerUSer($request->validated())){
            return $this->success('Successfully registered user!');
        }
        return $this->fail('Register user failed!');
    }


    public function login(LoginRequest $request)
    {
        $response_data = $this->authService->login($request->validated());
        return $this->success('Successfully logged in',$response_data);
    }


    public function logout(Request $request)
    {
        if (is_string($this->authService->logout($request))){
            return $this->fail('log out failed!');
        }
        return $this->success('Successfully logged out!');
    }

}
