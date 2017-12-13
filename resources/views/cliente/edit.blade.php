@extends('imaster')
@section('title', 'Editar cliente')

@section('content')

<div class="container col-md-8 col-md-offset-2">
  <div class="well well bs-component">
    <form class="form-horizontal" method="post">

      @foreach ($errors->all() as $error)
      <p class="alert alert-danger">{{ $error }}</p>
      @endforeach

      @if (session('status'))
      <div class="alert alert-success">
        {{ session('status') }}
      </div>
      @endif

      <input type="hidden" name="_token" value="{!! csrf_token() !!}">
      <fieldset>
  
        <legend>Editar Cliente</legend>

        <div class="form-group">
          <label>Cédula: </label>
          <input type="text" id="cedula" name="cedula" class="form-control" value="{!! $cliente->cedula !!}" readonly>
        </div>

        <div class="form-group">
          <label>Primer Nombre: </label>
          <input type="text" id="primernombre" name="primer_nombre" class="form-control" value="{!! $cliente->primer_nombre !!}">
        </div>

        <div class="form-group">
          <label>Segundo Nombre: </label>
          <input type="text" id="segundonombre" name="segundo_nombre" class="form-control" value="{!! $cliente->segundo_nombre !!}">
        </div>

        <div class="form-group">
          <label>Primer Apellido: </label>
          <input type="text" id="primerapellido" name="primer_apellido" class="form-control" value="{!! $cliente->primer_apellido !!}">
        </div>

        <div class="form-group">
          <label>Segundo Apellido: </label>
          <input type="text" id="segundoapellido" name="segundo_apellido" class="form-control" value="{!! $cliente->segundo_apellido !!}">
        </div>

        <div class="container">
          <label>Fecha Nacimiento: </label>
          <input type="date" id="fechanacimiento"  name="fechanacimiento" step="1" value="{!! $cliente->fechanacimiento!!}">

          <label>Celular: </label>
          <input type="text" id="celular" name="celular" value="{!! $cliente->celular !!}">

          <label>Telefono: </label>
          <input type="text" id="telefono" name="telefono" value="{!! $cliente->telefono !!}">
        </div>


        <div class="form-group">
          <label for="exampleFormControlInput1">Email address: </label>
          <input type="email" class="form-control" id="correo" name="correo" value="{!! $cliente->correo !!}">
        </div>


        <div class="form-group">
          <div class="container">
            <div class="row">

              <div class="col-xs-6 col-sm-3">
                <button type="submit" class="btn btn-warning">Actualizar</button>
                <form method="post" action="{!! action('ClienteController@edit', $cliente->cedula) !!}" class="pull-left">
                </form>
              </div>

              <div class="col-xs-6 col-sm-3">
                <form method="post" action="{!! action('ClienteController@destroy', $cliente->cedula) !!}" class="pull-left">
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#example">Eliminar</button>
                  <!-- Ventana emergente -->
                  <div class="modal fade" id="example" tabindex="-1" role="dialog" aria-labelledby="exampleLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleLabel" style="color:#df1e1e;">Eliminar</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <h2>Desea Eliminar este cliente</h2>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                          <button type="submit" class="btn btn-danger">Eliminar</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                </form>
                <!-- Fin Ventana emergente -->
              </div>

              <div class="col-xs-6 col-sm-3">
                <a href="{!! action('ClienteController@index')!!}" class="btn btn-info">Cancelar</a>
              </div>
            </div>
          </div>
        </div>
      </fieldset>
    </form>
  </div>
</div>


@endsection
