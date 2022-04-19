<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Mail\emailToAll;
use App\Mail\Email;
use App\Models\Card;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('user.index',compact('users'));
    }

    public function change_status($status,$card_id)
    {
        User::verify($status,$card_id);
        return back();
    }

    public function send_to_all()
    {
        //            $users = User::all();
//            foreach ($users as $user){
//                Mail::to($user->email)->send(new emailToAll($user));
//            }

//        $emails = User::pluck('email')->toArray();
//        Mail::send('email.schedule_mailing', [], function($message) use ($emails)
//        {
//            $message->to($emails)->subject('This is test e-mail');
//        });
//

//        $arrayEmails = User::pluck('email')->toArray();
//        $emailSubject = 'My Subject';
//        $emailBody = 'Hello, this is my message content.';
//        Mail::send('email.schedule_mailing',
//            ['msg' => $emailBody],
//            function($message) use ($arrayEmails, $emailSubject) {
//                $message->to($arrayEmails)
//                    ->subject($emailSubject);
//            }
//        );
//
        return 'nothing';
    }

}
