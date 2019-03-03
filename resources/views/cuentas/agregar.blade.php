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
		<h4 class="title">Cuentas</h4>
		<p class="category">Agregar una nueva transacción al cliente</p>
	</div>
	<div class="content">
		<form method="post" action="{{ url('cuentas/agregar') }}">
			{{ csrf_field() }}
			<input type="hidden" id="sede-id" name="sede-id" value="{{ $sede_id }}">
			<input type="hidden" id="cliente-id" name="cliente-id" value="{{ $cliente_id }}">
			<div class="panel panel-primary">
				<div class="panel-heading">Información de Pago</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="cantidad-servicios">Cantidad de servicios</label>
		                        <input type="text" onkeyup="calcularTotal();" required="" name="cantidad-servicios" id="cantidad-servicios" class="form-control" placeholder="Cantidad de servicios" value="">
		                    </div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="precio-unidad">Precio por servicio</label>
		                        <input type="text" onkeyup="calcularTotal();" required="" name="precio-unidad" id="precio-unidad" class="form-control" placeholder="Precio por servicio" value="">
		                    </div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="total">Total</label>
		                        <input type="text" disabled="" required="" name="total" id="total" class="form-control" placeholder="Cantidad de servicios" value="">
		                    </div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="panel panel-primary">
				<div class="panel-heading">Información de Transacción</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="fecha-alta">Fecha de alta</label>
		                        <input type="date" required="" name="fecha-alta" id="fecha-alta" class="form-control" placeholder="Fecha de alta" value="">
		                    </div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="tipo">Tipo de transacción</label>
		                        <input type="text" required="" name="tipo" id="tipo" class="form-control" placeholder="Tipo de transacción" value="">
		                    </div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="factura">Factura</label>
		                        <input type="text" required="" name="factura" id="factura" class="form-control" placeholder="Factura" value="">
		                    </div>
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-primary">
				<div class="panel-heading">Otros</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
		                        <label for="notas">Notas</label>
		                        <textarea rows="4" id="notas" name="notas" class="form-control" placeholder="Notas"></textarea>
		                    </div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="descripcion">Descripción</label>
		                        <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Descripción" value="">
		                    </div>
						</div>
					</div>
				</div>
			</div>
			<input type="submit" class="btn btn-primary" value="Guardar">
		</form>
	</div>
</div>
<script>
	function calcularTotal()
	{
		var totalCampo = document.getElementById('total');
		var cantidadServiciosCampo = document.getElementById('cantidad-servicios');
		var precioUnidadCampo = document.getElementById('precio-unidad');
		var cantidadServicios = parseInt(cantidadServiciosCampo.value);
		var precioUnidad = parseInt(precioUnidadCampo.value);
		if (isNaN(cantidadServicios))
		{
			cantidadServicios = 0;
			cantidadServiciosCampo.value = "";
		}
		if (isNaN(precioUnidad))
		{
			precioUnidad = 0;
			precioUnidadCampo.value = "";
		}
		totalCampo.value = String(cantidadServicios * precioUnidad);
	}
</script>
@endsection