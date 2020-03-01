<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\HotelResource;
use App\Hotel;
use App\Http\Requests\CreateHotelRequest;
use App\Http\Requests\UpdateHotelRequest;

class HotelsController extends Controller
{
    public function index()
    {
        $hotels = Hotel::with(['country', 'media'])
        ->get();

        return HotelResource::collection($hotels);
    }

    public function store(CreateHotelRequest $request)
    {
        $hotel = new Hotel($request->all());
        $hotel->save();

        foreach($request->file('pictures') as $picture){
            $hotel->addMedia($picture)
            ->toMediaCollection();
        }

        $hotel->load(['country', 'media']);

        return new HotelResource($hotel);
    }

    public function show(Hotel $hotel)
    {
        $hotel->load(['country', 'media']);
        return new HotelResource($hotel);
    } 

    public function update(UpdateHotelRequest $request, Hotel $hotel)
    {
        $hotel->fill($request->all());
        $hotel->save();

        foreach($request->file('pictures', []) as $picture){
            $hotel->addMedia($picture)
            ->toMediaCollection();
        }

        $hotel->load(['country', 'media']);
        return new HotelResource($hotel);
    }

    public function destroy(Hotel $hotel)
    {
        $hotel->delete();

        return response()->noContent();
    }

    public function deletePicture(Hotel $hotel, $pictureId)
    {
        $hotel->media()->where('id', $pictureId)->delete();
        return response()->noContent();
    }
}
