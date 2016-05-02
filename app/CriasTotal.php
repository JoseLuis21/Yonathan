<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CriasTotal extends Model
{
     protected $table = 'crias_totales';

     public function user()
     {
       return $this->belongsTo('App\User');
     }
}
