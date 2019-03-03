<?php

namespace App\Http\Controllers;

use DB;

use App;

use Session;

use Auth;

use Illuminate\Http\Request;

use App\Http\Requests;

class TrabajadoresController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function buscar(Request $request)
    {
        $datos = DB::table('trabajadores')->where([['nombre', 'like', '%' . $request->input('busqueda') . '%'],['visible', '=' , "si"]])->paginate(10);
        return view('trabajadores.busqueda', ['datos' => $datos, 'mensaje' => 'hay datos']);
    }

    public function index()
    {
    	$datos = DB::table('trabajadores')->where([['visible', '=', 'si']])->paginate(10);
        return view('trabajadores.ver', ['datos' => $datos]);
    }

    public function guardar(Request $request)
    {
        $trabajador = new App\Trabajador;
        $trabajador->nombre = $request->input('nombre');
        $trabajador->sede_id = $request->input('sede_id');
        $trabajador->visible = 'si';
        $trabajador->activo = 'si';
        $trabajador->apellido = $request->input('apellido');
        $trabajador->fecha_nacimiento = $request->input('fecha-nacimiento');
        $trabajador->direccion = $request->input('direccion');
        $trabajador->departamento = $request->input('departamento');
        $trabajador->municipio = $request->input('municipio');
        $trabajador->correo = $request->input('correo');
        $trabajador->sitio_web = $request->input('website');
        $trabajador->telefono_movil = $request->input('telefono-movil');
        $trabajador->telefono_casa = $request->input('telefono-casa');
        $trabajador->telefono_trabajo = $request->input('telefono-trabajo');
        $trabajador->fecha_ingreso = $request->input('fecha-ingreso');
        $trabajador->notas = $request->input('notas');
        $trabajador->save();
        Session::flash('flash_message', 'c');
        return redirect('trabajadores');
    }

    public function editar($id)
    {
        $trabajador = DB::table('trabajadores')->where([['id', '=' , $id], ['visible', '=' , "si"]])->get();
        $sedes = DB::table('sedes')->where([['visible', '=' , "si"]])->get();
        return view('trabajadores.editar', ['trabajadores' => $trabajador, 'sedes' => $sedes]);
    }
    
    public function actualizar(Request $request)
    {
        $trabajador = App\Trabajador::find($request->input('id'));
        $trabajador->nombre = $request->input('nombre');
        $trabajador->sede_id = $request->input('sede_id');
        $trabajador->apellido = $request->input('apellido');
        $trabajador->fecha_nacimiento = $request->input('fecha-nacimiento');
        $trabajador->direccion = $request->input('direccion');
        $trabajador->departamento = $request->input('departamento');
        $trabajador->municipio = $request->input('municipio');
        $trabajador->correo = $request->input('correo');
        $trabajador->sitio_web = $request->input('website');
        $trabajador->telefono_movil = $request->input('telefono-movil');
        $trabajador->telefono_casa = $request->input('telefono-casa');
        $trabajador->telefono_trabajo = $request->input('telefono-trabajo');
        $trabajador->fecha_ingreso = $request->input('fecha-ingreso');
        $trabajador->notas = $request->input('notas');
        $trabajador->save();
        Session::flash('flash_message', 'c');
        return redirect('trabajadores');
    }

    public function agregar()
    {
        $sedes = DB::table('sedes')->where([['visible', '=' , "si"]])->get();
    	return view('trabajadores.agregar', ['sedes' => $sedes]);
    }

    public function completa($id)
    {
    	$trabajadores = DB::table('trabajadores')->where([['id', '=', $id],['visible', '=' , "si"]])->get();
        $cantidadArchivos = DB::table('archivostrabajadores')->where([['trabajador_id', '=', $id], ['visible', '=', 'si']])->count();
        return view('trabajadores.completa', ['trabajadores' => $trabajadores, 'cantidadArchivos' => $cantidadArchivos]);
    }
}
