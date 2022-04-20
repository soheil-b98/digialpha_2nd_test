<?php

namespace App\Http\Requests\Card;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCardRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        $card_id = $this->route('card'); //get card_id parameter from URL
        return [
            'card_number' => 'required|string|size:16|unique:cards,card_number,'.$card_id,
            'sheba_number' => 'required|string|size:26|unique:cards,sheba_number,'.$card_id
        ];
    }
}
