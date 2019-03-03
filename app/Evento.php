<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'eventos';
    
    public function cliente_id()
    {
    	return $this->hasMany('App\Cliente');
    }
}
