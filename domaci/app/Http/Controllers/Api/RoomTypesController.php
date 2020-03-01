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

    public function store(Request $request, $hotelId)
    {
        $this->validate($request, [
            'name' => "required|string|max:250|unique:room_types,name,NULL,id,hotel_id,$hotelId",
            'number_of_beds' => 'required|integer|min:1',
            'number_of_bedrooms' => 'required|integer|min:1',
            'number_of_bathrooms' => 'required|integer|min:1',
            'number_of_guests' => 'required|integer|min:1',
            'price_per_night' => 'required|numeric',
            'description' => 'required',
            'hotel_id' => 'required|integer|exists:hotels,id'
        ]);
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

    public function update(UpdateRoomTypeRequest $request, $hotelId, RoomType $roomType)
    {
        $this->validate($request, [
            'name' => "required|string|max:250|
                unique:room_types,name,{$roomType->id},id,hotel_id,$hotelId",
            'number_of_beds' => 'integer|min:1',
            'number_of_bedrooms' => 'integer|min:1',
            'number_of_bathrooms' => 'integer|min:1',
            'number_of_guests' => 'integer|min:1',
            'price_per_night' => 'numeric',
            'hotel_id' => 'integer|exists:hotels,id'
        ]);
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
