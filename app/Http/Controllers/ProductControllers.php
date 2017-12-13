<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductFormRequest;
use App\Product;

class ProductControllers extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $products = Product::all();
    return view('product.index', compact('products'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('product.create');
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(ProductFormRequest $request)
  {
    //return $request->all();
    $slug = uniqid();
    $product = new Product(array(
      'codigo' => $request->get('codigo'),
      'talla' => $request->get('talla'),
      'cantidad' => $request->get('cantidad'),
      'precio_compra' => $request->get('precio_compra'),
      'precio_venta' => $request->get('precio_venta'),
      'tipo_producto' => $request->get('tipo_producto'),
      'slug' => $slug
    ));

    $product->save();
    return redirect('/product')-> with('status', 'Se agrego el producto');
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($codigo)
  {
    $product = Product::whereCodigo($codigo)->firstOrFail();
    return view('product.show', compact('product'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($codigo)
  {
    $product = Product::whereCodigo($codigo)->firstOrFail();
    return view('product.edit', compact('product'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update($codigo, ProductFormRequest $request)
  {
      $product = Product::whereCodigo($codigo)->firstOrFail();
      $product->cantidad = $request->get('cantidad');
      $product->precio_compra = $request->get('precio_compra');
      $product->precio_venta = $request->get('precio_venta');
      $product->tipo_producto = $request->get('tipo_producto');

     $product->save();

     return redirect(action('ProductControllers@index', $product->codigo))->with('status', '¡El Producto de codigo '.$codigo.' ha sido actualizado!');

  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($codigo)
  {
    $product = Product::whereCodigo($codigo)->firstOrFail();
    $product->delete();

    return redirect('/lista')->with('status', '¡El Producto de codigo '.$codigo.' ha sido eliminado!');
  }

  public function welcome()
  {
    return view('inicio');
  }

  public function inicioBodega()
  {
    return view('product.blanco');
  }

}
