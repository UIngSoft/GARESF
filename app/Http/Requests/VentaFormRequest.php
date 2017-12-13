<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VentaFormRequest extends FormRequest
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
            'CedulaDelCliente'=>'digits_between:8,10|numeric',
            'fecha' =>'required|date',
            'cant'=>'required|digits_between:1,10|numeric'   
        ];
    }

    public function messages(){
    return [
            'CedulaDelCliente.digits_between'=>'La Cedula no cumple con la longitud requerida de 8 a 10.',
             'CedulaDelCliente.numeric'=>'La Cedula debe ser numerica.',
            'fecha.date' =>'La Fecha debe ser date.',
            'fecha.required'=>'La Fecha es requerida.',
            'cant.required'=>'Debe ingresar un producto.',
            'cant.digits_between'=> 'La Cantidad no cumple con la longitud requerida de maximo 10.',
            'cant.numeric'=>'La Cantidad debe ser de tipo numerico.'
    ];
  }
}
