<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCountryRequest extends FormRequest
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
        $country = $this->route('country');

        return [
            'name'=> "required|string|max:250|unique:countries,name,{$country->id}",
            'alpha2' => "required|string|size:2|unique:countries,alpha2,{$country->id}",
            'alpha3' => "required|string|size:3|unique:countries,alpha3,{$country->id}",
        ];
    }
}
