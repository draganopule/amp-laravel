<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HotelResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'star' => $this->star,
            'street_address' => $this->street_address,
            'city' => $this->city,
            'country_id' => $this->country_id,
            'country' =>
                new CountryResource(
                    $this->whenLoaded('country')
                ),
            'media' => MediaResource::collection(
                $this->whenLoaded('media')
            )
        ];
    }
}
