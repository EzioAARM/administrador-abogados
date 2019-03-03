<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = 'pagos';

    public function cuenta_id()
    {
    	return $this->hasMany('App\Cuenta');
    }
}
