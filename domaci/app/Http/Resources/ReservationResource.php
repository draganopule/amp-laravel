<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
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
            'chek_in_date' => $this->check_in_date,
            'chek_out_date' => $this->check_out_date,
            'hotel_id' => $this->hotel_id,
            'hotel' =>
                new HotelResource(
                    $this->whenLoaded('hotel')
                ),
            'user_id' => $this->user_id,
            'user' =>
                new UserResource(
                    $this->whenLoaded('user')
                )
        ];
    }
}
