<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gacha;
use App\Http\Resources\Gacha as GachaResource;

class GachaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gachas = Gacha::all();

        return GachaResource::collection($gachas);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($choose)
    {
        if(is_numeric($choose)){

            if(strlen($choose) <= 4){

                return new GachaResource(Gacha::findOrFail($choose));

            }


        }

        else if(strlen($choose) == 3){

            if($choose === 'now'){

                $gacha = Gacha::orderBy('start_date' , 'DESC')->where('start_date', '<=', date("Y/m/d"))->firstOrFail();
                return new GachaResource($gacha);

            }
            

        }

        else{

            return false;

        }



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
