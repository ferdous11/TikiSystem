<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;
use App\Models\SeatAllocation;

class TicketController extends Controller
{
    public function index()
    {
        $trips = Trip::all();
        return view('tickets.index', compact('trips'));
    }

    public function store(Request $request)
    {
        // Ensure the user is authenticated
        // if (!auth()->check()) {
        //     return redirect('/login')->with('error', 'Please log in to purchase tickets.');
        // }

        // Validation logic for the form data
        $request->validate([
            'trip_id' => 'required|exists:trips,id',
            'seat_number' => 'required|integer|min:1|max:36',
            // Add more validation rules as needed
        ]);

        // Check seat availability for the selected trip
        $trip = Trip::findOrFail($request->input('trip_id'));
        $seatNumber = $request->input('seat_number');

        if ($trip->seatAllocations()->where('seat_number', $seatNumber)->exists()) {
            return redirect('/tickets')->with('error', 'Seat is already booked. Please choose another seat.');
        }

        // Allocate the seat to the user
        $trip->seatAllocations()->create([
            'seat_number' => $seatNumber,
            // Add more fields as needed
        ]);

        return redirect('/tickets')->with('success', 'Ticket purchased successfully!');
    }

}
