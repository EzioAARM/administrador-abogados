@extends('layouts.app')

@section('navleft')
<li>
   <a href="{{ url('usuarios/busqueda') }}">
        <i class="fa fa-search"></i>
    </a>
</li>
<li>
   <a href="{{ url('usuarios/agregar') }}">
        <i class="pe-7s-add-user"></i>
    </a>
</li>
@endsection

@section('contenido')
<div class="card">
	<div class="header">
		<h4 class="title">Usuarios</h4>
		<p class="category">Editar un usuario</p>
	</div>
	<div class="content">
		<form method="post" action="{{ url('usuarios/editar') }}">
			{{ csrf_field() }}
			<div class="panel panel-primary">
				<div class="panel-heading">Información de Usuario</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="tipo">Tipo de usuario</label>
		                        <select name="tipo" id="tipo" required="" class="form-control" placeholder="Tipo de usuario" value="{{ $usuarios[0]->tipo }}">
		                        	@if ($usuarios[0]->tipo == 'administrador')
		                        		<option selected="" value="administrador">Administrador</option>
		                        		<option value="normal">Empleado</option>
		                        	@else
		                        		<option value="administrador">Administrador</option>
		                        		<option selected="" value="normal">Empleado</option>
		                        	@endif
		                        </select>
		                    </div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="tipo">Sede</label>
		                        <select name="sede-id" id="sede-id" required="" name="tipo" id="tipo" class="form-control" placeholder="Tipo de usuario">
		                        	@foreach ($sedes as $sede)
		                        		@if ($sede->id == $usuarios[0]->sede_id)
		                        			<option selected="" value="{{ $sede->id }}">{{ $sede->ubicacion }}</option>
		                        		@else
		                        			<option value="{{ $sede->id }}">{{ $sede->ubicacion }}</option>
		                        		@endif
		                        	@endforeach
		                        </select>
		                    </div>
						</div>
					</div>
				</div>
			</div>
			<input type="submit" class="btn btn-primary" value="Guardar">
		</form>
	</div>
</div>
@endsection