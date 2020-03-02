<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RoomTypeResource;
use App\Http\Requests\CreateRoomTypeRequest;
use App\Http\Requests\UpdateRoomTypeRequest;
use App\RoomType;
use App\Hotel;

class RoomTypesController extends Controller
{
    public function index($id)
    {
        $roomTypes = RoomType::with(['media'])
        ->where('hotel_id',$id)
        ->get();

        return RoomTypeResource::collection($roomTypes);
    }

    public function store(CreateRoomTypeRequest $request, Hotel $hotel)
    {
        $roomType = new RoomType($request->all());
        $roomType->save();
        
        foreach($request->file('pictures') as $picture){
            $roomType->addMedia($picture)
            ->toMediaCollection();
        }

        $roomType->load(['media']);

        return new RoomTypeResource($roomType);
    }

    public function show(Hotel $hotel, RoomType $roomType)
    {
        $roomType->load(['media']);
        return new RoomTypeResource($roomType);
    } 

    public function update(UpdateRoomTypeRequest $request, Hotel $hotel, RoomType $roomType)
    {
        $roomType->fill($request->all());
        $roomType->save();

        foreach($request->file('pictures', []) as $picture){
            $roomType->addMedia($picture)
            ->toMediaCollection();
        }

        $roomType->load(['media']);
        return new RoomTypeResource($roomType);
    }

    public function destroy(Hotel $hotel, RoomType $roomType)
    {
        $roomType->delete();

        return response()->noContent();
    }
}
