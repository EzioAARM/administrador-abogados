<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Procurador extends Model
{
    protected $table = 'procuradores';
    
    public function cliente_id()
    {
    	return $this->hasMany('App\Cliente');
    }
}
