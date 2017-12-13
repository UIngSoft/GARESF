@extends('master')
@section('title', 'Ver Producto')

@section('content')
<div class="container col-md-8 col-md-offset-2">
  <div class="panel">
    <div class="content">
      <h2 class="header">{!! $product->tipo_producto !!}</h2>
      <p> <strong>Codigo</strong>: {!! $product->codigo !!}</p>
      <p> <strong>Talla</strong>: {!! $product->talla !!}</p>
      <p> <strong>Cantidad</strong>: {!! $product->cantidad !!}</p>
      <p> <strong>Compra</strong>: {!! $product->precio_compra !!}</p>
      <p> <strong>Venta</strong>: {!! $product->precio_venta !!}</p>
      <p> <strong>Tipo</strong>: {!! $product->tipo_producto !!}</p>
    </div>
    <form method="post" action="{!! action('ProductControllers@destroy', $product->codigo) !!}" class="pull-left">
      <input type="hidden" name="_token" value="{!! csrf_token() !!}">
      <a href="{!! action('ProductControllers@edit', $product->codigo) !!}" class="btn btn-warning">Editar</a>
      <a href="{!! action('ProductControllers@edit', $product->codigo) !!}" class="btn btn-info">Cancelar</a>
      <form method="post" action="{!! action('ProductControllers@destroy', $product->codigo) !!}" class="pull-left">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <button type="submit" class="btn btn-danger">Borrar</button>
      </form>
      <div class="clearfix"></div>
    </div>
  </div>
  @endsection
