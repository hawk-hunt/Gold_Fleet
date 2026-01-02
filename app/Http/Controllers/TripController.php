<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trips = Trip::paginate(15);
        return view('trips.index', compact('trips'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('trips.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'trip_number' => 'required|string|unique:trips',
            'vehicle_id' => 'required|exists:vehicles,id',
            'driver_id' => 'required|exists:drivers,id',
            'origin' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'distance' => 'required|numeric|min:0',
            'estimated_duration' => 'required|numeric|min:0',
            'start_time' => 'required|date_format:Y-m-d\TH:i',
            'status' => 'required|in:completed,ongoing,scheduled',
        ]);

        $validated['start_time'] = date('Y-m-d H:i:s', strtotime($validated['start_time']));
        Trip::create($validated);

        return redirect()->route('trips.index')
            ->with('success', 'Trip recorded successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trip $trip)
    {
        return view('trips.edit', compact('trip'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trip $trip)
    {
        $validated = $request->validate([
            'trip_number' => 'required|string|unique:trips,trip_number,' . $trip->id,
            'vehicle_id' => 'required|exists:vehicles,id',
            'driver_id' => 'required|exists:drivers,id',
            'origin' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'distance' => 'required|numeric|min:0',
            'estimated_duration' => 'required|numeric|min:0',
            'start_time' => 'required|date_format:Y-m-d\TH:i',
            'status' => 'required|in:completed,ongoing,scheduled',
        ]);

        $validated['start_time'] = date('Y-m-d H:i:s', strtotime($validated['start_time']));
        $trip->update($validated);

        return redirect()->route('trips.index')
            ->with('success', 'Trip updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trip $trip)
    {
        $trip->delete();

        return redirect()->route('trips.index')
            ->with('success', 'Trip deleted successfully!');
    }
}
