<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    protected $table = 'expedientes';
    
    public function cliente_id()
    {
    	return $this->hasMany('App\Cliente');
    }
}
