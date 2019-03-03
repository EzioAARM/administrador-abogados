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
		<p class="category">Agregar un nuevo usuario</p>
	</div>
	<div class="content">
		<form method="post" action="{{ url('usuarios/agregar') }}">
			{{ csrf_field() }}
			<div class="panel panel-primary">
				<div class="panel-heading">Información de Usuario</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="username">Nombre de usuario</label>
		                        <input type="text" name="username" required="" id="username" class="form-control" placeholder="Nombre de usuario" value="">
		                    </div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="password">Contraseña</label>
		                        <input type="password" name="password" required="" id="password" class="form-control" placeholder="Contraseña" value="">
		                    </div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="tipo">Tipo de usuario</label>
		                        <select name="tipo" id="tipo" required="" class="form-control" placeholder="Tipo de usuario" >
		                        	<option value="administrador">Administrador</option>
		                        	<option selected="" value="normal">Empleado</option>
		                        </select>
		                    </div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="trabajador-id">Trabajador</label>
		                        <select required="" name="trabajador-id" id="trabajador-id" class="form-control" placeholder="Trabajador">
		                        	@foreach ($trabajadores as $trabajador)
		                        		<option value="{{ $trabajador->id }}">{{ $trabajador->nombre . " " . $trabajador->apellido }}</option>
		                        	@endforeach
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
		                        		<option value="{{ $sede->id }}">{{ $sede->ubicacion }}</option>
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