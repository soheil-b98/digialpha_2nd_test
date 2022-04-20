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
        // get request as array [email => ..., password => ... ]!!!
        $credentials = ['email'=>$request['email'], 'password'=>$request['password']];
        if(!Auth::attempt($credentials))
            return ([
                'message' => 'Unauthorized'
            ]);
        $user = \auth()->user();
        $tokenResult = $user->createToken('user_token',[$user->role] );
        $token = $tokenResult->token;
        if ($request['remember_me'])
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        return ([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($token->expires_at)->toDateTimeString(),
            'user' => \auth()->user() // auth()->user faster way
        ]);
    }

    public function logout($request)
    {
        try {
            $request->user()->token()->revoke();
            return true;
        }catch (\Exception $exception){
            return $exception->getMessage();
        }

    }

}
