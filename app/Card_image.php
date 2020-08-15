<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card_image extends Model
{
    public function card(){

        return $this->belongsto('App\Card');

    }





}
