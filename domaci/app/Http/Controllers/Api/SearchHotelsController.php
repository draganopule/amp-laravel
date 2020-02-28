<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\HotelResource;
use App\Hotel;

class SearchHotelsController extends Controller
{
    public function search(Request $request)
    {
        $roomsSearch = new SearchRoomsController;
        $query = Hotel::query();

        if($request->has('city')) {
            $query->where('city', $request->get('city'));
        }
        if($request->has('country_id')){
            $query->where('country_id',$request->get('country_id'));
        }
        
        $query->whereHas('roomTypes', function($fQuery) use ($request){
            if($request->has('number_of_beds_min')){
                $fQuery->where('number_of_beds','>=', $request->get('number_of_beds_min'));
            }
            if($request->has('number_of_bedrooms_min')){
                $fQuery->where('number_of_bedrooms','>=', $request->get('number_of_bedrooms_min')
                );
            }
            if($request->has('number_of_bathrooms_min')){
                $fQuery->where('number_of_bathrooms','>=', $request->get('number_of_bathrooms_min')
                );
            }
            if($request->has('number_of_guests_min')){
                $fQuery->where('number_of_guests','>=', $request->get('number_of_guests_min')
                );
            }
        });

        $perPage = intval($request->get('per_page', 20));
        if($perPage <= 1) $perPage = 1;
        if($perPage >= 50) $perPage = 50;

        $query->with(['media']);
        $hotels = $query->paginate($perPage);

        $queryStringParams = [
            'per_page' => $perPage
        ];
        $queryStringParams = $request->only(['city', 'country_id', 'number_of_beds_min', 
        'number_of_bedrooms_min', 'number_of_guests_min']);

        $hotels->appends($queryStringParams);

        return HotelResource::collection($hotels);
    }
}
