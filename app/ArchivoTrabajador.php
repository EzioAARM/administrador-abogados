<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArchivoTrabajador extends Model
{
    protected $table = 'archivostrabajadores';
    
    public function trabajador_id()
    {
    	return $this->hasMany('App\Trabajador');
    }
}
