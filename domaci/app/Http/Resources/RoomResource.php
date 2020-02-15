<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
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
            'number' => $this->number,
            'hotel_id' => $this->hotel_id,
            'hotel' =>
                new HotelResource(
                    $this->whenLoaded('hotel')
                ),
            'room_type_id' => $this->room_type_id, 
            'roomType' =>
                new RoomTypeResource(
                    $this->whenLoaded('roomType')
                ),
        ];
    }
}
