<?php

namespace App\Http\Requests\Card;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCardRequest extends FormRequest
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
            'card_number' => 'required', // check card_number is unique ?
            'sheba_number' => 'required' // check sheba_number is unique ?
        ];
    }
}
