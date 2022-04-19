<?php

namespace App\Repositories\User;

use App\Models\Card;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRepository implements UserRepositoryInterface
{
    public function allUser()
    {
        return User::all();
    }

    public function update_verify($status, $card_id)
    {
        try {
            DB::beginTransaction();
            Card::where('id','=',$card_id)->update(['status'=>$status]);
            DB::commit();
            return Card::find($card_id);
        }catch (\Exception $exception){
            DB::rollBack();
            return false;
        }
    }

    public function getUserByCardID($card_id)
    {
        return Card::find($card_id)->user()->first();
    }

}
