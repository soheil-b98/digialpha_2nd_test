<?php

namespace App\Http\Requests\Card;

use Illuminate\Foundation\Http\FormRequest;

class StoreCardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'card_number' => 'required|numeric|size:16|unique:cards,card_number',
            'sheba_number' => 'required|string|size:26|unique:cards,sheba_number'
        ];
    }
}
