@extends('layouts.app')

@section('navleft')
<li>
   <a href="{{ url('eventos/busqueda') }}">
        <i class="fa fa-search"></i>
    </a>
</li>
<li>
   <a href="{{ url('eventos/agregar/' . Auth::user()->username) }}">
        <i class="pe-7s-add-user"></i>
    </a>
</li>
@endsection

@section('contenido')
<div class="card">
	<div class="header">
		<h4 class="title">Eventos</h4>
		<p class="category">Agregar un nuevo evento</p>
	</div>
	<div class="content">
		<form method="post" action="{{ url('eventos/agregar') }}">
			{{ csrf_field() }}
			<input type="hidden" id="username" name="username" value="{{ Auth::user()->username }}">
			<div class="panel panel-primary">
				<div class="panel-heading">Información del Evento</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="titulo">Titulo</label>
		                        <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Ubicacion" value="">
		                    </div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="ubicacion">Ubicacion</label>
		                        <input type="text" name="ubicacion" id="ubicacion" class="form-control" placeholder="Ubicacion" value="">
		                    </div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="descripcion">Descripción</label>
		                        <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Descripción" value="">
		                    </div>
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-primary">
				<div class="panel-heading">Datos de Realización</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="fecha-inicio">Fecha de Inicio</label>
		                        <input type="date" name="fecha-inicio" id="fecha-inicio" class="form-control" placeholder="Fecha de Inicio" value="">
		                    </div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="hora-inicio">Hora de Inicio</label>
		                        <input type="time" name="hora-inicio" id="hora-inicio" class="form-control" placeholder="Hora de Inicio" value="">
		                    </div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="fecha-fin">Fecha de Finalización</label>
		                        <input type="date" name="fecha-fin" id="fecha-fin" class="form-control" placeholder="Fecha de Finalización" value="">
		                    </div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="hora-fin">Hora de Finalización</label>
		                        <input type="time" name="hora-fin" id="hora-fin" class="form-control" placeholder="Hora de Finalización" value="">
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