<?php

namespace App\Http\Controllers;

use App\Events\StatusBookingUpdated;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Booking::create($request->all());

        return response()->json('OK', 200);
    }

    public function getMyBookings(string $emailGuest)
    {
        $bookings = Booking::with('room.hotel')->where('emailGuest', $emailGuest)->get();

        return response()->json($bookings);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $emailGuest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    }

    public function updateStatus(string $id)
    {
        broadcast(new StatusBookingUpdated($id, 'confirmed'));

        return response()->json([], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
