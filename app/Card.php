<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $table = 'cards';
    public $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;



    public function idol(){

        return $this->belongsto('App\Idol');

    }

    public function center_skill(){

        return $this->belongsto('App\Center_skill');

    }

    public function skill_type(){

        return $this->belongsto('App\Skill_type');

    }
    public function get_card(){
    
        return $this->morphTo();

    }

    public function card_images(){

        return $this->hasMany('App\Card_image');

    }

    public function client_images(){

        return $this->morphMany('App\Client_image' , 'client_imageable');

    }

}
