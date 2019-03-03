
<?php
require_once "nusoap/lib/nusoap.php";

function guardar_archivo_trabajador($nombre, $nombre_server, $descripcion, $observaciones, $cliente_id, $extension)
{
	$conexion = mysql_connect('mysql.hostinger.es', 'u215283317_pb', 'abogados');
	mysql_select_db('u215283317_pb');

	$query = mysql_query('insert into archivostrabajadores (cliente_id, nombre_servidor, nombre, descripcion, observaciones
		, extension, visible) values (' . $cliente_id .',' . $nombre_server . ',' . $nombre . ',' . $descripcion . ',' . $observaciones . 
		',' . $extension . ', "si")');

	return "ok";
}

// Se crea el objeto para el webservice
$servicio = new soap_server();
// Se inicializa el webservice
$servicio->configureWSDL("webserv", "urn:webserv");
// Se registra la funcion que se va a exportar, con el tipo de datos de
// entrada y el tipo de dato de salida
$servicio->register(guardar_archivo_trabajador,array("nombre" =>
"xsd:string", "nombre_server" => "xsd:string", "descripcion" => "xsd:string", "observaciones" => "xsd:string"
, "cliente_id" => "xsd:string", "extension" => "xsd:string"),array("return" => "xsd:string"));
// Como el servicio es proveedo por un servidor WEB la informacion del
// webservice sera recibida en METHOD POST
$servicio->service($HTTP_RAW_POST_DATA);