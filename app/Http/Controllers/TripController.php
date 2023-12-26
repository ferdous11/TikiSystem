<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;
use App\Models\Location;

class TripController extends Controller
{
    public function index()
    {
        $locations = Location::all();
        return view('trips.index', compact('locations'));
    }

    public function store(Request $request)
    {
        // Check if the user is an admin
        // if (auth()->user()->role !== 'admin') {
        //     abort(403, 'Unauthorized');
        // }

        // Validation logic for the form data
        $request->validate([
            'date' => 'required|date',
            // Add more validation rules as needed
        ]);

        // Create a new trip
        $trip = Trip::create([
            'date' => $request->input('date'),
            // Add more fields as needed
        ]);

        // Attach locations to the trip
        $locations = $request->input('locations');
        $trip->locations()->attach($locations);

        return redirect('/trips')->with('success', 'Trip created successfully!');
    }
}
