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
            return [true,201,$card];
        }catch (\Exception $exception){
            DB::rollBack();
            return [false,400,$exception];
        }
    }

    public function show($id)
    {
        try {
            DB::beginTransaction();
            $card = Card::find($id);
            DB::commit();
            return [true,200,$card];
        }catch (\Exception $exception){
            DB::rollBack();
            return [false,400,$exception];
        }
    }

    public function update($request, $id)
    {
        try {
            DB::beginTransaction();
            $card = Card::where('id','=',$id)->update($request);
            DB::commit();
            return [true,200,$card];
        }catch (\Exception $exception){
            DB::rollBack();
            return [false,400,$exception];
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $card = Card::where('id','=',$id)->delete();
            DB::commit();
            return [true,200,$card];
        }catch (\Exception $exception){
            DB::rollBack();
            return [false,400,$exception];
        }
    }

    public function existsCard($id)
    {
        try {
            return Card::where('id','=',$id)->exists();
        }catch (\Exception $exception){
            return false;
        }
    }
}
