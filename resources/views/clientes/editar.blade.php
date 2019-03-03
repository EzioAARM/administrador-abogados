@extends('layouts.app')

@section('contenido')
<div class="card">
	<div class="header">
		<h4 class="title">Clientes</h4>
		<p class="category">Editar el cliente seleccionado</p>
	</div>
	<div class="content">
		<form method="post" action="{{ url('clientes/editar') }}">
			{{ csrf_field() }}
			<input type="hidden" value="{{ $clientes[0]->id }}" name="id" id="id">
			<div class="panel panel-primary">
				<div class="panel-heading">Información Personal</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="nombre">Nombre</label>
		                        <input type="text" name="nombre" id="nombre" class="form-control" required="" placeholder="Nombre" value="{{ $clientes[0]->nombre}}">
		                    </div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="apellido">Apellido</label>
		                        <input type="text" name="apellido" id="apellido" class="form-control" required="" placeholder="Apellido" value="{{ $clientes[0]->apellido}}">
		                    </div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="fecha-nacimiento">Fecha de Nacimiento</label>
		                        <input type="date" name="fecha-nacimiento" id="fecha-nacimiento" required="" class="form-control" placeholder="Fecha de Nacimiento" value="{{ $clientes[0]->fecha_nacimiento}}">
		                    </div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="panel panel-primary">
				<div class="panel-heading">Información de Contacto</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="direccion">Dirección</label>
		                        <input type="text" name="direccion" id="direccion" required="" class="form-control" placeholder="Dirección" value="{{ $clientes[0]->direccion}}">
		                    </div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="departamento">Departamento</label>
		                        <input type="text" name="departamento" id="departamento" required="" class="form-control" placeholder="Departamento" value="{{ $clientes[0]->departamento}}">
		                    </div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="municipio">Municipio</label>
		                        <input type="text" name="municipio" id="municipio" required="" class="form-control" placeholder="Municipio" value="{{ $clientes[0]->municipio}}">
		                    </div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="nacionalidad">Nacionalidad</label>
		                        <input type="text" name="nacionalidad" id="nacionalidad" required="" class="form-control" placeholder="Nacionalidad" value="{{ $clientes[0]->nacionalidad}}">
		                    </div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="correo">Correo Electrónico</label>
		                        <input type="email" name="correo" id="correo" required="" class="form-control" placeholder="Correo Electrónico" value="{{ $clientes[0]->correo}}">
		                    </div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="website">Sitio Web</label>
		                        <input type="url" name="website" id="website" class="form-control" placeholder="Sitio Web" value="{{ $clientes[0]->sitio_web}}">
		                    </div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="telefono-movil">Teléfono Móvil</label>
		                        <input type="text" name="telefono-movil" required="" id="telefono-movil" class="form-control" placeholder="Teléfono Móvil" value="{{ $clientes[0]->telefono_movil}}">
		                    </div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="telefono-casa">Teléfono de Casa</label>
		                        <input type="text" name="telefono-casa" id="telefono-casa" class="form-control" placeholder="Teléfono de Casa" value="{{ $clientes[0]->telefono_casa}}">
		                    </div>
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-primary">
				<div class="panel-heading">Otros</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
		                        <label for="notas">Notas</label>
		                        <textarea rows="4" id="notas" name="notas" class="form-control" placeholder="Notas">{{ $clientes[0]->notas }}</textarea>
		                    </div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="nombre-comercial">Nombre Comercial</label>
		                        <input type="text" name="nombre-comercial" id="nombre-comercial" class="form-control" placeholder="Nombre Comercial" value="{{ $clientes[0]->nombre_comercial}}">
		                    </div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
		                        <label for="sede">Sede</label>
		                        <select class="form-control" required="" id="sede" name="sede">
		                        	@foreach ($sedes as $sede)
		                        		@if ($sede->id == Auth::user()->sede_id)
		                        			<option value="{{ $sede->id }}" selected>{{ $sede->ubicacion }}</option>
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
			<button class="btn btn-primary"><i class="pe-7s-diskette"> </i> Guardar</button>
		</form>
	</div>
</div>
@endsection

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