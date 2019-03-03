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
						{{ $expedientes[0]->numero . ' ' . $expedientes[0]->anio }}
					</h2>
					<p class="description">
						<h4><strong>Fecha de alta: </strong>{{ $expedientes[0]->fecha_alta }}</h4>
						<h4><strong>Tipo: </strong>{{ $expedientes[0]->tipo }}</h4>
						<h4><strong>Estado: </strong>{{ $expedientes[0]->estado }}</h4>
						<button id="mostrar" onclick="mostrarTodo()" class="btn btn-info">Mostrar todo</button>
						<div id="mas" style="display: none">
							<h5><strong>Tipo de procedimiento: </strong>{{ $expedientes[0]->procedimiento }}</h5>
							<h5><strong>Tipo de asunto: </strong>{{ $expedientes[0]->asunto }}</h5>
							<h5><strong>Descripcion: </strong>{{ $expedientes[0]->descripcion }}</h5>
							<h5><strong>Fecha de cierre: </strong>{{ $expedientes[0]->fecha_cierre }}</h5>
							<h5><strong>Notas: </strong>{{ $expedientes[0]->notas }}</h5>
						</div>
					</p>
				</div>
			</div>
		</div>
	</div>
@endsection