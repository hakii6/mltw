<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Level;

class DatasController extends Controller
{
    public function index(){

        return view('datas.index');

    }

    public function levels(){

        $levels_list =[];
        $levels = Level::all();
        $temp = [];
        for ($i = 1; $i <= 400; ++$i){

            array_push($temp , Level::where('等級' , $i)->firstOrFail());
            if($i % 10 == 0){

                array_push($levels_list , $temp);
                $temp = [];

            }

        }

        return view('datas.levels')->with('levels_list' , $levels_list);

    }

}
