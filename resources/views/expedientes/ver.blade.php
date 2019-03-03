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
			Expedientes
		</h4>
		<p class="category">
			Listado de expedientes de un cliente en especifico
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
					<strong>No se encontró ningún expediente en la base de datos.</strong>
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
							 		Número
							 	</th>
							 	<th>
							 		Año
							 	</th>
							 	<th>
							 		Fecha de alta
							 	</th>
							 	<th>
							 		Tipo
							 	</th>
							 	<th>
							 		Estado
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
					        	<td>{{ $dato->numero }}</td>
					        	<td>{{ $dato->anio }}</td>
					        	<td>{{ $dato->fecha_alta }}</td>
					        	<td>{{ $dato->tipo }}</td>
					        	<td>{{ $dato->estado }}</td>
					        	<td>
					        		<div class="btn-group btn-group-xs" role="group" aria-label="Acciones">
					        			<a href="{{ url('expedientes/completa/' . $dato->id) }}" class="btn btn-primary"><i class="pe-7s-look"> </i></a>
					        			@if (Auth::user()->tipo == 'administrador')
					        			<a href="{{ url('expedientes/editar/' . $dato->id) }}" class="btn btn-success"><i class="pe-7s-pen"> </i></a>
					        			<button data-toggle="modal" data-target="#mensaje-modal" onclick="crear_link('{{ url('expedientes/eliminar/' . $dato->id) }}');" class="btn btn-danger"><i class="pe-7s-trash"> </i></button>
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
	<p>¿Está seguro que desea eliminar el expediente de forma permanente?</p>
@endsection