@extends('Vmaster')
@include('navglobal.nav-vcreate')
@section('title','Ingresar')
@section ('content')

	<div class="modal-body">

		<h6>Cantidad: </h6>
		<input  type="number" pattern="[0-9]+" id="cantidad" name="Cantidad1" value=1>
		<button class="btn btn-success" onclick="dinamico()">Cantidad</button>
		<form class="form-horizontal" method="post">
		          @foreach ($errors->all() as $error)
		          <p class="alert alert-danger">{{$error}}</p>
		          @endforeach

			<input type="hidden" name="_token" value="{!! csrf_token() !!}">
			<input type="hidden" name="cant" id="Cant" value="1">
			<fieldset>
				<table class="table">
					<tr><h6>Cedula: </h6><input class="form-control" type="number" pattern="[0-9]+" id="CedVenta" name="CedulaDelCliente"></tr>
					<tr><h6>Fecha: </h6><input class="form-control" type="datetime" id="Fecha" readonly="readonly" name="fecha" value= "<?php
				  date_default_timezone_set('America/Bogota');
				  $time = time();echo date("Y-m-d H:i:s",$time);?>"></tr>
				<thead>
						<tr>
							<th class="col-xs-0"><h4>#</h4></th>
							<th class="col-xs-2" ><h4 align="center">Producto</h4></th>
							<th class="col-xs-2" ><h4 align="center">Talla</h4></th>
							<th class="col-xs-2" ><h4 align="center">Precio</h4></th>
						</tr>
					</thead>
					<tbody id="tbody">
				<tr>
					<td ><h4>1</h4></td>
					<td>
						<select id='Codigo0' class="form-control" name='CodigoDelProducto0' onchange="cuadrar(this.value,0)" >
						<option > </option>
	    				 @foreach($productos as $producto)
	        				<option >{!! $producto->codigo !!}</option>
	    				 @endforeach
        				</select>
        			</td>
        			<td>
        				<select id='Talla0' class="form-control" name='TallaDelProducto0'  readonly='readonly'>
        					<option > </option>
	    				 @foreach($productos as $producto)
	        				<option >{!! $producto->talla !!}</option>
	    				 @endforeach
        				</select>
        			</td>
        			<td>
        				<select id='Precio0' class="form-control" name='PrecioDelProducto0' readonly='readonly'>
        				<option ></option>
	    				 @foreach($productos as $producto)
	        				<option >{!! $producto->precio_venta !!}</option>
	    				 @endforeach
        				</select>
        			</td>
        		</tr>
					</tbody>
					<tbody id="Dingreso">
					</tbody>
				</table>
				<button class="btn btn-success" type="submit" >Registrar</button>
	        </fieldset>
        </form>
    </div>
@endsection
