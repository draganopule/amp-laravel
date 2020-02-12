<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RoomType;
use Illuminate\Database\Eloquent\Builder;

class SearchRoomsController extends Controller
{
    public function search($id, Request $request)
    {
        $query = RoomType::query()
        ->where('hotel_id',$id);


        if($request->has('name')) {
            $query->where(
                'name',
                $request->get('name')
            );
        }

        if($request->has('number_of_beds_min')){
            $query->where(
                'number_of_beds',
                '>=',
                $request->get('number_of_beds_min')
            );
        }

        if($request->has('number_of_bedrooms_min')){
            $query->where(
                'number_of_bedrooms',
                '>=',
                $request->get('number_of_bedrooms_min')
            );
        }
        if($request->has('number_of_bathrooms_min')){
            $query->where(
                'number_of_bathrooms',
                '>=',
                $request->get('number_of_bathrooms_min')
            );
        }
        if($request->has('number_of_guests_min')){
            $query->where(
                'number_of_guests',
                '>=',
                $request->get('number_of_guests_min')
            );
        }
        if($request->has('check_in_date') && $request->has('check_out_date')){
            
        }

        $query->with(['hotel'])->withCount('rooms');
         
        $roomTypes = $query->get();
        $roomTypes->load(['media']);
         return response()->json($roomTypes);
    }
}
