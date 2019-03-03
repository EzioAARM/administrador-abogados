<?php

namespace App\Http\Controllers;

use DB;

use App;

use Session;

use Auth;

use Hash;

use Illuminate\Http\Request;

use App\Http\Requests;

class UsuariosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$datos = DB::table('usuarios')->where([['visible', '=', 'si']])->paginate(10);
        return view('usuarios.ver', ['datos' => $datos]);
    }

    public function buscar(Request $request)
    {
        $datos = DB::table('usuarios')->where([['username', 'like', '%' . $request->input('busqueda') . '%']])->paginate(10);
        return view('usuarios.busqueda', ['datos' => $datos, 'mensaje' => 'hay datos']);
    }

    public function guardar(Request $request)
    {
        $usuario = new App\Usuario;
        $usuario->visible = 'si';
        $usuario->trabajador_id = $request->input('trabajador-id');
        $usuario->sede_id = $request->input('sede-id');
        $usuario->username = $request->input('username');
        $usuario->password = Hash::make($request->input('password'));
        $usuario->tipo = $request->input('tipo');
        $usuario->save();
        Session::flash('flash_message', 'c');
        return redirect('usuarios');
    }

    public function editar($id)
    {
        $sedes = DB::table('sedes')->where([['visible', '=' , 'si']])->get();
        $usuario = DB::table('usuarios')->where([['id', '=' , $id]])->get();
        return view('usuarios.editar', ['usuarios' => $usuario, 'sedes' => $sedes]);
    }
    
    public function actualizar(Request $request)
    {
        $usuario = App\Usuario::find($request->input('id'));
        $usuario->sede_id = $request->input('sede-id');
        $usuario->tipo = $request->input('tipo');
        $usuario->save();
        Session::flash('flash_message', 'c');
        return redirect('usuarios');
    }

    public function agregar()
    {
        $trabajadores = DB::table('trabajadores')->where([['visible', '=' , 'si']])->get();
        $sedes = DB::table('sedes')->where([['visible', '=' , 'si']])->get();
    	return view('usuarios.agregar', ['sedes' => $sedes, 'trabajadores' => $trabajadores]);
    }

    public function completa($id)
    {
    	$usuarios = DB::table('usuarios')->where([['id', '=', $id]])->get();
        return view('usuarios.completa', ['usuarios' => $usuarios]);
    }
}
