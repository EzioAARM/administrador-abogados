<?php

namespace App\Http\Controllers;

use DB;

use App;

use Session;

use Auth;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $cuenta = DB::table('cuentas')->where([['id', '=' , $id]])->get();
        $abonado = DB::table('pagos')->where([['cuenta_id', '=' , $id], ['visible', '=', 'si']])->sum('abono');
        $datos = DB::table('pagos')->where([['cuenta_id', '=' , $id], ['visible', '=', 'si']])->paginate(10);
        $abonado = $cuenta[0]->total - $abonado;
        return view('pagos.ver', ['datos' => $datos, 'abonado' => $abonado]);
    }

    public function guardar(Request $request)
    {
        $pago = new App\Pago;
        $pago->cuenta_id = $request->input('cuenta-id');
        $pago->visible = 'si';
        $pago->fecha = $request->input('fecha');
        $pago->abono = $request->input('abono');
        $pago->recibo = $request->input('recibo');
        $pago->save();
        Session::flash('flash_message', 'c');
        return redirect('pagos/ver/' . $request->input('cuenta-id'));
    }

    public function editar($id)
    {
        $pago = DB::table('pagos')->where([['id', '=' , $id]])->get();
        return view('pagos.editar', ['pago' => $pago]);
    }
    
    public function actualizar(Request $request)
    {
        $pago = App\Pago::find($request->input('id'));
        $pago->fecha = $request->input('fecha');
        $pago->recibo = $request->input('recibo');
        $pago->save();
        Session::flash('flash_message', 'c');
        return redirect('pagos/ver/' . $request->input('cuenta-id'));
    }

    public function agregar($id)
    {
        $cuenta = DB::table('cuentas')->where([['id', '=' , $id]])->get();
        $abonado = DB::table('pagos')->where([['cuenta_id', '=' , $id], ['visible', '=', 'si']])->sum('abono');
        $datos = DB::table('pagos')->where([['cuenta_id', '=' , $id], ['visible', '=', 'si']])->get();
        $abonado = $cuenta[0]->total - $abonado;
        return view('pagos.agregar', ['abonado' => $abonado, 'cuenta_id' => $id, 'pago' => $datos]);
    }

    public function completa($id)
    {
        $pago = DB::table('pagos')->where([['id', '=' , $id]])->get();
        return view('pagos.completa', ['pagos' => $pago]);
    }
}
