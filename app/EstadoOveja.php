<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoOveja extends Model
{
     protected $table = 'estado_ovejas';

     public function ovejas()
     {
         return $this->hasMany('App\Oveja');
     }
}
