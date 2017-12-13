<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\VentaFormRequest;
use App\Http\Requests\VentaDetalleFormRequest;
use App\VentaDetalle;
use App\Venta;
use App\Product;

class VentasController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
      $iterador = Venta::max('id') - 4;  
      $ventas = Venta::all()->where('id','>=',$iterador);
      return view('venta',compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $productos = Product::where('cantidad','<>',0)->get(['codigo','talla','precio_venta']);            
        return view('Ventas.create',compact('productos'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VentaFormRequest $ventar,VentaDetalleFormRequest $detaller) 
    {
        $mensaje =' No se han podido registrar los siguientes productos: ';
        $aviso ='';
        $cantidad = $ventar->get('cant');
        $garantia = strtotime('+1 month', strtotime ($ventar->get('fecha'))) ;
        $garantia = date("Y-m-d H:i:s",$garantia);
        $total = 0;
        //falta hacer el 
        $idventa = Venta::max('id');
        $idventa = $idventa+1;
        $conta=0;
        for($i=0;$i<$cantidad;$i++)
            {
             $total = $detaller['PrecioDelProducto'.$i]+$total;
            }

          $venta = new Venta(array(
         'id'=>$idventa,
         'cedCliente'=>$ventar->get('CedulaDelCliente'),
         'fecha'=>$ventar->get('fecha'),
         'garantia'=>$garantia,
         'PrecioTotal'=>$total,
         'iva'=>($total+($total*0.19))
        ));    
         $venta->save(); 

        for($i=0;$i<$cantidad;$i++){

            $contador = Product::where('codigo',$detaller['CodigoDelProducto'.$i])->where('talla',$detaller['TallaDelProducto'.$i])->where('precio_venta',$detaller['PrecioDelProducto'.$i])->get(['cantidad']);    
            
            if($contador[0]['cantidad'] != 0)
            {
            $VentaDetalle = new VentaDetalle(array(
            'idventa'=>$idventa,
            'codProducto'=>$detaller['CodigoDelProducto'.$i],
            'talla'=>$detaller['TallaDelProducto'.$i],
            'precio'=>$detaller['PrecioDelProducto'.$i]  
            ));

            $VentaDetalle->save();

            Product::where('codigo',$detaller['CodigoDelProducto'.$i])->where('talla',$detaller['TallaDelProducto'.$i])->where('precio_venta',$detaller['PrecioDelProducto'.$i])->update(['cantidad'=> $contador[0]['cantidad']-1]);
            //cuidar orden ventas
        }
        else
        {
            if($conta==0){
                $aviso=$mensaje;
                $conta=1;
            }

          $aviso =$aviso.'<Warning>'.'#'.($i+1).' Codigo: '.$detaller['CodigoDelProducto'.$i].' Talla: '.$detaller['TallaDelProducto'.$i].' Precio: '.$detaller['PrecioDelProducto'.$i].'<Warning>';
        }
        }
        return redirect('\Venta')-> with('status','La venta ha sido registrada satifactoriamente.'.$aviso
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idventa)
    {
        $ventadetalles = VentaDetalle::where('idventa',$idventa)->get();
        return view('Ventas.show',compact('ventadetalles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

    }

}
