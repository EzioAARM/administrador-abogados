@extends('layouts.app')

@section('navleft')
<li>
   <a href="{{ url('clientes/busqueda') }}">
        <i class="fa fa-search"></i>
    </a>
</li>
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
						{{ $clientes[0]->nombre . ' ' . $clientes[0]->apellido }}
						<small>{{ $clientes[0]->nombre_comercial }}</small>
					</h2>
					<p class="description">
						<h4><strong>Fecha de nacimiento: </strong>{{ $clientes[0]->fecha_nacimiento }}</h4>
						<h4><strong>Dirección: </strong>{{ $clientes[0]->direccion }}</h4>
						<h4><strong>Correo: </strong>{{ $clientes[0]->correo }}</h4>
						<h4><strong>Teléfono móvil: </strong>{{ $clientes[0]->telefono_movil }}</h4>
						<button id="mostrar" onclick="mostrarTodo()" class="btn btn-info">Mostrar todo</button>
						<div id="mas" style="display: none">
							<h5><strong>Departamento: </strong>{{ $clientes[0]->departamento }}</h5>
							<h5><strong>Municipio: </strong>{{ $clientes[0]->municipio }}</h5>
							<h5><strong>Nacionalidad: </strong>{{ $clientes[0]->nacionalidad }}</h5>
							<h5><strong>Sitio web: </strong>{{ $clientes[0]->sitio_web }}</h5>
							<h5><strong>Teléfono de casa: </strong>{{ $clientes[0]->telefono_casa }}</h5>
							<h5><strong>Notas: </strong>{{ $clientes[0]->notas }}</h5>
						</div>
					</p>
				</div>
				<div class="col-md-4">
					<div class="row">
						<div class="col-md-11" id="animacion">
							<h4>
								Abogados Propios <span class="badge">{{ $cantidadAbogadosP }}</span>
							</h4>
							<dl id="listaAnimacion">
								<a href="{{ url('abogados/ver/propio/' . $clientes[0]->id) }}">
									<dt>Ver</dt>
									<dd>Ver los abogados que tiene este cliente.</dd>
								</a>
								<a href="{{ url('abogados/agregar/propio/' . $clientes[0]->id) }}">
									<dt>Agregar</dt>
									<dd>Agregar un nuevo abogado a este cliente.</dd>
								</a>
							</dl>
						</div>
					</div>
					<div class="row">
						<div class="col-md-11" id="animacion">
							<h4>
								Abogados Contrarios <span class="badge">{{ $cantidadAbogadosC }}</span>
							</h4>
							<dl id="listaAnimacion">
								<a href="{{ url('abogados/ver/contrario/' . $clientes[0]->id) }}">
									<dt>Ver</dt>
									<dd>Ver los abogados que tiene este cliente.</dd>
								</a>
								<a href="{{ url('abogados/agregar/contrario/' . $clientes[0]->id) }}">
									<dt>Agregar</dt>
									<dd>Agregar un nuevo abogado a este cliente.</dd>
								</a>
							</dl>
						</div>
					</div>
					<div class="row">
						<div class="col-md-11" id="animacion">
							<h4>
								Procuradores Propios <span class="badge">{{ $cantidadProcuradoresP }}</span>
							</h4>
							<dl id="listaAnimacion">
								<a href="{{ url('procuradores/ver/propio/' . $clientes[0]->id) }}">
									<dt>Ver</dt>
									<dd>Ver los procuradores que tiene este cliente.</dd>
								</a>
								<a href="{{ url('procuradores/agregar/propio/' . $clientes[0]->id) }}">
									<dt>Agregar</dt>
									<dd>Agregar un nuevo procurador a este cliente.</dd>
								</a>
							</dl>
						</div>
					</div>
					<div class="row">
						<div class="col-md-11" id="animacion">
							<h4>
								Procuradores Contrarios <span class="badge">{{ $cantidadProcuradoresC }}</span>
							</h4>
							<dl id="listaAnimacion">
								<a href="{{ url('procuradores/ver/contrario/' . $clientes[0]->id) }}">
									<dt>Ver</dt>
									<dd>Ver los procuradores que tiene este cliente.</dd>
								</a>
								<a href="{{ url('procuradores/agregar/contrario/' . $clientes[0]->id) }}">
									<dt>Agregar</dt>
									<dd>Agregar un nuevo procurador a este cliente.</dd>
								</a>
							</dl>
						</div>
					</div>
					<div class="row">
						<div class="col-md-11" id="animacion">
							<h4>
								Juzgados <span class="badge">{{ $cantidadJuzgados }}</span>
							</h4>
							<dl id="listaAnimacion">
								<a href="{{ url('juzgados/ver/' . $clientes[0]->id) }}">
									<dt>Ver</dt>
									<dd>Ver los juzgados que tiene este cliente.</dd>
								</a>
								<a href="{{ url('juzgados/agregar/' . $clientes[0]->id) }}">
									<dt>Agregar</dt>
									<dd>Agregar un nuevo juzgado a este cliente.</dd>
								</a>
							</dl>
						</div>
					</div>
					<div class="row">
						<div class="col-md-11" id="animacion">
							<h4>
								Expedientes <span class="badge">{{ $cantidadExpedientes }}</span>
							</h4>
							<dl id="listaAnimacion">
								<a href="{{ url('expedientes/ver/' . $clientes[0]->id) }}">
									<dt>Ver</dt>
									<dd>Ver los expedientes que tiene este cliente.</dd>
								</a>
								<a href="{{ url('expedientes/agregar/' . $clientes[0]->id) }}">
									<dt>Agregar</dt>
									<dd>Agregar un nuevo expediente a este cliente.</dd>
								</a>
							</dl>
						</div>
					</div>
					<div class="row">
						<div class="col-md-11" id="animacion">
							<h4>
								Transacciones <span class="badge">{{ $cantidadCuentas }}</span>
							</h4>
							<dl id="listaAnimacion">
								<a href="{{ url('cuentas/ver/' . $clientes[0]->id) }}">
									<dt>Ver</dt>
									<dd>Ver las transacciones que tiene este cliente.</dd>
								</a>
								<a href="{{ url('cuentas/agregar/' . $clientes[0]->id) }}">
									<dt>Agregar</dt>
									<dd>Agregar una nueva transacción a este cliente.</dd>
								</a>
							</dl>
						</div>
					</div>
					<div class="row">
						<div class="col-md-11" id="animacion">
							<h4>
								Archivos <span class="badge">{{ $cantidadArchivos }}</span>
							</h4>
							<dl id="listaAnimacion">
								<a href="{{ url('archivos/ver/' . $clientes[0]->id) }}">
									<dt>Ver</dt>
									<dd>Ver los archivos que tiene este cliente.</dd>
								</a>
								<a href="{{ url('archivos/agregar/' . $clientes[0]->id) }}">
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