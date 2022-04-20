<?php

namespace App\Repositories\Card;

interface CardRepositoryInterface {

    public function store($request);
    public function show($id);
    public function update($request,$id);
    public function destroy($id);
    public function existsCard($id);

}
