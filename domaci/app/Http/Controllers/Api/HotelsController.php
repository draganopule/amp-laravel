<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Hotel;

class HotelsController extends Controller
{
    public function index()
    {
        $hotels = Hotel::with(['country', 'media'])
        ->get();

        return response()->json($hotels);
    }

    public function store(Request $request)
    {
        $hotel = new Hotel($request->all());
        $hotel->save();

        foreach($request->file('pictures') as $picture){
            $hotel->addMedia($picture)
            ->toMediaCollection();
        }

        $hotel->load(['country', 'media']);

        return response()->json($hotel, 201);
    }

    public function show(Hotel $hotel)
    {
        $hotel->load(['country', 'media']);
        return response()->json($hotel);
    } 

    public function update(Request $request, Hotel $hotel)
    {
        $hotel->fill($request->all());
        $hotel->save();

        foreach($request->file('pictures', []) as $picture){
            $hotel->addMedia($picture)
            ->toMediaCollection();
        }

        $hotel->load(['country', 'media']);
        return response()->json($hotel);
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
