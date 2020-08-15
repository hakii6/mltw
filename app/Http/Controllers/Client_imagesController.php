<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client_image;

class Client_imagesController extends Controller
{

    public function save_images(Request $request){

        $this->validate($request, [

            'image' => 'required',
            
        ]);

        $flag = Client_image::all();
        if (sizeof($flag) == 0){

            $count = 1;

        }else{
            $a = Client_image::orderBy('id' , 'DESC')->first();
            $count = $a->id + 1;
        }


        $client_image = new Client_image;
        $client_image->id = $count;
        $client_image->client_imageable_type = $request->type;
        $client_image->client_imageable_id = $request->id;
        $client_image->image = $request->image;
        $client_image->description = $request->description;
        $client_image->save();
        return 'papara';

    }

    public function va(Request $request){


        $this->validate($request, [

            'id' => 'required',

        ]);

        $image = Client_image::find($request->id);
        $image->validation = 1;
        $image->save();

        return 0;
    }

}
