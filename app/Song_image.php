<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song_image extends Model
{
    protected $table = 'song_images';
    public $timestamps = false;


    public function song(){

        return $this->belongsto('App\Song');

    }


}
