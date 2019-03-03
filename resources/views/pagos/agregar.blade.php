@extends('layouts.app')

@section('navleft') 
<li>
   <a href="{{ url('clientes/agregar') }}">
        <i class="pe-7s-add-user"></i>
    </a>
</li>
@endsection

@section('contenido')
<div class="card">
	<div class="header">
		<h4 class="title">Pagos</h4>
		<p class="category">Agregar un abono a la transacción</p>
	</div>
	<div class="content">
		<div class="row" id="errorVerificar" name="errorVerificar">
			
		</div>
	</div>
	<div class="content">
		<form method="post" action="{{ url('pagos/agregar') }}">
			{{ csrf_field() }}
			<input type="hidden" id="cuenta-id" name="cuenta-id" value="{{ $cuenta_id }}">
			<div class="panel panel-primary">
				<div class="panel-heading">Información de Pago</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="fecha">Fecha de abono</label>
		                        <input type="date" required="" name="fecha" id="fecha" class="form-control" placeholder="Fecha de abono" value="">
		                    </div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="recibo">Recibo</label>
		                        <input type="text" required="" name="recibo" id="recibo" class="form-control" placeholder="Recibo" value="">
		                    </div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="abono">Abono</label>
		                        <input type="text" onkeydown="verificar({{ $abonado }});" required="" name="abono" id="abono" class="form-control" placeholder="Cantidad a abonar" value="">
		                    </div>
						</div>
					</div>
				</div>
			</div>
			<div id="boton-guardar">
				<input type="submit" class="btn btn-primary" value="Guardar">
			</div>
		</form>
	</div>
</div>
<script>
	function verificar(abonado)
	{
		var abonadoCampo = document.getElementById('abono');
		var abonadoC = abonadoCampo.value;
		if (isNaN(abonadoC))
		{
			var muestraError = document.getElementById('errorVerificar');
			muestraError.innerHTML = '<div class="col-md-10 col-md-offset-1">' +
				'<div class="alert alert-danger fade in	" role="alert">' +
					'<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' +
					'<strong>Debe ingresar números solamente</strong>' +
				'</div>' +
			'</div>';
			var btn = document.getElementById('boton-guardar');
			btn.innerHTML = '<input type="submit" class="btn btn-primary disabled" value="Guardar" disabled>';
		} 
		else if (parseInt(abonadoC) > abonado)
		{
			var muestraError = document.getElementById('errorVerificar');
			muestraError.innerHTML = '<div class="col-md-10 col-md-offset-1">' +
				'<div class="alert alert-danger fade in	" role="alert">' +
					'<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' +
					'<strong>Se debe abonar la cantidad de: Q. ' + abonado +' o menos</strong>' +
				'</div>' +
			'</div>';
			var btn = document.getElementById('boton-guardar');
			btn.innerHTML = '<input type="submit" class="btn btn-primary disabled" value="Guardar" disabled>';
		}
		else if (parseInt(abonadoC) <= abonado)
		{
			var muestraError = document.getElementById('errorVerificar');
			muestraError.innerHTML = ' ';
			var btn = document.getElementById('boton-guardar');
			btn.innerHTML = '<input type="submit" class="btn btn-primary" value="Guardar">';
		}
	}
</script>
@endsection