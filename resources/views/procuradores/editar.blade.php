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
		<h4 class="title">Procuradores</h4>
		@if ($procurador[0]->tipo == 'propio')
			<p class="category">Editar un procurador a favor del cliente</p>
		@else 
			<p class="category">Editar un procurador contrario al cliente</p>
		@endif
	</div>
	<div class="content">
		<form method="post" action="{{ url('procuradores/editar') }}">
			{{ csrf_field() }}
			<input type="hidden" id="id" name="id" value="{{ $procurador[0]->id }}">
			<input type="hidden" id="tipo" name="tipo" value="{{ $procurador[0]->tipo }}">
			<input type="hidden" id="cliente-id" name="cliente-id" value="{{ $procurador[0]->cliente_id }}">
			<div class="panel panel-primary">
				<div class="panel-heading">Información Personal</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="nombre">Nombre</label>
		                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" value="{{ $procurador[0]->nombre }}">
		                    </div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="apellido">Apellido</label>
		                        <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Apellido" value="{{ $procurador[0]->apellido }}">
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
		                        <label for="telefono-movil">Teléfono Móvil</label>
		                        <input type="text" name="telefono-movil" id="telefono-movil" class="form-control" placeholder="Teléfono Móvil" value="{{ $procurador[0]->telefono_movil }}">
		                    </div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="telefono-trabajo">Teléfono de Trabajo</label>
		                        <input type="text" name="telefono-trabajo" id="telefono-trabajo" class="form-control" placeholder="Teléfono de Trabajo" value="{{ $procurador[0]->telefono_trabajo }}">
		                    </div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="correo">Correo Electrónico</label>
		                        <input type="email" name="correo" id="correo" class="form-control" placeholder="Correo Electrónico" value="{{ $procurador[0]->correo }}">
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
		                        <textarea rows="4" id="notas" name="notas" class="form-control" placeholder="Notas">{{ $procurador[0]->notas }}</textarea>
		                    </div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="comentarios">Comentarios</label>
		                        <input type="text" name="comentarios" id="comentarios" class="form-control" placeholder="Comentarios" value="{{ $procurador[0]->comentarios }}">
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