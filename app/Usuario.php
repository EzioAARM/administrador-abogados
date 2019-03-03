<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $table = 'usuarios';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'tipo', 'visible', 'trabajador_id', 'id'
    ];
    
    public function trabajador_id()
    {
        return $this->hasMany('App\Cliente');
    }

    public function sede_id()
    {
        return $this->hasMany('App\Sede');
    }
}
