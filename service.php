<?php

class GuardarArchivo
{
	function guardar_archivo($nombre, $nombre_server, $descripcion, $observaciones, $cliente_id, $extension)
	{
		$conexion = mysql_connect('mysql.hostinger.es', 'u215283317_pb', 'abogados');
		mysql_select_db('u215283317_pb');

		$query = mysql_query('insert into archivos (cliente_id, nombre_servidor, nombre, descripcion, observaciones
			, extension, visible) values (' . $cliente_id .',' . $nombre_server . ',' . $nombre . ',' . $descripcion . ',' . $observaciones . 
			',' . $extension . ', "si")');

		return 'ok';
	}

	function guardar_archivo_trabajador($nombre, $nombre_server, $descripcion, $observaciones, $cliente_id, $extension)
	{
		$conexion = mysql_connect('mysql.hostinger.es', 'u215283317_pb', 'abogados');
		mysql_select_db('u215283317_pb');

		$query = mysql_query('insert into archivostrabajadores (cliente_id, nombre_servidor, nombre, descripcion, observaciones
			, extension, visible) values (' . $cliente_id .',' . $nombre_server . ',' . $nombre . ',' . $descripcion . ',' . $observaciones . 
			',' . $extension . ', "si")');

		return "ok";
	}
}

$Server = new SoapServer('http://pruebas.abogadosynotariosroldan.com/service.wsdl');

$Server->setClass('GuardarArchivo');

$Server->handle();