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
						{{ $abogados[0]->nombre . ' ' . $abogados[0]->apellido }}
					</h2>
					<p class="description">
						<h4><strong>Correo: </strong>{{ $abogados[0]->correo }}</h4>
						<h4><strong>Teléfono móvil: </strong>{{ $abogados[0]->telefono_movil }}</h4>
						<button id="mostrar" onclick="mostrarTodo()" class="btn btn-info">Mostrar todo</button>
						<div id="mas" style="display: none">
							<h5><strong>Número de colegiado: </strong>{{ $abogados[0]->numero_colegiado }}</h5>
							<h5><strong>Teléfono del trabajo: </strong>{{ $abogados[0]->telefono_trabajo }}</h5>
							<h5><strong>Notas: </strong>{{ $abogados[0]->notas }}</h5>
						</div>
					</p>
				</div>
			</div>
		</div>
	</div>
@endsection