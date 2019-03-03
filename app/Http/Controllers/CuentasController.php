<?php

namespace App\Http\Controllers;

use DB;

use App;

use Session;

use Auth;

use Illuminate\Http\Request;

use App\Http\Requests;

class CuentasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $datos = DB::table('cuentas')->where([['cliente_id', '=' , $id], ['visible', '=', 'si']])->paginate(10);
        return view('cuentas.ver', ['datos' => $datos]);
    }

    public function guardar(Request $request)
    {
        $cuenta = new App\Cuenta;
        $cuenta->cliente_id = $request->input('cliente-id');
        $cuenta->sede_id = $request->input('sede-id');
        $cuenta->visible = 'si';
        $cuenta->fecha_alta = $request->input('fecha-alta');
        $cuenta->tipo = $request->input('tipo');
        $cuenta->descripcion = $request->input('descripcion');
        $cuenta->cantidad_servicios = $request->input('cantidad-servicios');
        $cuenta->precio_unidad = $request->input('precio-unidad');
        $cuenta->total = $request->input('cantidad-servicios') * $request->input('precio-unidad');
        $cuenta->factura = $request->input('factura');
        $cuenta->notas = $request->input('notas');
        $cuenta->save();
        Session::flash('flash_message', 'c');
        return redirect('cuentas/ver/' . $request->input('cliente-id'));
    }

    public function editar($id)
    {
        $cuenta = DB::table('cuentas')->where([['id', '=' , $id]])->get();
        return view('cuentas.editar', ['cuenta' => $cuenta]);
    }
    
    public function actualizar(Request $request)
    {
        $cuenta = App\Cuenta::find($request->input('id'));
        $cuenta->fecha_alta = $request->input('fecha-alta');
        $cuenta->tipo = $request->input('tipo');
        $cuenta->descripcion = $request->input('descripcion');
        $cuenta->cantidad_servicios = $request->input('cantidad-servicios');
        $cuenta->precio_unidad = $request->input('precio-unidad');
        $cuenta->total = $request->input('cantidad-servicios') * $request->input('precio-unidad');
        $cuenta->factura = $request->input('factura');
        $cuenta->notas = $request->input('notas');
        $cuenta->save();
        Session::flash('flash_message', 'c');
        return redirect('cuentas/ver/' . $request->input('cliente-id'));
    }

    public function agregar($id)
    {
        $sede_id = App\Cliente::find($id)->sede_id;
        return view('cuentas.agregar', ['cliente_id' => $id, 'sede_id' => $sede_id]);
    }

    public function completa($id)
    {
        $cuenta = DB::table('cuentas')->where([['id', '=' , $id]])->get();
        $cantidadPagos = DB::table('pagos')->where([['cuenta_id', '=', $id], ['visible', '=', 'si']])->count();
        return view('cuentas.completa', ['cuentas' => $cuenta, 'cantidadPagos' => $cantidadPagos]);
    }
}
