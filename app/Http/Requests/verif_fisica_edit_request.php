<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class verif_fisica_edit_request extends Request
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
            //Validación de campos para editar verificacion fisica
            'nombre_verificador'=> 'required|min:8|max:50'
        ];
    }
}
