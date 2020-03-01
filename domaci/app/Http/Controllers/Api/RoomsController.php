<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RoomResource;
use App\Http\Requests\CreateRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Room;
use App\Hotel;

class RoomsController extends Controller
{
    public function index($id)
    {
        $rooms = Room::with(['hotel','roomType'])
        ->where('hotel_id',$id)
        ->get();

        return RoomResource::collection($rooms);
    }

    public function store(Request $request, $hotelId)
    {
        $this->validate($request, [
            'number'  => "required|integer|unique:rooms,number,NULL,id,hotel_id,$hotelId",
            'hotel_id'  => 'required|integer|exists:hotels,id',
            'room_type_id'  => 'required|integer|exists:room_types,id',
        ]);

        $room = new Room($request->all());
        $room->save();

        $room->load(['hotel','roomType']);
        
        return new RoomResource($room);
    }

    public function show(Hotel $hotel, Room $room)
    {
        $room->load(['hotel','roomType']);
        return new RoomResource($room);
    } 

    public function update(Request $request, $hotelId, Room $room)
    {
        $this->validate($request, [
            'number'  => "integer|unique:rooms,number,{$room->id},id,hotel_id,$hotelId",
            'hotel_id'  => 'integer|exists:hotels,id',
            'room_type_id'  => 'integer|exists:room_types,id',
        ]);

        $room->fill($request->all());
        $room->save();

        $room->load(['hotel','roomType']);
        return new RoomResource($room);
    }

    public function destroy(Hotel $hotel, Room $room)
    {
        $room->delete();

        return response()->noContent();
    }
}
