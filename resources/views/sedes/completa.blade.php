@extends('layouts.app')

@section('navleft') 
<li>
   <a href="{{ url('sedes/agregar') }}">
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
						{{ $sedes[0]->ubicacion }}
					</h2>
				</div>
			</div>
		</div>
	</div>
@endsection