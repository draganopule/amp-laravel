<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ReservationResource;
use App\Reservation;
use App\User;

class ReservationsController extends Controller
{
    public function index($id)
    {
        $reservations = Reservation::with(['hotel','user','rooms'])
        ->where('user_id',$id)
        ->get();

        return Reservation::collection($reservations);
    }

    public function store(Request $request)
    {
        $reservation = new Reservation($request->all());
        $reservation->save();

        $reservation->load(['hotel','user','rooms']);

        return new ReservationResource($reservation);
    }

    public function show(User $user, Reservation $reservation)
    {
        $reservation->load(['hotel','user', 'rooms']);
        return new ReservationResource($reservation);
    } 

    public function update(Request $request, User $user, Reservation $reservation)
    {
        $reservation->fill($request->all());
        $reservation->save();

        $reservation->load(['hotel','user','rooms']);
        return new ReservationResource($reservation);
    }

    public function destroy(User $user, Reservation $reservation)
    {
        $reservation->delete();

        return response()->noContent();
    }
}
