<?php

namespace App\Http\Controllers;

use DB;

use App;

use Session;

use Auth;

use App\Http\Requests;

use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$datos = DB::table('clientes')->where([['visible', '=', 'si']])->paginate(10);
        return view('clientes.ver', ['datos' => $datos]);
    }

    public function buscar(Request $request)
    {
        $datos = DB::table('clientes')->where([['nombre', 'like', '%' . $request->input('busqueda') . '%'],['visible', '=' , "si"]])->paginate(10);
        return view('clientes.busqueda', ['datos' => $datos, 'mensaje' => 'hay datos']);
    }

    public function guardar(Request $request)
    {
        $cliente = new App\Cliente;
        $cliente->nombre = $request->input('nombre');
        $cliente->sede_id = $request->input('sede_id');
        $cliente->visible = 'si';
        $cliente->apellido = $request->input('apellido');
        $cliente->fecha_nacimiento = $request->input('fecha-nacimiento');
        $cliente->nombre_comercial = $request->input('nombre-comercial');
        $cliente->direccion = $request->input('direccion');
        $cliente->departamento = $request->input('departamento');
        $cliente->municipio = $request->input('municipio');
        $cliente->nacionalidad = $request->input('nacionalidad');
        $cliente->correo = $request->input('correo');
        $cliente->sitio_web = $request->input('website');
        $cliente->telefono_movil = $request->input('telefono-movil');
        $cliente->telefono_casa = $request->input('telefono-casa');
        $cliente->notas = $request->input('notas');
        $cliente->save();
        Session::flash('flash_message', 'c');
        return redirect('/');
    }

    public function editar($id)
    {
        $cliente = DB::table('clientes')->where([['id', '=' , $id]])->get();
        $sedes = DB::table('sedes')->where([['visible', '=', 'si']])->get();
        return view('clientes.editar', ['clientes' => $cliente, 'sedes' => $sedes]);
    }
    
    public function actualizar(Request $request)
    {
        $cliente = App\Cliente::find($request->input('id'));
        $cliente->nombre = $request->input('nombre');
        $cliente->sede_id = $request->input('sede_id');
        $cliente->apellido = $request->input('apellido');
        $cliente->fecha_nacimiento = $request->input('fecha-nacimiento');
        $cliente->nombre_comercial = $request->input('nombre-comercial');
        $cliente->direccion = $request->input('direccion');
        $cliente->departamento = $request->input('departamento');
        $cliente->municipio = $request->input('municipio');
        $cliente->nacionalidad = $request->input('nacionalidad');
        $cliente->correo = $request->input('correo');
        $cliente->sitio_web = $request->input('website');
        $cliente->telefono_movil = $request->input('telefono-movil');
        $cliente->telefono_casa = $request->input('telefono-casa');
        $cliente->notas = $request->input('notas');
        $cliente->save();
        Session::flash('flash_message', 'c');
        return redirect('/');
    }

    public function agregar()
    {
        $sedes = DB::table('sedes')->where([['visible', '=', 'si']])->get();
    	return view('clientes.agregar', ['sedes' => $sedes]);
    }

    public function completa($id)
    {
        $cliente = DB::table('clientes')->where([['id', '=' , $id]])->get();
        $cantidadAbogadosP = DB::table('abogados')->where([['cliente_id', '=', $id], ['visible', '=', 'si'], ['tipo', '=', 'propio']])->count();
        $cantidadAbogadosC = DB::table('abogados')->where([['cliente_id', '=', $id], ['visible', '=', 'si'], ['tipo', '=', 'contrario']])->count();
        $cantidadProcuradoresP = DB::table('procuradores')->where([['cliente_id', '=', $id], ['visible', '=', 'si'], ['tipo', '=', 'propio']])->count();
        $cantidadProcuradoresC = DB::table('procuradores')->where([['cliente_id', '=', $id], ['visible', '=', 'si'], ['tipo', '=', 'contrario']])->count();
        $cantidadJuzgados = DB::table('juzgados')->where([['cliente_id', '=', $id], ['visible', '=', 'si']])->count();
        $cantidadArchivos = DB::table('archivos')->where([['cliente_id', '=', $id], ['visible', '=', 'si']])->count();
        $cantidadExpedientes = DB::table('expedientes')->where([['cliente_id', '=', $id], ['visible', '=', 'si']])->count();
        $cantidadCuentas = DB::table('cuentas')->where([['cliente_id', '=', $id], ['visible', '=', 'si']])->count();
        return view('clientes.completa', ['clientes' => $cliente, 'cantidadAbogadosP' => $cantidadAbogadosP, 'cantidadAbogadosC' => $cantidadAbogadosC, 'cantidadProcuradoresP' => $cantidadProcuradoresP, 'cantidadProcuradoresC' => $cantidadProcuradoresC, 'cantidadJuzgados' => $cantidadJuzgados, 'cantidadArchivos' => $cantidadArchivos, 'cantidadExpedientes' => $cantidadExpedientes, 'cantidadCuentas' => $cantidadCuentas]);
    }
}
