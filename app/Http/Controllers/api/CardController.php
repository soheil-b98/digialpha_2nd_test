<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Card\StoreCardRequest;
use App\Http\Requests\Card\UpdateCardRequest;
use App\Services\Card\CardService;

class CardController extends Controller
{

    private CardService $cardService;

    public function __construct(CardService $cardService)
    {
        $this->cardService = $cardService;
    }


    public function store(StoreCardRequest $request)
    {
        $cardOrError = $this->cardService->store($request->validated());
        if (is_string($cardOrError)){
            return $this->fail('add card failed !',$cardOrError);
        }
        return $this->success('add card successful !',$cardOrError,201);
    }


    public function show(int $id)
    {
        $cardOrError = $this->cardService->show($id);
        if (is_string($cardOrError)){
            return $this->fail('card not found!',$cardOrError);
        }
        return $this->success('card found!',$cardOrError);
    }


    public function update(UpdateCardRequest $request, $id)
    {
        $cardOrError = $this->cardService->update($request->validated(),$id);
        if (is_string($cardOrError)){
            return $this->fail('update card failed!',$cardOrError);
        }
        return $this->success('update card successful!',$cardOrError);

    }


    public function destroy($id)
    {
        if (is_string($error = $this->cardService->destroy($id))){
            return $this->fail('delete card failed!',$error);
        }
        return $this->success('delete card successful!');
    }
}



