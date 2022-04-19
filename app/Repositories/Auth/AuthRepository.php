<?php

namespace App\Repositories\Auth;

use App\Models\Card;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AuthRepository implements AuthRepositoryInterface
{
    public function createUser($data)
    {
        try {
            DB::beginTransaction();
            User::create($data);
            DB::commit();
            return true;
        }catch (\Exception $exception){
            DB::rollBack();
            return false;
        }
    }

}
