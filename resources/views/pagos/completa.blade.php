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
						{{ $pagos[0]->recibo }}
					</h2>
					<p class="description">
						<h4><strong>Abonado: </strong>{{ $pagos[0]->abono }}</h4>
						<h4><strong>Fecha de abono: </strong>{{ $pagos[0]->fecha }}</h4>
					</p>
				</div>
			</div>
		</div>
	</div>
@endsection