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

    public function store(CreateRoomRequest $request, Hotel $hotel)
    {
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

    public function update(UpdateRoomRequest $request, Hotel $hotel, Room $room)
    {
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
