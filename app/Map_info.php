<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Map_info extends Model
{
    protected $table = 'maps_info';

    public function song(){

        return $this->belongTo('App\Song');

    }


}
