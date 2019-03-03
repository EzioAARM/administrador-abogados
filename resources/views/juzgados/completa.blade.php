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
						{{ $juzgados[0]->nombre }}
					</h2>
					<p class="description">
						<h4><strong>Autos: </strong>{{ $juzgados[0]->autos }}</h4>
						<h4><strong>Fase: </strong>{{ $juzgados[0]->fase }}</h4>
						<button id="mostrar" onclick="mostrarTodo()" class="btn btn-info">Mostrar todo</button>
						<div id="mas" style="display: none">
							<h5><strong>Notas: </strong>{{ $juzgados[0]->notas }}</h5>
							<h5><strong>Comentarios: </strong>{{ $juzgados[0]->comentarios }}</h5>
						</div>
					</p>
				</div>
			</div>
		</div>
	</div>
@endsection