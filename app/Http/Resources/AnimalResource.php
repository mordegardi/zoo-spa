<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class AnimalResource
 */
class AnimalResource extends JsonResource
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
            'id'            => $this->id,
            'name'          => $this->name,
            'species_id'    => $this->species_id,
            'species'       => $this->species->name,
            'nickname'      => $this->nickname,
            'image'         => $this->image,
        ];
    }
}
