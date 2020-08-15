<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Song extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $map = $this->map;
        $images = $this->song_images;
        $image = $images[0]->image;

        return [

            'id' => $this->id,
            'name_tw' => $this->name_tw,
            'name_jp' => $this->name_jp,
            'length' => $this->length,
            'type' => $this->type,
            'map' => $map,
            'EZ_LV' => $this->EZ_LV,
            'NM_LV' => $this->NM_LV,
            'HR_LV' => $this->HR_LV,
            'HR2_LV' => $this->HR2_LV,
            'EX_LV' => $this->EX_LV,
            'EZ_notes' => $this->EZ_notes,
            'NM_notes' => $this->NM_notes,
            'HR_notes' => $this->HR_notes,
            'HR2_notes' => $this->HR2_notes,
            'EX_notes' => $this->EX_notes,
            'image' => $image,
            'date' => $this->date,
            'BPM' => $this->BPM,

        ];
    }
}
