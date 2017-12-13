<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteFormRequest extends FormRequest
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
            'cedula' => 'required|numeric|digits_between:8,10',
            'primer_nombre' => 'required|regex:/[a-z]/',
            'primer_apellido' => 'required|regex:/[a-z]/',
            'fechanacimiento' => 'required',
            'correo' => 'required',
        ];
    }

    public function messages(){
    return [
      'cedula.required' => 'Campo Cedula requerido.',
      'cedula.numeric' =>'Campo Cedula debe ser numerica',
      'cedula.digits_between' =>'Campo cedula debe contener como minimo 8 digitos y maximo 10 digitos',

      'primer_nombre.required' => 'Campo  Primer Nombre requerido.',
      'primer_nombre.regex' => 'Campo  Primer nombre no puede contener numeros.',

      'primer_apellido.required' => 'Campo Primer Apellido requerido.',
      'primer_apellido.regex' => 'Campo  Primer Apellido no puede contener numeros.',


      'fechanacimiento.required' => 'Campo Fecha Nacimiento requerido.',


      'correo.required' => 'Campo Correo requerido.',

    ];
  }
  
}
