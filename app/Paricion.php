<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paricion extends Model
{
     protected $table = 'pariciones';

     public function oveja()
     {
       return $this->belongsTo('App\Oveja');
     }
}
