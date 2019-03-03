<?php

namespace App\Http\Controllers;

use DB;

use Carbon\Carbon;

use App;

use Session;

use Auth;

use Illuminate\Http\Request;

use App\Http\Requests;

class ArchivosTrabajadoresController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $datos = DB::table('archivostrabajadores')->where([['trabajador_id', '=' , $id], ['visible', '=', 'si']])->paginate(10);
        return view('archivosTrabajadores.ver', ['datos' => $datos]);
    }

    public function descargar($archivo, $id)
    {
    	return response()->download('Archivos/' . $archivo);
    }

    public function guardar(Request $request)
    {
    	$nombreServer = str_replace(' ', '_', Carbon::now()->toDateTimeString() . '_' . $request->file('archivo')->getClientOriginalName());
    	\Storage::disk('local')->put($nombreServer, \File::get($request->file('archivo')));
        $archivos = new App\ArchivoTrabajador;
        $archivos->trabajador_id = $request->input('trabajador-id');
        $archivos->visible = 'si';
        $archivos->nombre_servidor = $nombreServer;
        $archivos->nombre = $request->file('archivo')->getClientOriginalName();
        $archivos->descripcion = $request->input('descripcion');
        $archivos->observaciones = $request->input('observaciones');
        $archivos->extension = $request->file('archivo')->getClientOriginalExtension();
        $archivos->save();
        Session::flash('flash_message', 'c');
        return redirect('archivos/trabajadores/ver/' . $request->input('trabajador-id'));
    }

    public function editar($id)
    {
        $archivos = DB::table('archivostrabajadores')->where([['id', '=' , $id]])->get();
        return view('archivosTrabajadores.editar', ['archivos' => $archivos]);
    }
    
    public function actualizar(Request $request)
    {
        $archivos = App\ArchivoTrabajador::find($request->input('id'));
        $archivos->descripcion = $request->input('descripcion');
        $archivos->observaciones = $request->input('observaciones');
        $archivos->save();
        Session::flash('flash_message', 'c');
        return redirect('archivos/trabajadores/ver/' . $request->input('trabajador-id'));
    }

    public function agregar($id)
    {
        return view('archivosTrabajadores.agregar', ['trabajador_id' => $id]);
    }

    public function completa($id)
    {
        $archivos = DB::table('archivostrabajadores')->where([['id', '=' , $id]])->get();
        return view('archivosTrabajadores.completa', ['archivos' => $archivos]);
    }
}
