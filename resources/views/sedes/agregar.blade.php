@extends('layouts.app')

@section('navleft') 
<li>
   <a href="{{ url('sedes/agregar') }}">
        <i class="pe-7s-add-user"></i>
    </a>
</li>
@endsection

@section('contenido')
<div class="card">
	<div class="header">
		<h4 class="title">Sedes</h4>
		<p class="category">Agregar una nueva sede</p>
	</div>
	<div class="content">
		<form method="post" action="{{ url('sedes/agregar') }}">
			{{ csrf_field() }}
			<div class="panel panel-primary">
				<div class="panel-heading">Información de Ubicación</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="Ubicacion">Dirección</label>
		                        <input type="text" name="ubicacion" id="ubicacion" class="form-control" placeholder="Ubicacion" value="">
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