<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoomRequest extends FormRequest
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
        $room = $this->route('room');
        $hotel = $this->route('hotel');
        return [
            'number'  => "integer|unique:rooms,number,{$room->id},id,hotel_id,{$hotel->id}",
            'hotel_id'  => 'integer|exists:hotels,id',
            'room_type_id'  => 'integer|exists:room_types,id',
        ];
    }
}
