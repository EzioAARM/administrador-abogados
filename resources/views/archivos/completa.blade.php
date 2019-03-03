@extends('layouts.app')

@section('navleft')
<li>
   <a href="{{ url('clientes/agregar') }}">
        <i class="pe-7s-add-user"></i>
    </a>
</li>
@endsection

@section('contenido')
	<div class="card card-user">
		<div class="image">
			<img src="http://administrador.abogadosynotariosroldan.com/assets/img/imagen-vista.jpg" alt="..."/>
		</div>
		<div class="content">
			<div class="row">
				<div class="col-md-7 col-md-offset-1">
					<h2 class="title">
						{{ $archivos[0]->nombre }}
					</h2>
					<p class="description">
						<h4><strong>Descripción: </strong>{{ $archivos[0]->descripcion }}</h4>
						<h4><strong>Observaciones: </strong>{{ $archivos[0]->observaciones }}</h4>
						<h4><strong>Tipo de archivo: </strong>{{ $archivos[0]->extension }}</h4>
						<a href="{{ url('clientes/archivo/descargar/' . $archivos[0]->nombre_servidor . '/' . $archivos[0]->cliente_id) }}" class="btn btn-success"><i class="pe-7s-cloud-download"> </i> Descargar Archivo</a>
					</p>
				</div>
			</div>
		</div>
	</div>
@endsection