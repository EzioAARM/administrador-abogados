<?php

namespace App\Http\Controllers;

use DB;

use App;

use Session;

use Auth;

use Illuminate\Http\Request;

use App\Http\Requests;

class ExpedientesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $datos = DB::table('expedientes')->where([['cliente_id', '=' , $id], ['visible', '=', 'si']])->paginate(10);
        return view('expedientes.ver', ['datos' => $datos]);
    }

    public function guardar(Request $request)
    {
        $expediente = new App\Expediente;
        $expediente->cliente_id = $request->input('cliente-id');
        $expediente->visible = 'si';
        $expediente->numero = $request->input('numero');
        $expediente->anio = $request->input('anio');
        $expediente->fecha_alta = $request->input('fecha-alta');
        $expediente->tipo = $request->input('tipo');
        $expediente->procedimiento = $request->input('procedimiento');
        $expediente->asunto = $request->input('asunto');
        $expediente->descripcion = $request->input('descripcion');
        $expediente->estado = $request->input('estado');
        $expediente->fecha_cierre = $request->input('fecha_cierre');
        $expediente->notas = $request->input('notas');
        $expediente->save();
        Session::flash('flash_message', 'c');
        return redirect('expedientes/ver/' . $request->input('cliente-id'));
    }

    public function editar($id)
    {
        $expediente = DB::table('expedientes')->where([['id', '=' , $id]])->get();
        return view('expedientes.editar', ['expediente' => $expediente]);
    }
    
    public function actualizar(Request $request)
    {
        $expediente = App\Expediente::find($request->input('id'));
        $expediente->numero = $request->input('numero');
        $expediente->anio = $request->input('anio');
        $expediente->fecha_alta = $request->input('fecha-alta');
        $expediente->tipo = $request->input('tipo');
        $expediente->procedimiento = $request->input('procedimiento');
        $expediente->asunto = $request->input('asunto');
        $expediente->descripcion = $request->input('descripcion');
        $expediente->estado = $request->input('estado');
        $expediente->fecha_cierre = $request->input('fecha_cierre');
        $expediente->notas = $request->input('notas');
        $expediente->save();
        Session::flash('flash_message', 'c');
        return redirect('expedientes/ver/' . $request->input('cliente-id'));
    }

    public function agregar($id)
    {
        return view('expedientes.agregar', ['cliente_id' => $id]);
    }

    public function completa($id)
    {
        $expediente = DB::table('expedientes')->where([['id', '=' , $id]])->get();
        return view('expedientes.completa', ['expedientes' => $expediente]);
    }
}
