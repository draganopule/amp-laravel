<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRoomRequest extends FormRequest
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
        $hotel = $this->route('hotel');
        return [
            'number'  => "required|integer|unique:rooms,number,NULL,id,hotel_id,{$hotel->id}",
            'hotel_id'  => 'required|integer|exists:hotels,id',
            'room_type_id'  => 'required|integer|exists:room_types,id',
        ];
    }
}
