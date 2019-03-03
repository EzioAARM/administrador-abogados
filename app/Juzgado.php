<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Juzgado extends Model
{
    protected $table = 'juzgados';
    
    public function cliente_id()
    {
    	return $this->hasMany('App\Cliente');
    }
}
