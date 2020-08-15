<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gacha extends Model
{
    protected $table = 'gachas';
    public $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;



    public function cards(){

        return $this->morphMany('App\Card' , 'get_card');

    }

    public function client_imageable(){

        return $this->morphMany('App\Client_image' , 'Client_imageable');

    }

    public function gacha_images(){

        return $this->hasMany('App\Gacha_image');

    }

}
