<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Card;
use App\Song;
use App\Http\Resources\Card as CardResource;
use App\Http\Resources\Song as SongResource;


class Idol extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        $idol_image = '';

        if($this->id <= 52){
            $card = Card::where('idol_id' , $this->id)->where('rarity' , 'N')->first();
            $images = $card->card_images;
            
            foreach($images as $image){

                if($image->description == 'not_awaken'){

                    $idol_image = $image->image;
                    break;

                }

            }
        }
        else{

            $card = Card::where('idol_id' , $this->id)->first();
            $images = $card->card_images;
            foreach($images as $image){

                if($image->description == 'not_awaken'){

                    $idol_image = $image->image;
                    break;

                }

            }
        }

        $songs = SongResource::collection($this->songs);
        $cards = CardResource::collection($this->cards);

        return[
            'id' => $this->id,
            'name_tw' => $this->name_tw,
            'name_jp' => $this->name_jp,
            'image' => $idol_image,
            'type' => $this->type,

            'songs' => $songs,
            'cards' => $cards,


        ];
    }
}
