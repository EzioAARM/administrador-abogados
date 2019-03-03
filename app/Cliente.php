<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    public function sede_id()
    {
    	return $this->hasMany('App\Sede');
    }
}
