<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ChangeStatusRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'status' => 'required|in:rejected,accepted,notChecked',
            'card_id' => 'required|exists:cards,id'

        ];
    }
}
