@extends('imaster')
@section('title', 'Ver Cliente')

@section('content')
<div class="container col-md-8 col-md-offset-2">
  <div class="panel">
    <div class="content">
      <H3 align="center">Perfil Cliente: </H3>
      <h2 class="header">{!! $cliente->primer_nombre !!}  {!! $cliente->segundo_nombre !!}</h2>


      <p><strong>Cedula</strong>: {!! $cliente->cedula !!}</p>
      <p><strong>Primer Nombre</strong>: {!! $cliente->primer_nombre !!}</p>
      <p><strong>Segundo Nombre</strong>: {!! $cliente->segundo_nombre !!}</p>
      <p><strong>Primer Apellido</strong>: {!! $cliente->primer_apellido !!}</p>
      <p><strong>segundo Apellido</strong>: {!! $cliente->segundo_apellido !!}</p>
      <p><strong>Fecha Nacimiento</strong>: {!! $cliente->fechanacimiento !!}</p>
      <p><strong>Correo Electronico</strong>: {!! $cliente->correo !!}</p>
      <p><strong>Celular:</strong>: {!! $cliente->celular !!}</p>
      <p><strong>Telefono</strong>: {!! $cliente->telefono !!}</p>

    </div>

    <form method="post" action="{!! action('ClienteController@destroy', $cliente->cedula) !!}" class="pull-left">
      <input type="hidden" name="_token" value="{!! csrf_token() !!}">
      <a href="{!! action('ClienteController@edit', $cliente->cedula) !!}" class="btn btn-warning">Editar</a>
      <button type="submit" class="btn btn-danger">Eliminar</button>
      <a href="{!! action('ClienteController@index')!!}" class="btn btn-info">Cancelar</a>
    </form>
    <div class="clearfix"></div>
  </div>
</div>
@endsection
