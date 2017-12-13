<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VentaBuscarFormRequest extends FormRequest
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
            'cedula'=>'required|digits_between:8,10|numeric'
        ];
    }
     public function messages(){
    return [
    'cedula.required'=>'La cedula a buscar es requerida.',
    'cedula.digits_between'=>'La cedula no cumple con la longitud requerida de min 8, maximo 10.',
     'cedula.numeric'=>'La cedula debe ser de tipo numerico.'
    ];
    }
}
