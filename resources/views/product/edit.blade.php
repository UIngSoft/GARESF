@extends('master')
@section('title', 'Editar Producto')

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
        <legend>Editar Producto</legend>
        <div class="form-group">
          <label for="codigo" class="col-lg-2 control-label">Codigo</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="codigo" name="codigo" value="{!! $product->codigo !!}" readonly>
          </div>
        </div>

        <div class="form-group">
          <label for="talla" class="col-lg-2 control-label">Talla</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="talla" name="talla" value="{!! $product->talla !!}" readonly>
          </div>
        </div>

        <div class="form-group">
          <label for="cantidad" class="col-lg-2 control-label">Cantidad</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="cantidad" name="cantidad" value="{!! $product->cantidad !!}">
          </div>
        </div>

        <div class="form-group">
          <label for="precio_compra" class="col-lg-2 control-label">Precio Compra</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="precio_compra" name="precio_compra" value="{!! $product->precio_compra !!}">
          </div>
        </div>

        <div class="form-group">
          <label for="precio_venta" class="col-lg-2 control-label">Precio Venta</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="precio_venta" name="precio_venta" value="{!! $product->precio_venta !!}">
          </div>
        </div>

        <div class="form-group">
          <label for="tipo_producto" class="col-lg-2 control-label">Tipo Producto</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="tipo_producto" name="tipo_producto" value="{!! $product->tipo_producto !!}">
          </div>
        </div>


        <div class="form-group">
          <div class="container">
            <div class="row">
              <div class="col-xs-6 col-sm-3">
                <button type="submit" class="btn btn-warning">Actualizar</button>
                <form method="post" action="{!! action('ProductControllers@edit', $product->codigo) !!}" class="pull-left">
                </form>
              </div>
              <div class="col-xs-6 col-sm-3">
                <form method="post" action="{!! action('ProductControllers@destroy', $product->codigo) !!}" class="pull-left">
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#example">Borrar</button>
                  <!-- Ventana emergente -->
                  <div class="modal fade" id="example" tabindex="-1" role="dialog" aria-labelledby="exampleLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleLabel" style="color:#df1e1e;">Borrar</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <h2>Desea borrar este producto</h2>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                          <button type="submit" class="btn btn-danger">Borrar</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                </form>
                <!-- Fin Ventana emergente -->
              </div>
              <div class="col-xs-6 col-sm-3">
                <a href="{!! action('ProductControllers@index')!!}" class="btn btn-info">Cancelar</a>

              </div>



            </div>
          </div>
        </div>
      </fieldset>
    </form>
  </div>
</div>


@endsection
