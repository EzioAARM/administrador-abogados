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
		<h4 class="title">Juzgados</h4>
		<p class="category">Agregar un nuevo juzgado al cliente</p>
	</div>
	<div class="content">
		<form method="post" action="{{ url('juzgados/agregar') }}">
			{{ csrf_field() }}
			<input type="hidden" id="cliente-id" name="cliente-id" value="{{ $cliente_id }}">
			<div class="panel panel-primary">
				<div class="panel-heading">Información Personal</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="nombre">Nombre</label>
		                        <input type="text" name="nombre" id="nombre" required="" class="form-control" placeholder="Nombre" value="">
		                    </div>
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-primary">
				<div class="panel-heading">Proceso</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="fase">Fase</label>
		                        <input type="text" name="fase" id="fase" class="form-control" placeholder="Fase" value="">
		                    </div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
		                        <label for="autos">Autos</label>
		                        <input type="text" required="" name="autos" id="autos" class="form-control" placeholder="Autos" value="">
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
		                        <label for="comentarios">Comentarios</label>
		                        <input type="text" name="comentarios" id="comentarios" class="form-control" placeholder="Comentarios" value="">
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