<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHotelRequest extends FormRequest
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
            'name'=> "string|max:250|unique:hotels,name,{$hotel->id}",
            'star' => "integer|min:1|max:5",
            'street_address' => 'string|max:250',
            'city' => 'string|max:250',
            'country_id' => 'integer|exists:countries,id',
            'pictures' => 'array',
            'pictures.*' => 'image',
        ];
    }
}
