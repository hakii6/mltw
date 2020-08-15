<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client_image extends Model
{
    protected $table = 'client_images';
    public $timestamps = false;

    public function client_imageable(){
    
        return $this->morphTo();

    }


}
