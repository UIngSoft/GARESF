@extends('master')
@section('title', 'Registrar Producto')

@section('content')

<body>
  <div class="container col-md-8 col-md-offset-2">
    <form class="form-horizontal" method="post">

      @foreach ($errors->all() as $error)
      <p class="alert alert-danger">{{ $error }}</p>
      @endforeach

      @if (session('status'))
      <div class = "alert alert-success">
        {{ session ('status') }}
      </div>
      @endif

      <input type="hidden" name="_token" value="{!! csrf_token() !!}">
      <fieldset>
        <div class="form-group row">
          <div class="col-3">
            Codigo
            <br>
            <input type="text" class="form-control" id="codigo" name="codigo">
          </div>
        </div>

        <div class="form-group row">
          <div class="col-3">
            Talla
            <br>
            <input type="text" class="form-control" id="talla" name="talla">
          </div>
        </div>

        <div class="form-group row">
          <div class="col-3">
            Cantidad
            <br>
            <input type="text" class="form-control" id="cantidad" name="cantidad">
          </div>
        </div>

        <div class="form-group row">
          <div class="col-3">
            Precio Compra
            <br>
            <input type="text" class="form-control" id="precio_compra" name="precio_compra">
          </div>
        </div>

        <div class="form-group row">
          <div class="col-3">
            Precio Venta
            <br>
            <input type="text" class="form-control" id="precio_venta" name="precio_venta">
          </div>
        </div>

        <div class="form-group row">
          <div class="col-3">
            Tipo Producto
            <br>
            <input type="text" class="form-control" id="tipo_producto" name="tipo_producto">
          </div>
        </div>

        <div>
          <br>
          <button type="submit" class="btn btn-primary">Registrar</button>
          <button class="btn btn-info">Cancelar</button>
        </div>
      </fieldset>
    </form>
  </div>
</body>
@endsection
