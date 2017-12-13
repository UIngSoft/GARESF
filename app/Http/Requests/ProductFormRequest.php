<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
      'codigo' => 'required|numeric|max:9999999999|min:1',
      'talla' => 'required|numeric|max:99|min:1',
      'cantidad' => 'required|numeric|max:99|min:1|regex:/[0-9]/',
      'precio_compra' => 'required|numeric|max:999999|min:1',
      'precio_venta' => 'required|numeric|max:999999|min:1',
      'tipo_producto' => 'required|string|max:20|regex:/[a-z]/',
    ];
  }

  public function messages(){
    return [
      'codigo.required' => 'Campo codigo requerido.',
      'codigo.max' =>'El codigo del producto no puede ser mayor a 10 digitos.',
      'codigo.min' =>'El codigo del producto no puede ser menor a 0.',
      'codigo.numeric' => 'Campo código solo acepta números.',

      'talla.required' => 'Talla codigo requerido.',
      'talla.max' => 'la talla del zapato no puede ser mayor a 99.',
      'talla.min' => 'la talla del zapato no puede ser menor a 0.',
      'talla.numeric' => 'Campo talla solo acepta números.',

      'cantidad.required' => 'Cantidad requerido.',
      'cantidad.max' => 'La cantidad no puede ser mayor a 99.',
      'cantidad.min' => 'La cantidad no puede ser menor a 0.',
      'cantidad.numeric' => 'Campo cantidad solo acepta números.',


      'precio_compra.required' => 'Precio compra requerido.',
      'precio_compra.max' => 'el precio del producto no pude ser mayor que $999999',
      'precio_compra.min' => 'el precio del producto no pude ser menor a 0',
      'precio_compra.numeric' => 'Campo precio compra solo acepta números.',

      'precio_venta.required' => 'Precio venta requerido.',
      'precio_venta.max' => 'el precio del producto no pude ser mayor que $999999',
      'precio_venta.min' => 'el precio del producto no pude ser menor a 0',
      'precio_venta.numeric' => 'Campo precio venta solo acepta números.',

      'tipo_producto.required' => 'Tipo de producto requerido.',
      'tipo_producto.max' => 'Tipo de producto no puede superar los 20 caracteres.',
      'tipo_producto.regex' => 'Campo Tipo producto solo acepta letras.',
    ];
  }
}
