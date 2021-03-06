@extends('layouts.app')

@section('navleft')
<li>
   <a href="{{ url('eventos/busqueda') }}">
        <i class="fa fa-search"></i>
    </a>
</li>
<li>
   <a href="{{ url('eventos/agregar/' . Auth::user()->username) }}">
        <i class="pe-7s-add-user"></i>
    </a>
</li>
@endsection

@section('contenido')
	<div class="card card-user">
		<div class="content">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<form method="POST" action="{{ url('eventos/buscar') }}">
						{{ csrf_field() }}
						<label for="busqueda">
							Busqueda <small>La busqueda se realiza por el título del evento</small>
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
							 		Titulo
							 	</th>
							 	<th>
							 		Ubicación
							 	</th>
							 	<th>
							 		Descripción
							 	</th>
							 	<th>
							 		Fecha de Inicio
							 	</th>
							 	<th>
							 		Hora de Inicio
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
					        	<td>{{ $dato->titulo }}</td>
					        	<td>{{ $dato->ubicacion }}</td>
					        	<td>{{ $dato->descripcion }}</td>
					        	<td>{{ $dato->fecha_inicio }}</td>
					        	<td>{{ $dato->hora_inicio }}</td>
					        	<td>
					        		<div class="btn-group btn-group-xs" role="group" aria-label="Acciones">
					        			<a href="{{ url('eventos/completa/' . $dato->id) }}" class="btn btn-primary"><i class="pe-7s-look"> </i></a>
					        			<a href="{{ url('eventos/editar/' . $dato->id) }}" class="btn btn-success"><i class="pe-7s-pen"> </i></a>
					        			<button data-toggle="modal" data-target="#mensaje-modal" onclick="crear_link('{{ url('eventos/eliminar/' . $dato->id) }}');" class="btn btn-danger"><i class="pe-7s-trash"> </i></button>
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