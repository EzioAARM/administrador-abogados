@extends('layouts.app')

@section('navleft')
<li>
   <a href="{{ url('clientes/busqueda') }}">
        <i class="fa fa-search"></i>
    </a>
</li>
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
			Clientes
		</h4>
		<p class="category">
			Listado de clientes que asisten a esta sucursal en especifico
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
					<strong>No se encontró ningún cliente en la base de datos.</strong>
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
							 		Nombre
							 	</th>
							 	<th>
							 		Apellido
							 	</th>
							 	<th>
							 		Fecha de Nacimiento
							 	</th>
							 	<th>
							 		Correo Electrónico
							 	</th>
							 	<th>
							 		Teléfono Móvil
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
					        	<td>{{ $dato->nombre }}</td>
					        	<td>{{ $dato->apellido }}</td>
					        	<td>{{ $dato->fecha_nacimiento }}</td>
					        	<td>{{ $dato->correo }}</td>
					        	<td>{{ $dato->telefono_movil }}</td>
					        	<td>
					        		<div class="btn-group btn-group-xs" role="group" aria-label="Acciones">
					        			<a href="{{ url('clientes/completa/' . $dato->id) }}" class="btn btn-primary"><i class="pe-7s-look"> </i></a>
					        			@if (Auth::user()->tipo == 'administrador')
					        			<a href="{{ url('clientes/editar/' . $dato->id) }}" class="btn btn-success"><i class="pe-7s-pen"> </i></a>
					        			<button data-toggle="modal" data-target="#mensaje-modal" onclick="crear_link('{{ url('clientes/eliminar/' . $dato->id) }}');" class="btn btn-danger"><i class="pe-7s-trash"> </i></button>
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
	<p>¿Está seguro que desea eliminar el cliente de forma permanente?</p>
@endsection