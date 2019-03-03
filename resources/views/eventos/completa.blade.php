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
	<div class="card card-user">
		<div class="image">
			<img src="http://administrador.abogadosynotariosroldan.com/assets/img/imagen-vista.jpg" alt="..."/>
		</div>
		<div class="content">
			<div class="row">
				<div class="col-md-11 col-md-offset-1">
					<h2 class="title">
						{{ $eventos[0]->titulo }}
						<small>{{ $eventos[0]->ubicacion }}</small>
					</h2>
					<p class="description">
						<h4><strong>Descripción: </strong>{{ $eventos[0]->descripcion }}</h4>
						<h4><strong>Fecha de Inicio: </strong>{{ $eventos[0]->fecha_inicio }}</h4>
						<h4><strong>Hora de Inicio: </strong>{{ $eventos[0]->hora_inicio }}</h4>
						<h4><strong>Fecha de Finalización: </strong>{{ $eventos[0]->fecha_fin }}</h4>
						<h4><strong>Hora de Finalización: </strong>{{ $eventos[0]->hora_fin }}</h4>
					</p>
				</div>
			</div>
		</div>
	</div>
@endsection