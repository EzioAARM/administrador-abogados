@extends('layouts.app')

@section('navleft')
<li>
   <a href="{{ url('trabajadores/busqueda') }}">
        <i class="fa fa-search"></i>
    </a>
</li>
<li>
   <a href="{{ url('trabajadores/agregar') }}">
        <i class="pe-7s-add-user"></i>
    </a>
</li>
@endsection

@section('contenido')
<div class="card">
	<div class="header">
		<h4 class="title">Trabajadores</h4>
		<p class="category">Agregar un nuevo trabajador</p>
	</div>
	<div class="content">
		<form method="post" action="{{ url('trabajadores/agregar') }}">
			{{ csrf_field() }}
			<div class="panel panel-primary">
				<div class="panel-heading">Información Personal</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="nombre">Nombre</label>
		                        <input type="text" name="nombre" id="nombre" class="form-control" required="" placeholder="Nombre" value="">
		                    </div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="apellido">Apellido</label>
		                        <input type="text" name="apellido" id="apellido" class="form-control" required="" placeholder="Apellido" value="">
		                    </div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="fecha-nacimiento">Fecha de Nacimiento</label>
		                        <input type="date" name="fecha-nacimiento" id="fecha-nacimiento" required="" class="form-control" placeholder="Fecha de Nacimiento" value="">
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
		                        <input type="text" name="direccion" id="direccion" required="" class="form-control" placeholder="Dirección" value="">
		                    </div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="departamento">Departamento</label>
		                        <input type="text" name="departamento" id="departamento" required="" class="form-control" placeholder="Departamento" value="">
		                    </div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="municipio">Municipio</label>
		                        <input type="text" name="municipio" id="municipio" required="" class="form-control" placeholder="Municipio" value="">
		                    </div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="correo">Correo Electrónico</label>
		                        <input type="email" name="correo" id="correo" required="" class="form-control" placeholder="Correo Electrónico" value="">
		                    </div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="website">Sitio Web</label>
		                        <input type="url" name="website" id="website" class="form-control" placeholder="Sitio Web" value="">
		                    </div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="telefono-movil">Teléfono Móvil</label>
		                        <input type="text" name="telefono-movil" required="" id="telefono-movil" class="form-control" placeholder="Teléfono Móvil" value="">
		                    </div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="telefono-casa">Teléfono de Casa</label>
		                        <input type="text" name="telefono-casa" id="telefono-casa" class="form-control" placeholder="Teléfono de Casa" value="">
		                    </div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="telefono-trabajo">Teléfono de Trabajo</label>
		                        <input type="text" name="telefono-trabajo" id="telefono-trabajo" class="form-control" placeholder="Teléfono de trabajo" value="">
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
		                        <textarea rows="4" id="notas" name="notas" class="form-control" placeholder="Notas"></textarea>
		                    </div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
		                        <label for="sede_id">Sede</label>
		                        <select class="form-control" id="sede_id" required="" name="sede_id">
		                        	@foreach ($sedes as $sede)
		                        		<option value="{{ $sede->id }}">{{ $sede->ubicacion }}</option>
		                        	@endforeach
		                        </select>
		                    </div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="fecha-ingreso">Fecha de Ingreso</label>
		                        <input type="date" name="fecha-ingreso" id="fecha-ingreso" class="form-control" placeholder="Fecha de Ingreso" value="">
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