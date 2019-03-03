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
		<h4 class="title">Expedientes</h4>
		<p class="category">Editar un expediente del cliente</p>
	</div>
	<div class="content">
		<form method="post" action="{{ url('expedientes/editar') }}">
			{{ csrf_field() }}
			<input type="hidden" id="id" name="id" value="{{ $expediente[0]->id }}">
			<input type="hidden" id="cliente-id" name="cliente-id" value="{{ $expediente[0]->cliente_id }}">
			<div class="panel panel-primary">
				<div class="panel-heading">Información de Creación</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="numero">Número</label>
		                        <input type="text" required="" name="numero" id="numero" class="form-control" placeholder="Número" value="{{ $expediente[0]->numero }}">
		                    </div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="anio">Año</label>
		                        <input type="text" required="" name="anio" id="anio" class="form-control" placeholder="Año" value="{{ $expediente[0]->anio }}">
		                    </div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="fecha-alta">Fecha de alta</label>
		                        <input type="date" required="" name="fecha-alta" id="fecha-alta" class="form-control" placeholder="Fecha de Alta" value="{{ $expediente[0]->fecha_alta }}">
		                    </div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="tipo">Tipo de Expediente</label>
		                        <input type="text" required="" name="tipo" id="tipo" class="form-control" placeholder="Tipo de Expediente" value="{{ $expediente[0]->tipo }}">
		                    </div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="panel panel-primary">
				<div class="panel-heading">Información de Procesos</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="procedimiento">Tipo de procedimiento</label>
		                        <input type="text" name="procedimiento" id="procedimiento" class="form-control" placeholder="Tipo de procedimiento" value="{{ $expediente[0]->procedimiento }}">
		                    </div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="asunto">Tipo de asunto</label>
		                        <input type="text" name="asunto" id="asunto" class="form-control" placeholder="Tipo de asunto" value="{{ $expediente[0]->asunto }}">
		                    </div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="estado">Estado</label>
		                        <input type="text" required="" name="estado" id="estado" class="form-control" placeholder="Estado" value="{{ $expediente[0]->estado }}">
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
		                        <textarea rows="4" id="notas" name="notas" class="form-control" placeholder="Notas">{{ $expediente[0]->notas }}</textarea>
		                    </div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
		                        <label for="descripcion">Descripción</label>
		                        <textarea rows="4" id="descripcion" name="descripcion" class="form-control" placeholder="Descripción">{{ $expediente[0]->descripcion }}</textarea>
		                    </div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="fecha-cierre">Fecha de cierre</label>
		                        <input type="date" name="fecha-cierre" id="fecha-cierre" class="form-control" placeholder="Fecha de cierre" value="{{ $expediente[0]->fecha_cierre }}">
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