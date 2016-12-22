<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class contable_request extends Request
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
			            //
        'cta_contable_activo_fijo'=> 'integer|required|unique:cuenta_contable|required',
        'cta_contable_depreciacion'=>'min:4|max:25|unique:cuenta_contable|required',
        'estado_registro'=>'required',
        ];
    }
}
