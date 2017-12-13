<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\VentaFormRequest;


class VentaDetalleFormRequest extends FormRequest
{

    protected $cantidad;
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
    public function rules(VentaFormRequest $ventar)
    {

        $detalle= array();
        global $cantidad;
        $cantidad = $ventar->get('cant');

        for($i=0;$i<$cantidad ;$i++)
        {
        $detalle['CodigoDelProducto'.$i] = 'required|digits_between:1,10|numeric';
        $detalle['TallaDelProducto'.$i] = 'required|digits_between:1,2|numeric';
        $detalle['PrecioDelProducto'.$i] = 'required|digits_between:1,6|numeric';
        }
        return $detalle;
    }

     public function messages(){
        $detalle2=array();
        global $cantidad;
          for($i=0;$i<$cantidad;$i++)
        {
    $detalle2['CodigoDelProducto'.$i.'.required'] = 'El codigo '.$i.' es requerido.';
    $detalle2['CodigoDelProducto'.$i.'.numeric'] = 'El codigo '.$i.' debe ser numerico.';
    $detalle2['CodigoDelProducto'.$i.'.digits_between'] = 'El codigo '.$i.' no cumple con la longitud requerida de maximo 10.';
    $detalle2['TallaDelProducto'.$i.'.required'] = 'La Talla '.$i.' del producto es requerido.';
    $detalle2['TallaDelProducto'.$i.'.numeric'] = 'La Talla '.$i.' debe ser numerica.';
    $detalle2['TallaDelProducto'.$i.'.digits_between'] = 'La talla '.$i.' no cumple con la longitud requerida de maximo 2.';
    $detalle2['PrecioDelProducto'.$i.'.required'] = 'El Precio '.$i.' es requerido.';
    $detalle2['PrecioDelProducto'.$i.'.numeric'] = 'El Precio '.$i.' debe ser numerico.';
    $detalle2['PrecioDelProducto'.$i.'.digits_between'] = 'El Precio '.$i.' no cumple con la longitud requerida de minimo 4, maximo 10.';
        }


     return $detalle2;
    }
}
