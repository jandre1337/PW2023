<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LugarFormRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'zona_id' => 'required',
        ];
    }
}
