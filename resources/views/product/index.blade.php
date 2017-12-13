@extends('master')
@section('title', 'Mostrar Producto')

@section('content')
<div class="container col-md-8 col-md-offset-2">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h2> Productos </h2>
    </div>
    @if (session('status'))
      <div class="alert alert-success">
        {{ session('status')}}
      </div>
    @endif

    @if ($products->isEmpty())
    <p> No hay Productos</p>
    @else
    <table class="table">
      <thead>
        <tr>
          <th>Codigo</th>
          <th>Talla</th>
          <th>Cantidad</th>
          <th>Precio Compra</th>
          <th>Precio Venta</th>
          <th>Tipo Producto</th>
        </tr>
      </thead>
      <tbody>
        @foreach($products as $product)
        <tr>
          <td><a href="{!! action('ProductControllers@edit', $product->codigo) !!}">{!! $product->codigo !!} </a></td>
          <td>{!! $product->talla !!}</td>
          <td>{!! $product->cantidad !!}</td>
          <td>{!! $product->precio_compra !!}</td>
          <td>{!! $product->precio_venta !!}</td>
          <td>{!! $product->tipo_producto !!}</td>
          <td>
          </td>
        </tr>
        @endforeach

      </tbody>
    </table>
    @endif
  </div>
</div>
@endsection
