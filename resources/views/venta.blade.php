@extends('Vmaster')
@include('navglobal.nav-ventas')
@section('title','Venta')
@section('content')

@foreach ($errors->all() as $error)
<p class="alert alert-danger">{{$error}}</p>
@endforeach

<main role="main" class="container">
  <div class="starter-template">

    <div class="panel panel-default">
      <div class="panel-heading">
        <h2> Últimas Ventas </h2>
        <div>
          @if (session('status'))
          <div class="alert alert-sucess">
            {{ session('status') }}
          </div>
          @endif
          @if ($ventas->isEmpty())
          <p> No hay ventas registradas.</p>
          @else
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Cédula</th>
                <th></th>
                <th>Precio</th>
                <th>Precio iva</th>
                <th>Fecha de compra</th>
                <th>Garantia</th>
              </tr>
            </thead>
            <tbody>
              @foreach($ventas as $venta)
              <tr>
                <td><a href="{!! action('VentasController@show',$venta->id) !!}">
                  {!! $venta->id !!}</a>
                </td>
                <td> {!! $venta->cedCliente !!}<td>
                  <td>${!! $venta->PrecioTotal !!}</td>
                  <td>${!! $venta->iva !!}</td>
                  <td>{!! $venta->fecha !!}</td>
                  <td>{!! $venta->garantia!!}</td>
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
