<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateHotelRequest extends FormRequest
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
        return [
            'name'=> 'required|string|max:250',
            'description'=> 'required',
            'star' => 'required|integer|min:1|max:5',
            'street_address' => 'required|string|max:250',
            'city' => 'required|string|max:250',
            'country_id' => 'required|integer|exists:countries,id',
            'pictures' => 'required|array',
            'pictures.*' => 'required|image',
        ];
    }
}
