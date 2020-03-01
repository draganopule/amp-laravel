<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CountryResource;
use App\Http\Requests\CreateCountryRequest;
use App\Http\Requests\UpdateCountryRequest;
use App\Country;

class CountriesController extends Controller
{
    public function index()
    {
        $countries = Country::all();

        return CountryResource::collection($countries);
    }

    public function store(CreateCountryRequest $request)
    {
        $country = new Country($request->all());
        $country->save();

        return new CountryResource($country);
    }

    public function show(Country $country)
    {
        $country->load('hotels');
        return new CountryResource($country);
    } 

    public function update(UpdateCountryRequest $request, Country $country)
    {
        $country->fill($request->all());
        $country->save();
        return new CountryResource($country);
    }

    public function destroy(Country $country)
    {
        $country->delete();

        return response()->noContent();
    }
}
