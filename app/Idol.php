<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Idol extends Model
{

    public function songs(){

        return $this->belongsToMany('App\Song');

    }

    public function cards(){

        return $this->hasMany('App\Card');

    }


}
