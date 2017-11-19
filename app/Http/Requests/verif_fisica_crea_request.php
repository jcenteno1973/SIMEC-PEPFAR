<?php
/* 
     * Nombre del archivo: verif_fisica_crea_request
     * Descripción: valida datos para crear verificación física
     * Fecha de creación: 28/12/2016
     * Creado por: Karla Barrera
*/

namespace App\Http\Requests;

use App\Http\Requests\Request;

class verif_fisica_crea_request extends Request
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
            //Validación de campos de nueva verificacion fisica
            'nombre_responsable'=> 'required|min:8|max:50',
            'nombre_verificador'=> 'required|min:8|max:50'
        ];
    }
}
