@extends('layouts.app')

@section('navleft')
<li>
   <a href="{{ url('trabajadores/busqueda') }}">
        <i class="fa fa-search"></i>
    </a>
</li>
<li>
   <a href="{{ url('trabajadores/agregar') }}">
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
						{{ $trabajadores[0]->nombre . ' ' . $trabajadores[0]->apellido }}
					</h2>
					<p class="description">
						<h4><strong>Fecha de nacimiento: </strong>{{ $trabajadores[0]->fecha_nacimiento }}</h4>
						<h4><strong>Dirección: </strong>{{ $trabajadores[0]->direccion }}</h4>
						<h4><strong>Correo: </strong>{{ $trabajadores[0]->correo }}</h4>
						<h4><strong>Teléfono móvil: </strong>{{ $trabajadores[0]->telefono_movil }}</h4>
						<button id="mostrar" onclick="mostrarTodo()" class="btn btn-info">Mostrar todo</button>
						<div id="mas" style="display: none">
							<h5><strong>Departamento: </strong>{{ $trabajadores[0]->departamento }}</h5>
							<h5><strong>Municipio: </strong>{{ $trabajadores[0]->municipio }}</h5>
							<h5><strong>Sitio web: </strong>{{ $trabajadores[0]->sitio_web }}</h5>
							<h5><strong>Teléfono de casa: </strong>{{ $trabajadores[0]->telefono_casa }}</h5>
							<h5><strong>Teléfono del trabajo: </strong>{{ $trabajadores[0]->telefono_trabajo }}</h5>
							<h5><strong>Fecha de ingreso: </strong>{{ $trabajadores[0]->fecha_ingreso }}</h5>
							<h5><strong>Notas: </strong>{{ $trabajadores[0]->notas }}</h5>
						</div>
					</p>
				</div>
				<div class="col-md-4">
					<div class="row">
						<div class="col-md-11" id="animacion">
							<h4>
								Archivos <span class="badge">{{ $cantidadArchivos }}</span>
							</h4>
							<dl id="listaAnimacion">
								<a href="{{ url('archivos/trabajadores/ver/' . $trabajadores[0]->id) }}">
									<dt>Ver</dt>
									<dd>Ver los archivos que tiene este cliente.</dd>
								</a>
								<a href="{{ url('archivos/trabajadores/agregar/' . $trabajadores[0]->id) }}">
									<dt>Agregar</dt>
									<dd>Agregar un nuevo archivo a este cliente.</dd>
								</a>
							</dl>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection