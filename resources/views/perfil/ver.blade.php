@extends('layouts.app')

@section('contenido')
<div class="card">
	<div class="header">
		<h3 class="title">
			Perfil
		</h3>
	</div>
	@if(Session::has('flash_message'))
		<div class="content">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="alert alert-success fade in" role="alert">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>La operación se realizó correctamente</strong>
					</div>
				</div>
			</div>
				
		</div>
	@endif
	@if(Session::has('password_error'))
		<div class="content">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="alert alert-danger fade in" role="alert">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Las contraseñas no coinciden o la contraseña ingresada es incorrecta</strong>
					</div>
				</div>
			</div>
		</div>
	@endif
	<div class="image">
		<img src="http://administrador.abogadosynotariosroldan.com/assets/img/imagen-vista.jpg" alt="..."/>
	</div>
	<div class="content">
		<div class="row">
			<div class="col-md-7 col-md-offset-1">
				<h2 class="title">
					{{ Auth::user()->username }}
				</h2>
				<p class="description">
					<h4><strong>Contraseña: </strong><small><button class="btn btn-success" id="botonMostrar" onclick="mostrarCambio();">Cambiar contraseña</button></small></h4>
					<form id="formularioMostrar" style="display:none;" method="post" action="{{ url('perfil/editar') }}">
						{{ csrf_field() }}
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
			                        <label for="password">Contraseña actual</label>
			                        <input type="password" name="password" id="password" required="" class="form-control" placeholder="Contraseña actual" value="">
			                    </div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
			                        <label for="password1">Nueva contraseña</label>
			                        <input type="password" name="password1" id="password1" required="" class="form-control" placeholder="Nueva Contraseña" value="">
			                    </div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
			                        <label for="password2">Repita la contraseña nueva</label>
			                        <input type="password" name="password2" id="password2" required="" class="form-control" placeholder="Repita la contraseña nueva" value="">
			                    </div>
							</div>
						</div>
						<input type="submit" class="btn btn-primary" value="Actualizar">
						<button class="btn" onclick="mostrarCambioCancelar()">Cancelar</button>
					</form>
					<h4><strong>Tipo de usuario: </strong>{{ Auth::user()->tipo }}</h4>
				</p>
			</div>
		</div>
	</div>
</div>
<script>
	function mostrarCambio()
	{
		document.getElementById('formularioMostrar').style.display = 'block';
		document.getElementById('botonMostrar').style.display = 'none';
	}
	function mostrarCambioCancelar()
	{
		document.getElementById('formularioMostrar').style.display = 'none';
		document.getElementById('botonMostrar').style.display = 'inline-block';
	}
</script>
@endsection