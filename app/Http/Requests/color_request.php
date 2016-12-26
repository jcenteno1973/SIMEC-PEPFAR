<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class color_request extends Request
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
            //
        'desc_color'=>'min:4|max:25|unique:lista_color|required',
        'estado_registro'=>'required',
        ];
    }
}
