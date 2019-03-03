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
		<h4 class="title">Abonos</h4>
		<p class="category">Editar un abono del cliente</p>
	</div>
	<div class="content">
		<form method="post" action="{{ url('pagos/editar') }}">
			{{ csrf_field() }}
			<input type="hidden" id="id" name="id" value="{{ $pago[0]->id }}">
			<input type="hidden" id="cuenta-id" name="cuenta-id" value="{{ $pago[0]->cuenta_id }}">
			<div class="panel panel-primary">
				<div class="panel-heading">Información de Pago</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="fecha">Fecha de abono</label>
		                        <input type="text" onkeyup="calcularTotal();" required="" name="fecha" id="fecha" class="form-control" placeholder="Fecha de abono" value="{{ $pago[0]->fecha }}">
		                    </div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="recibo">Recibo</label>
		                        <input type="text" onkeyup="calcularTotal();" required="" name="recibo" id="recibo" class="form-control" placeholder="Recibo" value="{{ $pago[0]->recibo }}">
		                    </div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="abono">Abono</label>
		                        <input type="text" disabled="" required="" name="abono" id="abono" class="form-control" placeholder="Cantidad a abonar" value="{{ $pago[0]->abono }}">
		                    </div>
						</div>
					</div>
				</div>
			</div>
			<input type="submit" class="btn btn-primary" value="Guardar">
		</form>
	</div>
</div>
@endsection