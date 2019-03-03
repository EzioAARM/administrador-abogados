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
		<h4 class="title">Abogados</h4>
		@if ($abogado[0]->tipo == 'propio')
			<p class="category">Editar un abogado a favor del cliente</p>
		@else 
			<p class="category">Editar un abogado contrario al cliente</p>
		@endif
	</div>
	<div class="content">
		<form method="post" action="{{ url('abogados/editar') }}">
			{{ csrf_field() }}
			<input type="hidden" id="id" name="id" value="{{ $abogado[0]->id }}">
			<input type="hidden" id="tipo" name="tipo" value="{{ $abogado[0]->tipo }}">
			<input type="hidden" id="cliente-id" name="cliente-id" value="{{ $abogado[0]->cliente_id }}">
			<div class="panel panel-primary">
				<div class="panel-heading">Información Personal</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="nombre">Nombre</label>
		                        <input type="text" required="" name="nombre" id="nombre" class="form-control" placeholder="Nombre" value="{{ $abogado[0]->nombre }}">
		                    </div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="apellido">Apellido</label>
		                        <input type="text" required="" name="apellido" id="apellido" class="form-control" placeholder="Apellido" value="{{ $abogado[0]->apellido }}">
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
		                        <label for="correo">Correo Electrónico</label>
		                        <input type="email" required="" name="correo" id="correo" class="form-control" placeholder="Correo Electrónico" value="{{ $abogado[0]->correo }}">
		                    </div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="telefono-movil">Teléfono Móvil</label>
		                        <input type="text" required="" name="telefono-movil" id="telefono-movil" class="form-control" placeholder="Teléfono Móvil" value="{{ $abogado[0]->telefono_movil }}">
		                    </div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="telefono-trabajo">Teléfono de Trabajo</label>
		                        <input type="text" name="telefono-trabajo" id="telefono-trabajo" class="form-control" placeholder="Teléfono de Trabajo" value="{{ $abogado[0]->telefono_trabajo }}">
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
		                        <textarea rows="4" id="notas" name="notas" class="form-control" placeholder="Notas">{{ $abogado[0]->notas }}</textarea>
		                    </div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="numero-colegiado">Número de Colegiado</label>
		                        <input type="text" required="" name="numero-colegiado" id="numero-colegiado" class="form-control" placeholder="Número de Colegiado" value="{{ $abogado[0]->numero_colegiado }}">
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