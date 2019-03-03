<?php

namespace App\Http\Controllers;

use DB;

use App;

use Session;

use Auth;

use Illuminate\Http\Request;

use App\Http\Requests;

class SedesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$datos = DB::table('sedes')->where([['visible', '=', 'si']])->paginate(10);
        return view('sedes.ver', ['datos' => $datos]);
    }

    public function guardar(Request $request)
    {
        $sede = new App\Sede;
        $sede->visible = 'si';
        $sede->ubicacion = $request->input('ubicacion');
        $sede->coordenadas = $request->input('coordenadas');
        $sede->save();
        Session::flash('flash_message', 'c');
        return redirect('sedes');
    }

    public function editar($id)
    {
        $sede = DB::table('sedes')->where([['id', '=' , $id]])->get();
        return view('sedes.editar', ['sedes' => $sede]);
    }
    
    public function actualizar(Request $request)
    {
        $sede = App\Sede::find($request->input('id'));
        $sede->ubicacion = $request->input('ubicacion');
        $sede->coordenadas = $request->input('coordenadas');
        $sede->save();
        Session::flash('flash_message', 'c');
        return redirect('sedes');
    }

    public function agregar()
    {
    	return view('sedes.agregar');
    }

    public function completa($id)
    {
    	$sedes = DB::table('sedes')->where([['id', '=', $id]])->get();
        return view('sedes.completa', ['sedes' => $sedes]);
    }
}
