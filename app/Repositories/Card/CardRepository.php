<?php

namespace App\Repositories\Card;

use App\Models\Card;
use Illuminate\Support\Facades\DB;

class CardRepository implements CardRepositoryInterface{

    public function store($request)
    {
        try {
            DB::beginTransaction();
            $card = Card::create($request);
            DB::commit();
            return $card;
        }catch (\Exception $exception){
            DB::rollBack();
            return $exception->getMessage();
        }
    }

    public function show($id)
    {
        try {
            DB::beginTransaction();
            $card = Card::find($id);
            DB::commit();
            return $card;
        }catch (\Exception $exception){
            DB::rollBack();
            return $exception->getMessage();
        }
    }

    public function update($request, $id)
    {
        try {
            DB::beginTransaction();
            $card = Card::where('id','=',$id)->update($request);
            DB::commit();
            return $card;
        }catch (\Exception $exception){
            DB::rollBack();
            return $exception->getMessage();
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            Card::where('id','=',$id)->delete();
            DB::commit();
            return true;
        }catch (\Exception $exception){
            DB::rollBack();
            return $exception->getMessage();
        }
    }

    public function existsCard($id)
    {
        try {
            return Card::where('id','=',$id)->exists();
        }catch (\Exception $exception){
            return $exception->getMessage();
        }
    }
}
