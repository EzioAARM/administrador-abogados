<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class RemotoController extends Controller
{
    function guardar_archivo($nombre, $nombre_server, $descripcion, $observaciones, $cliente_id, $extension)
	{
        $archivos = new App\Archivo;
        $archivos->cliente_id = $cliente_id;
        $archivos->visible = 'si';
        $archivos->nombre_servidor = $nombre_server;
        $archivos->nombre = $nombre;
        $archivos->descripcion = $descripcion;
        $archivos->observaciones = $observaciones;
        $archivos->extension = $extension;
        $archivos->save();
	}

	function guardar_archivo_trabajador($nombre, $nombre_server, $descripcion, $observaciones, $trabajador_id, $extension)
	{
        $archivos = new App\ArchivoTrabajador;
        $archivos->trabajador_id = $trabajador_id;
        $archivos->visible = 'si';
        $archivos->nombre_servidor = $nombre_server;
        $archivos->nombre = $nombre;
        $archivos->descripcion = $descripcion;
        $archivos->observaciones = $observaciones;
        $archivos->extension = $extension;
        $archivos->save();
	}
}
