<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParqueFormRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required',
            'localizacao' => 'required'
        ];
    }
}
