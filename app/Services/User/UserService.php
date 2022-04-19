<?php

namespace App\Services\User;

use App\Jobs\SendEmailJob;
use App\Models\Card;
use App\Repositories\User\UserRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;


class UserService implements ShouldQueue
{
    use Queueable;
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepository->allUser();
        foreach ($users as $user){
            $user->cards = Card::where('user_id','=',$user->id)->get();
        }
        return $users;
    }

    public function show($request)
    {
        $user = $request->user();
        $user->cards = Card::where('user_id','=',$user->id)->get();
        return $user;
    }

    public function changeStatus($request)
    {
        $user = $this->userRepository->getUserByCardID($request['card_id']);
        $card = $this->userRepository->update_verify($request['status'],$request['card_id']);
        if ($card){
            dispatch(new SendEmailJob($user,$card,$text = ''));
        }
    }

    public function sendEmailToAll()
    {
        $users = $this->userRepository->allUser();
        foreach ($users as $user){
            dispatch(new SendEmailJob($user, null,'welcome to our community'));
        }
    }

}
