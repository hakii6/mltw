<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{

    protected $table = 'songs';
    public $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;

    public function map(){

        return $this->hasOne('App\Map');

    }

    public function map_info(){

        return $this->hasOne('App\Map_info');

    }


    public function idols(){

        return $this->belongsToMany('App\Idol');

    }

    public function get_song(){
    
        return $this->morphTo();

    }

    public function client_images(){

        return $this->morphMany('App\Client_image' , 'client_imageable');

    }

    public function song_images(){

        return $this->hasMany('App\Song_image');

    }

    public function song_plays(){

        return $this->hasMany('App\Song_play');

    }
}
