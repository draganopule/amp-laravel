<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RoomType;
use App\Hotel;

class RoomTypesController extends Controller
{
    public function index($id)
    {
        $roomType = RoomType::with(['media'])
        ->where('hotel_id',$id)
        ->get();

        return response()->json($roomType);
    }

    public function store(Request $request)
    {
        $roomType = new RoomType($request->all());
        $roomType->save();
        
        foreach($request->file('pictures') as $picture){
            $roomType->addMedia($picture)
            ->toMediaCollection();
        }

        $roomType->load(['media']);

        return response()->json($roomType, 201);
    }

    public function show(Hotel $hotel, RoomType $roomType)
    {
        $roomType->load(['media']);
        return response()->json($roomType);
    } 

    public function update(Request $request, Hotel $hotel, RoomType $roomType)
    {
        $roomType->fill($request->all());
        $roomType->save();

        foreach($request->file('pictures', []) as $picture){
            $roomType->addMedia($picture)
            ->toMediaCollection();
        }

        $roomType->load(['media']);
        return response()->json($roomType);
    }

    public function destroy(Hotel $hotel, RoomType $roomType)
    {
        $roomType->delete();

        return response()->noContent();
    }
}
