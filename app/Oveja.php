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
}
