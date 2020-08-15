<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Center_skill extends Model
{

    public function cards(){

        return $this->hasMany('App\Card');

    }

}
