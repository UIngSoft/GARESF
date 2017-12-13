@extends('Vmaster')
@include('navglobal.nav-ventasdetalle')
@section('title','Detalle de venta')
@section('content')
<main role="main" class="container">
  <div class="starter-template">

    <div class="panel panel-default">
      <div class="panel-heading">
        <h2> Detalle de Venta </h2>
        <div>
          @if (session('status'))
          <div class="alert alert-sucess">
            {{ session('status') }}
          </div>
          @endif
          @if ($ventadetalles->isEmpty())
          <p> El ID no corresponde a ninguna venta registrada</p>
          @else
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Código Producto</th>
                <th></th>
                <th>Talla</th>
                <th></th>
                <th>Precio</th>
              </tr>
            </thead>
            <tbody>
              @foreach($ventadetalles as $ventadetalle)
              <tr>
                <td>{!! $ventadetalle->idventa !!}</td>
                <td>{!! $ventadetalle->Codproducto !!}<td>
                  <td>{!! $ventadetalle->Talla !!}<td>
                    <td>${!! $ventadetalle->precio !!}<td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                @endif
              </div>
            </div>
          </div>
        </main><!-- /.container -->
        @endsection
