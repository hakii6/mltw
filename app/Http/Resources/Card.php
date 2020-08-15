<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Card extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $idol_name_tw = $this->idol->name_tw;
        $idol_id = $this->idol->id;
        $images = $this->card_images;
        $imageA = '';
        $imageB = '';

        $get_card = '';

        $center_skill = $this->center_skill;
        $skill_type = $this->skill_type;


        foreach($images as $image){

            if($image->description == 'is_awaken'){

                $imageB = $image->image;

            }else if($image->description == 'not_awaken'){

                $imageA = $image->image;

            }

        }
        return [

            'get_card' => $get_card,

            'center_skill' => $this->center_skill,
            'skill_type' => $this->skill_type,

            'skill' => $this->skill,
            'id' => $this->id,
            'name_tw' => $this->name_tw,
            'name_jp' => $this->name_jp,
            'limited' => $this->limited,
            'dance' => $this->dance,
            'vocal' => $this->vocal,
            'visual' => $this->visual,
            'total' => $this->total,
            'imageA' => $imageA,
            'imageB' => $imageB,
            'rarity' => $this->rarity,
            'idol_name_tw' => $idol_name_tw,
            'idol_id' => $idol_id,

        ];
    }
}
