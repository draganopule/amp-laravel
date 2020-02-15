<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoomTypeResource extends JsonResource
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
            'number_of_beds' => $this->number_of_beds,
            'number_of_bedrooms' => $this->number_of_bedrooms,
            'number_of_bathrooms' => $this->number_of_bathrooms,
            'number_of_guests' => $this->number_of_guests,
            'price_per_night' => $this->price_per_night,
            'description' => $this->description,
            'hotel_id' => $this->hotel_id,
            'hotel' =>
                new HotelResource(
                    $this->whenLoaded('hotel')
                ),
        ];
    }
}
