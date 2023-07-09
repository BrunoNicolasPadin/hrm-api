<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $rooms = Room::search($request->hotel)->query(function ($builder) {
            $builder->join('hotels', 'rooms.hotel_id', '=', 'hotels.id')
                ->select('rooms.id', 'rooms.hotel_id', 'rooms.number', 'rooms.size', 'rooms.bath', 'hotels.name AS hotelName');
        })->paginate(25);

        return response()->json($rooms);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
