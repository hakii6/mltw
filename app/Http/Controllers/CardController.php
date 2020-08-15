<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Card;
use App\Idol;
use App\Http\Resources\Card as CardResource;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

                $card = Card::findOrFail($choose);
                return new CardResource($card);

            }

            

        }
        $pos = strpos($choose , '_');

        if($pos === false){

            return false;

        }

        $choose_A = substr($choose , 0 ,  $pos);
        $choose_B = substr($choose , $pos , );
        $type = ['PRINCESS' , 'FAIRY' , 'ANGEL' , 'EX'];
        $rarity = ['SSR' , 'SR' , 'R' , 'N'];
        $T = '';
        $R = '';
        foreach($type as $t)
        {
            if(strpos($choose_A, $t) !== false){

                $T = $t;
                break;

            }
        }

        foreach($rarity as $r){

            if(strpos($choose_B , $r) !== false){

                $R = $r;
                break;

            }

        }

        $idols = Idol::where('type' , $T)->get('id');
        $cards = Card::where('rarity' , $R)->whereIn('idol_id' , $idols)->get();

        return CardResource::collection($cards);


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
