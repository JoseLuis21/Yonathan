<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
     protected $table = 'detalle_ventas';

     public function user()
     {
       return $this->belongsTo('App\User');
     }

     public function venta()
     {
       return $this->belongsTo('App\Venta');
     }
}
