<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ubicacion_org_request extends Request
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
            //Validación de campos de tabla ubicacion_organizacional
            'codigo_unidad_dep'=> 'required|size:5|unique:ubicacion_organizacional',
            'nombre_unidad_dep'=> 'required|min:8|max:35|unique:ubicacion_organizacional',
            'nombre_responsable'=> 'required|min:8|max:50'
        ];
    }
}
