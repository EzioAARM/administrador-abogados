<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abogado extends Model
{
    protected $table = 'abogados';
    
    public function cliente_id()
    {
    	return $this->hasMany('App\Cliente');
    }
}
