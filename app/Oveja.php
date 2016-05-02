<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oveja extends Model
{
     protected $table = 'ovejas';

      public function user()
      {
      return $this->belongsTo('App\User');
      }

      public function estado_oveja()
      {
       return $this->belongsTo('App\EstadoOveja');
      }

      public function pariciones()
      {
          return $this->hasMany('App\CriasTotal');
      }


}
