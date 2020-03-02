<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRoomTypeRequest extends FormRequest
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
        $hotelId = $this->route('hotel');
        return [
            'name' => "required|string|max:250|unique:room_types,name,NULL,id,hotel_id,$hotelId",
            'number_of_beds' => 'required|integer|min:1',
            'number_of_bedrooms' => 'required|integer|min:1',
            'number_of_bathrooms' => 'required|integer|min:1',
            'number_of_guests' => 'required|integer|min:1',
            'price_per_night' => 'required|numeric',
            'description' => 'required',
            'hotel_id' => 'required|integer|exists:hotels,id'
        ];
    }
}
