@extends('Vmaster')
@include('navglobal.nav-ventas')
@section('title','Buscar')
@section('content')
<main role="main" class="container">
    <div class="starter-template">
    	<div class="panel panel-default">
       		<div class="panel-heading">
       			<h2> Ventas echas por el cliente </h2>
   				<div>
   				@if ($ventasb->isEmpty())
				<p>El cliente no ha hecho ninguna compra.</p>
				@else	
				<table class="table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Cedula</th>
							<th></th>
							<th>Precio</th>
							<th>Precio iva</th>
							<th>Fecha de compra</th>
							<th>Garantia</th>
						</tr>
					</thead>	
					<tbody>
						@foreach($ventasb as $ventab)
							<tr>
								<td><a href="{!! action('VentasController@show',$ventab->id) !!}">{!! $ventab->id !!}</a>
							    </td>
								<td> {!! $ventab->cedCliente !!}<td>
								<td>{!! $ventab->PrecioTotal !!}</td>
								<td>{!! $ventab->iva !!}</td>
								<td>{!! $ventab->fecha !!}</td>
								<td>{!! $ventab->garantia!!}</td>
							</tr>
						@endforeach
					</tbody>
				@endif	
				</table>
			</div>
		</div>
	</div>
</main><!-- /.container -->



@endsection    