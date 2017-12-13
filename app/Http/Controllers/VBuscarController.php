<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\VentaBuscarFormRequest;
use App\Venta;

class VBuscarController extends Controller
{
    public function index(VentaBuscarFormRequest $ventabuscar)
    {
          
        $ventasb = Venta::where('cedCliente',$ventabuscar->get('cedula'))->get();
        return view('Ventas.search',compact('ventasb'));
    }
}
