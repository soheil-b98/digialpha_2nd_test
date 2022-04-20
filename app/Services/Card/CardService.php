<?php

namespace App\Services\Card;

use App\Http\Requests\Card\UpdateCardRequest;
use App\Repositories\Card\CardRepository;
use Illuminate\Http\Request;

class CardService
{
    private $cardRepository;

    public function __construct(CardRepository $cardRepository)
    {
        $this->cardRepository = $cardRepository;
    }

    public function store($request)
    {
        return $this->cardRepository->store($request);
    }

    public function show($id)
    {
        return $this->cardRepository->show($id);
    }

    public function update($request,$id)
    {
        return $this->cardRepository->update($request, $id);
    }

    public function destroy($id)
    {
        if (is_string($error = $this->cardRepository->existsCard($id))){
            return $error;
        }
        return $this->cardRepository->destroy($id);
    }

}
