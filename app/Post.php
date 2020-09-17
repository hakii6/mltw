<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $table = 'twitterposts';
    public $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;


}
