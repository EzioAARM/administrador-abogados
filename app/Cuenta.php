<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    protected $table = 'cuentas';
    
    public function cliente_id()
    {
    	return $this->hasMany('App\Cliente');
    }
    
    public function sede_id()
    {
    	return $this->hasMany('App\Sede');
    }
}
