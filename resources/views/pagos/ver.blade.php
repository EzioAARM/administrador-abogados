@extends('layouts.app')

@section('navleft') 
<li>
   <a href="{{ url('clientes/agregar') }}">
        <i class="pe-7s-add-user"></i>
    </a>
</li>
@endsection

@section('contenido')
<div class="card">
	<div class="header">
		<h4 class="title">
			Abonos
		</h4>
		<p class="category">
			Listado de abonos hechos por un cliente a una cuenta
		</p>
	</div>
	@if(Session::has('flash_message'))
		<div class="content">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="alert alert-success fade in	" role="alert">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>La operación se realizó correctamente</strong>
					</div>
				</div>
			</div>
		</div>
	@endif
	<div class="content table-responsive table-full-width">
		<?php
			if (count($datos) == 0){
				echo('<div class="alert alert-danger" role="alert">
					<strong>No se encontró ningún abono en la base de datos.</strong>
				</div>');
			} else {
				?>
					<table class="table table-hover table-striped">
					 	<thead>
						 	<tr>
							 	<th>
							 		ID
							 	</th>
							 	<th>
							 		Fecha de abono
							 	</th>
							 	<th>
							 		Cantidad abonada
							 	</th>
							 	<th>
							 		Recibo
							 	</th>
							 	<th>
							 	Opciones Rapidas
							 	</th>
						 	</tr>
					 	</thead>
						<tbody>
						@foreach ($datos as $dato)
			        		<tr>
					        	<td>{{ $dato->id }}</td>
					        	<td>{{ $dato->fecha }}</td>
					        	<td>Q. {{ $dato->abono }}</td>
					        	<td>{{ $dato->recibo }}</td>
					        	<td>
					        		<div class="btn-group btn-group-xs" role="group" aria-label="Acciones">
					        			<a href="{{ url('pagos/completa/' . $dato->id) }}" class="btn btn-primary"><i class="pe-7s-look"> </i></a>
					        			@if (Auth::user()->tipo == 'administrador')
					        			<a href="{{ url('pagos/editar/' . $dato->id) }}" class="btn btn-success"><i class="pe-7s-pen"> </i></a>
					        			<button data-toggle="modal" data-target="#mensaje-modal" onclick="crear_link('{{ url('pagos/eliminar/' . $dato->id) }}');" class="btn btn-danger"><i class="pe-7s-trash"> </i></button>
					        			@endif
					        		</div>
					        	</td>
					        </tr>
					        @section('modalfooter')
					        	<div id="boton">

					        	</div>
		        			@endsection
					    @endforeach
						</tbody>
					</table>
					<div class="header">
						<h4><strong>Restante: </strong>Q. {{ $abonado }}</h4>
						</div>
					<hr>
					<div class="text-center">
						{!!$datos->render()!!}
					</div>
				<?php
			}
		?>
	</div>
</div>
@endsection

@section('modalheader')
	<h3>Eliminar</h3>
@endsection

@section('modalbody')
	<p>¿Está seguro que desea eliminar el pago de forma permanente?</p>
@endsection