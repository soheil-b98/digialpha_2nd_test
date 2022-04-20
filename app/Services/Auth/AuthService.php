<?php

namespace App\Services\Auth;

use App\Repositories\Auth\AuthRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    private AuthRepositoryInterface $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function registerUSer($request)
    {
        $request['password'] = Hash::make($request['password']);
        return $this->authRepository->createUser($request);
    }

    public function login($request)
    {
        // get request as array [email => ..., password => ... !!!
        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials))
            return ([
                'message' => 'Unauthorized'
            ]);
        $user = $request->user();
        $tokenResult = $user->createToken('user_token',[$user->level] );
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        return ([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($token->expires_at)->toDateTimeString(),
            'user' => Auth::user() // auth()->user faster way
        ]);
    }

    public function logout($request)
    {
        $request->user()->token()->revoke();
        // use try catch & handle with true false  (error handling)
    }

}
