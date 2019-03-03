<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'ClientesController@index');


Route::get('clientes', 'ClientesController@index')->name('clientesIndex');
Route::get('clientes/ver', 'ClientesController@index');
Route::get('clientes/completa/{id}', 'ClientesController@completa');
Route::get('clientes/busqueda', function(){
	return view('clientes.busqueda', ['mensaje' => 'escribir']);
});
Route::post('clientes/buscar', 'ClientesController@buscar');
Route::get('clientes/agregar', 'ClientesController@agregar');
Route::post('clientes/agregar', 'ClientesController@guardar');
Route::get('clientes/editar/{id}', 'ClientesController@editar');
Route::post('clientes/editar', 'ClientesController@actualizar');
Route::get('clientes/eliminar/{id}', function($id){
	$cliente = App\Cliente::find($id);
	$cliente->visible = 'no';
	$cliente->save();
	Session::flash('flash_message', 'c');
	return redirect()->route('clientesIndex');
});


Route::get('abogados/ver/{tipo}/{id}', 'AbogadosController@index');
Route::get('abogados/completa/{id}', 'AbogadosController@completa');
Route::get('abogados/agregar/{tipo}/{id}', 'AbogadosController@agregar');
Route::post('abogados/agregar', 'AbogadosController@guardar');
Route::get('abogados/editar/{id}', 'AbogadosController@editar');
Route::post('abogados/editar', 'AbogadosController@actualizar');
Route::get('abogados/eliminar/{id}', function($id){
	$Abogado = App\Abogado::find($id);
	$Abogado->visible = 'no';
	$tipo = $Abogado->tipo;
	$cliente_id = $Abogado->cliente_id;
	$Abogado->save();
	Session::flash('flash_message', 'c');
	return redirect('abogados/ver/' . $tipo . '/' . $cliente_id);
});


Route::get('procuradores/ver/{tipo}/{id}', 'ProcuradoresController@index');
Route::get('procuradores/completa/{id}', 'ProcuradoresController@completa');
Route::get('procuradores/agregar/{tipo}/{id}', 'ProcuradoresController@agregar');
Route::post('procuradores/agregar', 'ProcuradoresController@guardar');
Route::get('procuradores/editar/{id}', 'ProcuradoresController@editar');
Route::post('procuradores/editar', 'ProcuradoresController@actualizar');
Route::get('procuradores/eliminar/{id}', function($id){
	$Procurador = App\Procurador::find($id);
	$Procurador->visible = 'no';
	$tipo = $Procurador->tipo;
	$cliente_id = $Procurador->cliente_id;
	$Procurador->save();
	Session::flash('flash_message', 'c');
	return redirect('procuradores/ver/' . $tipo . '/' . $cliente_id);
});


Route::get('juzgados/ver/{id}', 'JuzgadosController@index');
Route::get('juzgados/completa/{id}', 'JuzgadosController@completa');
Route::get('juzgados/agregar/{id}', 'JuzgadosController@agregar');
Route::post('juzgados/agregar', 'JuzgadosController@guardar');
Route::get('juzgados/editar/{id}', 'JuzgadosController@editar');
Route::post('juzgados/editar', 'JuzgadosController@actualizar');
Route::get('juzgados/eliminar/{id}', function($id){
	$Juzgado = App\Juzgado::find($id);
	$Juzgado->visible = 'no';
	$cliente_id = $Juzgado->cliente_id;
	$Juzgado->save();
	Session::flash('flash_message', 'c');
	return redirect('juzgados/ver/' . $cliente_id);
});


Route::get('cuentas/ver/{id}', 'CuentasController@index');
Route::get('cuentas/completa/{id}', 'CuentasController@completa');
Route::get('cuentas/agregar/{id}', 'CuentasController@agregar');
Route::post('cuentas/agregar', 'CuentasController@guardar');
Route::get('cuentas/editar/{id}', 'CuentasController@editar');
Route::post('cuentas/editar', 'CuentasController@actualizar');
Route::get('cuentas/eliminar/{id}', function($id){
	$Cuenta = App\Cuenta::find($id);
	$Cuenta->visible = 'no';
	$cliente_id = $Cuenta->cliente_id;
	$Cuenta->save();
	Session::flash('flash_message', 'c');
	return redirect('cuentas/ver/' . $cliente_id);
});

Route::get('pagos/ver/{id}', 'PagosController@index');
Route::get('pagos/completa/{id}', 'PagosController@completa');
Route::get('pagos/agregar/{id}', 'PagosController@agregar');
Route::post('pagos/agregar', 'PagosController@guardar');
Route::get('pagos/editar/{id}', 'PagosController@editar');
Route::post('pagos/editar', 'PagosController@actualizar');
Route::get('pagos/eliminar/{id}', function($id){
	$Pago = App\Pago::find($id);
	$Pago->visible = 'no';
	$cuenta_id = $Pago->cuenta_id;
	$Pago->save();
	Session::flash('flash_message', 'c');
	return redirect('pagos/ver/' . $cuenta_id);
});

Route::get('expedientes/ver/{id}', 'ExpedientesController@index');
Route::get('expedientes/completa/{id}', 'ExpedientesController@completa');
Route::get('expedientes/agregar/{id}', 'ExpedientesController@agregar');
Route::post('expedientes/agregar', 'ExpedientesController@guardar');
Route::get('expedientes/editar/{id}', 'ExpedientesController@editar');
Route::post('expedientes/editar', 'ExpedientesController@actualizar');
Route::get('expedientes/eliminar/{id}', function($id){
	$Expediente = App\Expediente::find($id);
	$Expediente->visible = 'no';
	$cliente_id = $Expediente->cliente_id;
	$Expediente->save();
	Session::flash('flash_message', 'c');
	return redirect('expedientes/ver/' . $cliente_id);
});


Route::get('archivos/ver/{id}', 'ArchivosController@index');
Route::get('archivos/completa/{id}', 'ArchivosController@completa');
Route::get('archivos/agregar/{id}', 'ArchivosController@agregar');
Route::post('archivos/agregar', 'ArchivosController@guardar');
Route::get('archivos/editar/{id}', 'ArchivosController@editar');
Route::post('archivos/editar', 'ArchivosController@actualizar');
Route::get('archivos/eliminar/{id}', function($id){
	$Archivo = App\Archivo::find($id);
	$Archivo->visible = 'no';
	$cliente_id = $Archivo->cliente_id;
	$Archivo->save();
	Session::flash('flash_message', 'c');
	return redirect('archivos/ver/' . $cliente_id);
});
Route::get('clientes/archivo/descargar/{archivo}/{id}', 'ArchivosController@descargar');

Route::get('trabajadores', 'TrabajadoresController@index')->name('trabajadoresIndex');
Route::get('trabajadores/ver', 'TrabajadoresController@index');
Route::get('trabajadores/busqueda', function(){
	return view('trabajadores.busqueda', ['mensaje' => 'escribir']);
});
Route::post('trabajadores/buscar', 'TrabajadoresController@buscar');
Route::get('trabajadores/completa/{id}', 'TrabajadoresController@completa');
Route::get('trabajadores/agregar', 'TrabajadoresController@agregar');
Route::post('trabajadores/agregar', 'TrabajadoresController@guardar');
Route::get('trabajadores/editar/{id}', 'TrabajadoresController@editar');
Route::post('trabajadores/editar', 'TrabajadoresController@actualizar');
Route::get('trabajadores/eliminar/{id}', function($id){
	$Trabajador = App\Trabajador::find($id);
	$Trabajador->visible = 'no';
	$Trabajador->save();
	Session::flash('flash_message', 'c');
	return redirect()->route('trabajadoresIndex');
});

Route::get('archivos/trabajadores/ver/{id}', 'ArchivosTrabajadoresController@index');
Route::get('archivos/trabajadores/completa/{id}', 'ArchivosTrabajadoresController@completa');
Route::get('archivos/trabajadores/agregar/{id}', 'ArchivosTrabajadoresController@agregar');
Route::post('archivos/trabajadores/agregar', 'ArchivosTrabajadoresController@guardar');
Route::get('archivos/trabajadores/editar/{id}', 'ArchivosTrabajadoresController@editar');
Route::post('archivos/trabajadores/editar', 'ArchivosTrabajadoresController@actualizar');
Route::get('archivos/trabajadores/eliminar/{id}', function($id){
	$ArchivoTrabajador = App\ArchivoTrabajador::find($id);
	$ArchivoTrabajador->visible = 'no';
	$trabajador_id = $ArchivoTrabajador->trabajador_id;
	$ArchivoTrabajador->save();
	Session::flash('flash_message', 'c');
	return redirect('archivos/trabajadores/ver/' . $trabajador_id);
});
Route::get('trabajadores/archivo/descargar/{archivo}/{id}', 'ArchivosTrabajadoresController@descargar');

Route::get('sedes', 'SedesController@index')->name('sedesIndex');
Route::get('sedes/ver', 'SedesController@index');
Route::get('sedes/completa/{id}', 'SedesController@completa');
Route::get('sedes/agregar', 'SedesController@agregar');
Route::post('sedes/agregar', 'SedesController@guardar');
Route::get('sedes/editar/{id}', 'SedesController@editar');
Route::post('sedes/editar', 'SedesController@actualizar');
Route::get('sedes/eliminar/{id}', function($id){
	$Sede = App\Sede::find($id);
	$Sede->visible = 'no';
	$Sede->save();
	Session::flash('flash_message', 'c');
	return redirect()->route('sedesIndex');
});

Route::get('eventos', 'EventosController@index')->name('eventosIndex');
Route::get('eventos/ver', 'EventosController@index');
Route::get('eventos/completa/{id}', 'EventosController@completa');
Route::get('eventos/busqueda', function(){
	return view('eventos.busqueda', ['mensaje' => 'escribir']);
});
Route::post('eventos/buscar', 'EventosController@buscar');
Route::get('eventos/agregar/{id}', 'EventosController@agregar');
Route::post('eventos/agregar', 'EventosController@guardar');
Route::get('eventos/editar/{id}', 'EventosController@editar');
Route::post('eventos/editar', 'EventosController@actualizar');
Route::get('eventos/eliminar/{id}', function($id){
	$Evento = App\Evento::find($id);
	$Evento->visible = 'no';
	$Evento->save();
	Session::flash('flash_message', 'c');
	return redirect()->route('eventosIndex');
});


Route::get('usuarios', 'UsuariosController@index')->name('usuariosIndex');
Route::get('usuarios/ver', 'UsuariosController@index');
Route::get('usuarios/completa/{id}', 'UsuariosController@completa');
Route::get('usuarios/busqueda', function(){
	return view('usuarios.busqueda', ['mensaje' => 'escribir']);
});
Route::post('usuarios/buscar', 'UsuariosController@buscar');
Route::get('usuarios/agregar', 'UsuariosController@agregar');
Route::post('usuarios/agregar', 'UsuariosController@guardar');
Route::get('usuarios/editar/{id}', 'UsuariosController@editar');
Route::post('usuarios/editar', 'UsuariosController@actualizar');
Route::get('usuarios/eliminar/{id}', function($id){
	$Usuario = App\Usuario::find($id);
	$Usuario->visible = 'no';
	$Usuario->save();
	$Usuario->delete();
	Session::flash('flash_message', 'c');
	return redirect()->route('usuariosIndex');
});

Route::get('perfil/ver', 'PerfilController@index');
Route::post('perfil/editar', 'PerfilController@actualizar');

Route::auth();

Route::get('remoto/cliente/{nombre}/{nombre_server}/{descripcion}/{observaciones}/{cliente_id}/{extension}', 'RemotoController@guardar_archivo');

Route::get('remoto/trabajador/{nombre}/{nombre_server}/{descripcion}/{observaciones}/{trabajador_id}/{extension}', 'RemotoController@guardar_archivo_trabajador');
