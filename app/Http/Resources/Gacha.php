<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Card as CardResource;

class Gacha extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        $cards = CardResource::collection($this->cards);
        $image = $this->gacha_images[0]->image;
        
        return [

            'id' => $this->id,
            'name_tw' => $this->name_tw,
            'name_jp' => $this->name_jp,
            'cards' => $cards,
            'image' => $image,

            'start_date' => $this->start_date,
            'end_date' => $this->end_date,

        ];
    }
}
