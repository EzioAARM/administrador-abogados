<?php

namespace App\Http\Controllers;

use DB;

use App;

use Session;

use Auth;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProcuradoresController extends Controller
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
            $datos = DB::table('procuradores')->where([['cliente_id', '=' , $id], ['visible', '=', 'si'], ['tipo', '=', 'contrario']])->paginate(10);
        }
        else if ($tipo == "propio")
        {
            $datos = DB::table('procuradores')->where([['cliente_id', '=' , $id], ['visible', '=', 'si'], ['tipo', '=', 'propio']])->paginate(10);
        }
        return view('procuradores.ver', ['datos' => $datos]);
    }

    public function guardar(Request $request)
    {
        $procurador = new App\Procurador;
        $procurador->cliente_id = $request->input('cliente_id');
        $procurador->visible = 'si';
        $procurador->nombre = $request->input('nombre');
        $procurador->apellido = $request->input('apellido');
        $procurador->telefono_movil = $request->input('telefono-movil');
        $procurador->telefono_trabajo = $request->input('telefono-trabajo');
        $procurador->correo = $request->input('correo');
        $procurador->tipo = $request->input('tipo');
        $procurador->comentarios = $request->input('comentarios');
        $procurador->notas = $request->input('notas');
        $procurador->save();
        Session::flash('flash_message', 'c');
        return redirect('procuradores/ver/' . $request->input('tipo') . '/' . $request->input('cliente_id'));
    }

    public function editar($id)
    {
        $procurador = DB::table('procuradores')->where([['id', '=' , $id]])->get();
        return view('procuradores.editar', ['procurador' => $procurador]);
    }
    
    public function actualizar(Request $request)
    {
        $procurador = App\Procurador::find($request->input('id'));
        $procurador->nombre = $request->input('nombre');
        $procurador->apellido = $request->input('apellido');
        $procurador->telefono_movil = $request->input('telefono-movil');
        $procurador->telefono_trabajo = $request->input('telefono-trabajo');
        $procurador->correo = $request->input('correo');
        $procurador->comentarios = $request->input('comentarios');
        $procurador->notas = $request->input('notas');
        $procurador->save();
        Session::flash('flash_message', 'c');
        return redirect('procuradores/ver/' . $request->input('tipo') . '/' . $request->input('cliente-id'));
    }

    public function agregar($tipo, $id)
    {
    	return view('procuradores.agregar', ['tipo' => $tipo, 'cliente_id' => $id]);
    }

    public function completa($id)
    {
        $procurador = DB::table('procuradores')->where([['id', '=' , $id]])->get();
        return view('procuradores.completa', ['procuradores' => $procurador]);
    }
}
