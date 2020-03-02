<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoomTypeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $roomType = $this->route('room-type');
        $hotelId = $this->route('hotel');
        return [
            'name' => "required|string|max:250|
                unique:room_types,name,{$roomType},id,hotel_id,$hotelId",
            'number_of_beds' => 'integer|min:1',
            'number_of_bedrooms' => 'integer|min:1',
            'number_of_bathrooms' => 'integer|min:1',
            'number_of_guests' => 'integer|min:1',
            'price_per_night' => 'numeric',
            'hotel_id' => 'integer|exists:hotels,id'
        ];
    }
}
