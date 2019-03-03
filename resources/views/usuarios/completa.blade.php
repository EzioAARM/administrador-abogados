@extends('layouts.app')

@section('navleft')
<li>
   <a href="{{ url('usuarios/busqueda') }}">
        <i class="fa fa-search"></i>
    </a>
</li>
<li>
   <a href="{{ url('usuarios/agregar') }}">
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
						{{ $usuarios[0]->username}}
						<small>{{ $usuarios[0]->tipo }}</small>
					</h2>
				</div>
			</div>
		</div>
	</div>
@endsection