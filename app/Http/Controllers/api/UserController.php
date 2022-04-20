<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\ChangeStatusRequest;
use App\Services\User\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Get the authenticated User
     *
     * @return JsonResponse [json] user object + user's cards
     */
    public function getAllUSer() // function name => index or userIndex
    {
        return $this->success('users profile',200,$this->userService->getAllUser());
    }

    /**
     * Get the authenticated User
     *
     * @return JsonResponse [json] user object + user's cards
     */
    public function getUser(Request $request) // function name => profile
    {
        return $this->success('user profile',200,$this->userService->getUser($request));
    }

    /**
     * Get the authenticated User
     *
     * @param ChangeStatusRequest $request
     * @return JsonResponse [json] user object + user's cards
     */
    public function changeCardStatus(ChangeStatusRequest $request) // CardController
    {
        $this->userService->changeStatus($request->validated());
        return $this->success('status changed successful!',200);
    }

}
