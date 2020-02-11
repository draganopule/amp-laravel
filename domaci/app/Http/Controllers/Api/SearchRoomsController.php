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
       
        //  $query->with(['hotel']);

         $rooms = $query->with(['hotel'])->withCount('rooms')->get();

        foreach ($rooms as $room) {
            echo $room->rooms_count . ' ';
        }

        return response()->json($rooms);

        // $query->with(['hotel'])->withCount('rooms');
         
        // $roomTypes = $query->get();
         
        //  return response()->json($roomTypes);
    }
}
