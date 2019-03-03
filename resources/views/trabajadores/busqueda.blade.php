@extends('layouts.app')

@section('navleft')
<li>
   <a href="{{ url('trabajadores/busqueda') }}">
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
	<div class="card card-user">
		<div class="content">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<form method="POST" action="{{ url('trabajadores/buscar') }}">
						{{ csrf_field() }}
						<label for="busqueda">
							Busqueda <small>La busqueda se realiza por nombre</small>
						</label>
						<div class="row">
							<div class="col-md-10">
								<input type="text" id="busqueda" name="busqueda" class="form-control" placeholder="Ingrese su busqueda">
						
							</div>
							<div class="col-md-2">
								<input type="submit" value="Buscar" class="btn btn-primary">
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="row">
				@if($mensaje == 'escribir')
					<div class="content">
						<div class="row">
							<div class="col-md-10 col-md-offset-1">
								<div class="alert alert-info fade in	" role="alert">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									<strong>Ingrese su busqueda y presione el botón buscar.</strong>
								</div>
							</div>
						</div>
					</div>
				@else
					<div class="content table-responsive table-full-width">
		<?php
			if (count($datos) == 0){
				echo('<div class="alert alert-danger" role="alert">
					<strong>No se encontró ningún abogado en la base de datos.</strong>
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
					        			<a href="{{ url('trabajadores/completa/' . $dato->id) }}" class="btn btn-primary"><i class="pe-7s-look"> </i></a>
					        			@if (Auth::user()->tipo == 'administrador')
					        			<a href="{{ url('trabajadores/editar/' . $dato->id) }}" class="btn btn-success"><i class="pe-7s-pen"> </i></a>
					        			<button data-toggle="modal" data-target="#mensaje-modal" onclick="crear_link('{{ url('trabajadores/eliminar/' . $dato->id) }}');" class="btn btn-danger"><i class="pe-7s-trash"> </i></button>
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
				@endif 
			</div>
		</div>
	</div>


@endsection