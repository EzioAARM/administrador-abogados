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
		<h4 class="title">Archivos</h4>
		<p class="category">Agregar un nuevo archivo del cliente</p>
	</div>
	<div class="content">
		<div class="row" id="errorVerificar" name="errorVerificar">
			
		</div>
	</div>
	<div class="content">
		<form method="post" action="{{ url('archivos/agregar') }}" enctype="multipart/form-data">
			{{ csrf_field() }}
			<input type="hidden" id="cliente-id" name="cliente-id" value="{{ $cliente_id }}">
			<div class="panel panel-primary">
				<div class="panel-heading">Descripción del Archivo</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
		                        <label for="recibo">Descripción</label>
		                        <textarea class="form-control" placeholder="Descripción" id="descripcion" name="descripcion"></textarea>
		                    </div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
		                        <label for="observaciones">Observaciones</label>
		                        <textarea class="form-control" placeholder="Observaciones" id="observaciones" name="observaciones"></textarea>
		                    </div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label class="btn btn-primary btn-file">
							    <i class="pe-7s-cloud-upload"> </i> Seleccionar Archivo <input type="file" style="display: none;" id="archivo" name="archivo" >
							</label>
						</div>
					</div>
				</div>
			</div>
			<input type="submit" class="btn btn-primary" value="Guardar">
		</form>
	</div>
</div>
@endsection