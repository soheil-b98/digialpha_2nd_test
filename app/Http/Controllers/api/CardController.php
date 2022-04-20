<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Card\StoreCardRequest;
use App\Http\Requests\Card\UpdateCardRequest;
use App\Services\Card\CardService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CardController extends Controller
{

    private CardService $cardService;

    public function __construct(CardService $cardService)
    {
        $this->cardService = $cardService;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCardRequest $request
     * @return JsonResponse
     */
    public function store(StoreCardRequest $request)
    {
        $card = $this->cardService->store($request->validated());
        if ($card[0]){
            return $this->success('add card successful !',$card[1],$card[2]);
        }
        return $this->success('add card failed !',$card[1],$card[2]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id)
    {
        $card = $this->cardService->show($id);
        if ($card[0]){
            if ($card[2]){
                return $this->success('card found !',$card[1],$card[2]);
            }
            return $this->success('card not found !',$card[1],$card[2]);
        }
        return $this->success('something got wrong, try later !',$card[1],$card[2]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCardRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UpdateCardRequest $request, $id)
    {
        dd('s');
        $card = $this->cardService->update($request->validated(),$id);
        if ($card[0]){
            return $this->success('update card successful !',$card[1],$card[2]);
        }
        return $this->success('update card failed! ',$card[1],$card[2]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        if ($this->cardService->checkExistsCard($id)){

            $card = $this->cardService->destroy($id);
            if ($card[0]){
                return $this->success('delete card successful !',$card[1],$card[2]);
            }
            return $this->success('delete card failed! ',$card[1],$card[2]);

        }
        return $this->success('card not found !',404);
    }
}



