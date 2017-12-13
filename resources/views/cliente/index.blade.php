@extends('imaster')
@section('title', 'Ver Cliente')

@section('content')
<div class="container col-md-8 col-md-offset-2">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h2> Clientes </h2>
    </div>

    @foreach ($errors->all() as $error)
    <p class="alert alert-danger">{{ $error }}</p>
    @endforeach

    <form class="navbar-form navbar-left"  method="post">
      <input type="hidden" name="_token" value="{!! csrf_token() !!}">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Cedula cliente" name="buscar">
      </div>
      <button type="submit" class="btn btn-default">Buscar</button>
    </form>

    @if (session('status'))
    <div class="alert alert-success">
      {{ session('status')}}
    </div>
    @endif

    @if ($clientes ->isEmpty())
    <p> No hay cliente</p>
    @else


    <table class="table">
      <thead>
        <tr>
          <th width="20px">Cédula</th>
          <th>Primer Nombre</th>
          <th>Segundo Nombre</th>
          <th>Primer Apellido</th>
          <th>Segundo Apellido</th>
          <th>Fecha Nacimiento</th>
          <th>Celular</th>
          <th>Telefono</th>
          <th>Correo</th>
          <th colspan="3"></th>
        </tr>
      </thead>
      <tbody>
        @foreach($clientes as $cliente)
        <tr>
          <td>
            <a href="{!! action('ClienteController@show', $cliente->cedula) !!}">{!! $cliente ->cedula !!}</a>
          </td>
          <td>{!! $cliente-> primer_nombre !!}</td>
          <td>{!! $cliente -> segundo_nombre !!}</td>
          <td>{!! $cliente-> primer_apellido !!}</td>
          <td>{!! $cliente -> segundo_apellido !!}</td>
          <td>{!! $cliente -> fechanacimiento !!}</td>
          <td>{!! $cliente -> celular !!}</td>
          <td>{!! $cliente -> telefono !!}</td>
          <td>{!! $cliente -> correo !!}</td>
        </tr>
        @endforeach

      </tbody>
    </table>
    @endif
  </div>
</div>
@endsection
