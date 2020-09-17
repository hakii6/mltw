<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Card as CardResource;
use App\Http\Resources\Song as SongResource;


class Event extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        
        return [

            'id' => $this->id,
            'name_tw' => $this->name_tw,
            'name_jp' => $this->name_jp,
            'cards' => CardResource::collection($this->cards),
            'image' => $this->event_images[0]->image,
            'type' => $this->type,
            'songs' => SongResource::collection($this->songs),

            'start_date' => $this->start_date,
            'boost_date' => $this->boost_date,
            'end_date' => $this->end_date,
            'api_id' => $this->api_id,

        ];

    }
}
