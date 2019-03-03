<?php

namespace App\Http\Controllers;

use DB;

use App;

use Session;

use Auth;

use Illuminate\Http\Request;

use App\Http\Requests;

class AbogadosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($tipo, $id)
    {
        $datos = null;
        if ($tipo == "contrario")
        {
            $datos = DB::table('abogados')->where([['cliente_id', '=' , $id], ['visible', '=', 'si'], ['tipo', '=', 'contrario']])->paginate(10);
        }
        else if ($tipo == "propio")
        {
            $datos = DB::table('abogados')->where([['cliente_id', '=' , $id], ['visible', '=', 'si'], ['tipo', '=', 'propio']])->paginate(10);
        }
        return view('abogados.ver', ['datos' => $datos]);
    }

    public function guardar(Request $request)
    {
        $abogado = new App\Abogado;
        $abogado->cliente_id = $request->input('cliente_id');
        $abogado->visible = 'si';
        $abogado->nombre = $request->input('nombre');
        $abogado->apellido = $request->input('apellido');
        $abogado->numero_colegiado = $request->input('numero-colegiado');
        $abogado->correo = $request->input('correo');
        $abogado->tipo = $request->input('tipo');
        $abogado->telefono_movil = $request->input('telefono-movil');
        $abogado->telefono_trabajo = $request->input('telefono-trabajo');
        $abogado->notas = $request->input('notas');
        $abogado->save();
        Session::flash('flash_message', 'c');
        return redirect('abogados/ver/' . $request->input('tipo') . '/' . $request->input('cliente_id'));
    }

    public function editar($id)
    {
        $abogado = DB::table('abogados')->where([['id', '=' , $id]])->get();
        return view('abogados.editar', ['abogado' => $abogado]);
    }
    
    public function actualizar(Request $request)
    {
        $abogado = App\Abogado::find($request->input('id'));
        $abogado->nombre = $request->input('nombre');
        $abogado->apellido = $request->input('apellido');
        $abogado->numero_colegiado = $request->input('numero-colegiado');
        $abogado->correo = $request->input('correo');
        $abogado->tipo = $request->input('tipo');
        $abogado->telefono_movil = $request->input('telefono-movil');
        $abogado->telefono_trabajo = $request->input('telefono-trabajo');
        $abogado->notas = $request->input('notas');
        $abogado->save();
        Session::flash('flash_message', 'c');
        return redirect('abogados/ver/' . $request->input('tipo') . '/' . $request->input('cliente-id'));
    }

    public function agregar($tipo, $id)
    {
    	return view('abogados.agregar', ['tipo' => $tipo, 'cliente_id' => $id]);
    }

    public function completa($id)
    {
        $abogado = DB::table('abogados')->where([['id', '=' , $id]])->get();
        return view('abogados.completa', ['abogados' => $abogado]);
    }
}
