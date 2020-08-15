<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill_type extends Model
{

    public function cards(){

        return $this->hasMany('App\Card');

    }

}
