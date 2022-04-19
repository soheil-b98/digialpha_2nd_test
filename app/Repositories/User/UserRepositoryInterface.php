<?php

namespace App\Repositories\User;

interface UserRepositoryInterface {

    public function allUser();
    public function update_verify($status,$card_id);
    public function getUserByCardID($card_id);

}
