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
						{{ $cuentas[0]->tipo }}
					</h2>
					<p class="description">
						<h4><strong>Fecha de alta: </strong>{{ $cuentas[0]->fecha_alta }}</h4>
						<h4><strong>Cantidad de servicios: </strong>{{ $cuentas[0]->cantidad_servicios }}</h4>
						<h4><strong>Precio por servicio: </strong>Q. {{ $cuentas[0]->precio_unidad }}</h4>
						<h4><strong>Total: </strong>Q. {{ $cuentas[0]->total }}</h4>
						<button id="mostrar" onclick="mostrarTodo()" class="btn btn-info">Mostrar todo</button>
						<div id="mas" style="display: none">
							<h5><strong>Factura: </strong>{{ $cuentas[0]->factura }}</h5>
							<h5><strong>Notas: </strong>{{ $cuentas[0]->notas }}</h5>
							<h5><strong>Descripcion: </strong>{{ $cuentas[0]->descripcion }}</h5>
						</div>
					</p>
				</div>
				<div class="col-md-4">
					<div class="row">
						<div class="col-md-11" id="animacion">
							<h4>
								Pagos <span class="badge">{{ $cantidadPagos }}</span>
							</h4>
							<dl id="listaAnimacion">
								<a href="{{ url('pagos/ver/' . $cuentas[0]->id) }}">
									<dt>Ver</dt>
									<dd>Ver los abonos realizados a esta cuenta</dd>
								</a>
								<a href="{{ url('pagos/agregar/' . $cuentas[0]->id) }}">
									<dt>Agregar</dt>
									<dd>Agregar un nuevo abono a esta cuenta</dd>
								</a>
							</dl>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection