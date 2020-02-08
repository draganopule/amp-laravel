<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RoomType;

class RoomTypesController extends Controller
{
    public function index()
    {
        $room_types = RoomType::all();

        return response()->json($room_types);
    }

    public function store(Request $request)
    {
        $room_type = new RoomType($request->all());
        $room_type->save();

        return response()->json($room_type, 201);
    }

    public function show(RoomType $room_type)
    {
        $room_type->load('room_types');
        return response()->json($room_type);
    } 

    public function update(Request $request, RoomType $room_type)
    {
        $room_type->fill($request->all());
        $room_type->save();
        return response()->json($room_type);
    }

    public function destroy(RoomType $room_type)
    {
        $room_type->delete();

        return response()->noContent();
    }
}
