<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rut_dueno', 'telefono', 'direccion', 'nombre', 'email', 'password', 'color_dueno'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    //Relationships

    public function ovejas()
    {
        return $this->hasMany('App\Oveja');
    }


    public function ventas()
    {
        return $this->hasMany('App\Venta');
    }

    public function detalle_ventas()
    {
        return $this->hasMany('App\DetalleVenta');
    }

    public function venta()
     {
         return $this->belongsToMany('App\DetalleVenta');
     }
    public function crias_total()
    {
       return $this->hasOne('App\CriasTotal');
    }


}
