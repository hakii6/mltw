<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event_image extends Model
{
    public function event(){

        return $this->belongsto('App\Event');

    }
}
