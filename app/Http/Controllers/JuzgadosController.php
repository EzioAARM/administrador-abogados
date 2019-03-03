<?php

namespace App\Http\Controllers;

use DB;

use App;

use Session;

use Auth;

use Illuminate\Http\Request;

use App\Http\Requests;

class JuzgadosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $datos = DB::table('juzgados')->where([['cliente_id', '=' , $id], ['visible', '=', 'si']])->paginate(10);
        return view('juzgados.ver', ['datos' => $datos]);
    }

    public function guardar(Request $request)
    {
        $juzgado = new App\Juzgado;
        $juzgado->cliente_id = $request->input('cliente-id');
        $juzgado->visible = 'si';
        $juzgado->nombre = $request->input('nombre');
        $juzgado->autos = $request->input('autos');
        $juzgado->fase = $request->input('fase');
        $juzgado->comentarios = $request->input('comentarios');
        $juzgado->notas = $request->input('notas');
        $juzgado->save();
        Session::flash('flash_message', 'c');
        return redirect('juzgados/ver/' . $request->input('cliente-id'));
    }

    public function editar($id)
    {
        $juzgado = DB::table('juzgados')->where([['id', '=' , $id]])->get();
        return view('juzgados.editar', ['juzgado' => $juzgado]);
    }
    
    public function actualizar(Request $request)
    {
        $juzgado = App\Juzgado::find($request->input('id'));
        $juzgado->nombre = $request->input('nombre');
        $juzgado->autos = $request->input('autos');
        $juzgado->fase = $request->input('fase');
        $juzgado->comentarios = $request->input('comentarios');
        $juzgado->notas = $request->input('notas');
        $juzgado->save();
        Session::flash('flash_message', 'c');
        return redirect('juzgados/ver/' . $request->input('cliente-id'));
    }

    public function agregar($id)
    {
        return view('juzgados.agregar', ['cliente_id' => $id]);
    }

    public function completa($id)
    {
        $juzgado = DB::table('juzgados')->where([['id', '=' , $id]])->get();
        return view('juzgados.completa', ['juzgados' => $juzgado]);
    }
}
