@extends('layouts.app')

@section('navleft')
<li>
   <a href="{{ url('trabajadores/agregar') }}">
        <i class="pe-7s-add-user"></i>
    </a>
</li>
@endsection

@section('contenido')
<div class="card">
	<div class="header">
		<h4 class="title">Archivos</h4>
		<p class="category">Editar un archivo del trabajador</p>
	</div>
	<div class="content">
		<form method="post" action="{{ url('archivos/trabajadores/editar') }}" enctype="multipart/form-data">
			{{ csrf_field() }}
			<input type="hidden" id="id" name="id" value="{{ $archivos[0]->id }}">
			<input type="hidden" id="trabajador-id" name="trabajador-id" value="{{ $archivos[0]->trabajador_id }}">
			<div class="panel panel-primary">
				<div class="panel-heading">Descripción del Archivo</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
		                        <label for="recibo">Descripción</label>
		                        <textarea class="form-control" placeholder="Descripción" id="descripcion" name="descripcion">{{ $archivos[0]->descripcion }}</textarea>
		                    </div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
		                        <label for="observaciones">Observaciones</label>
		                        <textarea class="form-control" placeholder="Observaciones" id="observaciones" name="observaciones">{{ $archivos[0]->observaciones }}</textarea>
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