<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Map extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if($this->map_info){
            $info = $this->map_info;
        
            return [

                'id' => $this->id,
                'name_tw' => $this->name_tw,
                'name_jp' => $this->name_jp,
                'image' => $this->song_images[0]->image,
                'type' => $this->type,

                'move' => $info->move,
                'speed_max' => $info->speed_max,
                'speed_min' => $info->speed_min,
                'flick_total' => $info->flick_total,
                'flick_left' => $info->flick_left,
                'flick_up' => $info->flick_up,
                'flick_right' => $info->flick_right,
                'line' => $info->line,
                'sliders' => $info->sliders,
                'circle_small' => $info->circle_small,
                'circle_big' =>$info->circle_big,
                'circle_huge' => $info->circle_huge,
                'stream_total' => $info->stream_total,
                'stream_max' => $info->stream_max,

            ];
        }
        else{

            return [

                'id' => $this->id,
                'name_tw' => $this->name_tw,
                'name_jp' => $this->name_jp,
                'image' => $this->song_images[0]->image,
                'type' => $this->type,

                'move' => null,
                'speed_max' => null,
                'speed_min' => null,
                'flick_total' => null,
                'flick_left' => null,
                'flick_up' => null,
                'flick_right' => null,
                'line' => null,
                'sliders' => null,
                'circle_small' => null,
                'circle_big' => null,
                'circle_huge' => null,
                'stream_total' => null,
                'stream_max' => null,

            ];


        }
    }


}
