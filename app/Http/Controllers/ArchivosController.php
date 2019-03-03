<?php

namespace App\Http\Controllers;

use DB;

use Carbon\Carbon;

use App;

use Session;

use Auth;

use Illuminate\Http\Request;

use App\Http\Requests;

class ArchivosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $datos = DB::table('archivos')->where([['cliente_id', '=' , $id], ['visible', '=', 'si']])->paginate(10);
        return view('archivos.ver', ['datos' => $datos]);
    }

    public function descargar($archivo, $id)
    {
    	return response()->download('Archivos/' . $archivo);
    }

    public function guardar(Request $request)
    {
    	$nombreServer = str_replace(' ', '_', Carbon::now()->toDateTimeString() . '_' . $request->file('archivo')->getClientOriginalName());
    	\Storage::disk('local')->put($nombreServer, \File::get($request->file('archivo')));
        $archivos = new App\Archivo;
        $archivos->cliente_id = $request->input('cliente-id');
        $archivos->visible = 'si';
        $archivos->nombre_servidor = $nombreServer;
        $archivos->nombre = $request->file('archivo')->getClientOriginalName();
        $archivos->descripcion = $request->input('descripcion');
        $archivos->observaciones = $request->input('observaciones');
        $archivos->extension = $request->file('archivo')->getClientOriginalExtension();
        $archivos->save();
        Session::flash('flash_message', 'c');
        return redirect('archivos/ver/' . $request->input('cliente-id'));
    }

    public function editar($id)
    {
        $archivos = DB::table('archivos')->where([['id', '=' , $id]])->get();
        return view('archivos.editar', ['archivos' => $archivos]);
    }
    
    public function actualizar(Request $request)
    {
        $archivos = App\Archivo::find($request->input('id'));
        $archivos->descripcion = $request->input('descripcion');
        $archivos->observaciones = $request->input('observaciones');
        $archivos->save();
        Session::flash('flash_message', 'c');
        return redirect('archivos/ver/' . $request->input('cliente-id'));
    }

    public function agregar($id)
    {
        return view('archivos.agregar', ['cliente_id' => $id]);
    }

    public function completa($id)
    {
        $archivos = DB::table('archivos')->where([['id', '=' , $id]])->get();
        return view('archivos.completa', ['archivos' => $archivos]);
    }
}
