<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    public $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;





    public function cards(){

        return $this->morphMany('App\Card' , 'get_card');

    }

    public function songs(){

        return $this->morphMany('App\Song' , 'get_song');

    }

    public function client_imageable(){

        return $this->morphMany('App\Client_image' , 'Client_imageable');

    }

    public function event_images(){

        return $this->hasMany('App\Event_image');

    }

    public function event_point(){

        return $this->hasOne('App\Event_point');

    }
}
