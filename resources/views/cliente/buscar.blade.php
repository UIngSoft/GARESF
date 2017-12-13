@extends('imaster')
@section('title', 'Ver Cliente')

@section('content')
<div class="container col-md-8 col-md-offset-2">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h2> Clientes </h2>
    </div>


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

    @if ($clientesb ->isEmpty())
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
        @foreach($clientesb as $clienteb)
        <tr>
          <td>
            <a href="{!! action('ClienteController@show', $clienteb->cedula) !!}">{!! $clienteb ->cedula !!}</a>
          </td>
          <td>{!! $clienteb -> primer_nombre !!}</td>
          <td>{!! $clienteb -> segundo_nombre !!}</td>
          <td>{!! $clienteb -> primer_apellido !!}</td>
          <td>{!! $clienteb -> segundo_apellido !!}</td>
          <td>{!! $clienteb -> fechanacimiento !!}</td>
          <td>{!! $clienteb -> celular !!}</td>
          <td>{!! $clienteb -> telefono !!}</td>
          <td>{!! $clienteb -> correo !!}</td>
        </tr>
        @endforeach

      </tbody>
    </table>
    @endif
  </div>
</div>
@endsection
