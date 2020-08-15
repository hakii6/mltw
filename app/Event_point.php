<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event_point extends Model
{
    public function event(){

        return $this->belongTo('App\Event');

    }

}
