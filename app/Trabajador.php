<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    protected $table = 'trabajadores';
    
    public function sede_id()
    {
    	return $this->hasMany('App\Sede');
    }
}
