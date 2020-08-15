<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song_play extends Model
{

    protected $table = 'song_plays';
    public $timestamps = false;

    public function song(){

        return $this->belongsto('App\Song');

    }

}
