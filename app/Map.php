<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Map extends Model
{

    public function song(){

        return $this->belongTo('App\Song');

    }



}
