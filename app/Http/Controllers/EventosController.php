<?php

namespace App\Http\Controllers;

use DB;

use App;

use Session;

use Auth;

use Illuminate\Http\Request;

use App\Http\Requests;

class EventosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function buscar(Request $request)
    {
        $datos = DB::table('eventos')->where([['titulo', 'like', '%' . $request->input('busqueda') . '%']])->paginate(10);
        return view('eventos.busqueda', ['datos' => $datos, 'mensaje' => 'hay datos']);
    }

    public function index()
    {
        $datos = DB::table('eventos')->where([['visible', '=', 'si'], ['username', '=', Auth::user()->username]])->paginate(10);
        return view('eventos.ver', ['datos' => $datos]);
    }

    public function guardar(Request $request)
    {
        $evento = new App\Evento;
        $evento->visible = 'si';
        $evento->username = $request->input('username');
        $evento->titulo = $request->input('titulo');
        $evento->ubicacion = $request->input('ubicacion');
        $evento->descripcion = $request->input('descripcion');
        $evento->fecha_inicio = $request->input('fecha-inicio');
        $evento->hora_inicio = $request->input('hora-inicio');
        $evento->fecha_fin = $request->input('fecha-fin');
        $evento->hora_fin = $request->input('hora-fin');
        $evento->save();
        Session::flash('flash_message', 'c');
        return redirect('eventos');
    }

    public function editar($id)
    {
        $evento = DB::table('eventos')->where([['id', '=' , $id]])->get();
        return view('eventos.editar', ['eventos' => $evento]);
    }
    
    public function actualizar(Request $request)
    {
        $evento = App\Evento::find($request->input('id'));
        $evento->titulo = $request->input('titulo');
        $evento->ubicacion = $request->input('ubicacion');
        $evento->descripcion = $request->input('descripcion');
        $evento->fecha_inicio = $request->input('fecha-inicio');
        $evento->hora_inicio = $request->input('hora-inicio');
        $evento->fecha_fin = $request->input('fecha-fin');
        $evento->hora_fin = $request->input('hora-fin');
        $evento->save();
        Session::flash('flash_message', 'c');
        return redirect('eventos');
    }

    public function agregar($id)
    {
        return view('eventos.agregar', ['username' => $id]);
    }

    public function completa($id)
    {
        $eventos = DB::table('eventos')->where([['id', '=', $id]])->get();
        return view('eventos.completa', ['eventos' => $eventos]);
    }
}
