<?php

namespace App\Http\Controllers;

use DB;

use App;

use Session;

use Auth;

use Hash;

use Illuminate\Http\Request;

use App\Http\Requests;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('perfil.ver');
    }

    public function actualizar(Request $request)
    {
    	if ($request->input('password1') == $request->input('password2'))
    	{
    		if (Hash::check($request->input('password'), Auth::user()->password))
    		{
    			$usuario = App\Usuario::find(Auth::user()->id);
		    	$usuario->password = Hash::make($request->input('password1'));
		    	$usuario->save();
		    	Session::flash('flash_message', 'c');
    		}
    		else
    		{
    			Session::flash('password_error', 'c');
    		}
    	}
    	else
    	{
    		Session::flash('password_error', 'c');
    	}
    	return redirect('perfil/ver');
    }
}
