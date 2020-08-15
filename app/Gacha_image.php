<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gacha_image extends Model
{
    public function gacha(){

        return $this->belongsto('App\Gacha');

    }
}
