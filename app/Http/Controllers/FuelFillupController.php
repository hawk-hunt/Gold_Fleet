<?php

namespace App\Http\Controllers;

use App\Models\FuelFillup;
use Illuminate\Http\Request;

class FuelFillupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fuelFillups = FuelFillup::paginate(15);
        return view('fuel_fillups.index', compact('fuelFillups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fuel_fillups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'driver_id' => 'nullable|exists:drivers,id',
            'quantity' => 'required|numeric|min:0',
            'amount' => 'required|numeric|min:0',
            'filled_date' => 'required|date',
            'odometer_reading' => 'required|numeric|min:0',
            'location' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        FuelFillup::create($validated);

        return redirect()->route('fuel_fillups.index')
            ->with('success', 'Fuel fill-up recorded successfully!');
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
    public function edit(FuelFillup $fuelFillup)
    {
        return view('fuel_fillups.edit', compact('fuelFillup'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FuelFillup $fuelFillup)
    {
        $validated = $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'driver_id' => 'nullable|exists:drivers,id',
            'quantity' => 'required|numeric|min:0',
            'amount' => 'required|numeric|min:0',
            'filled_date' => 'required|date',
            'odometer_reading' => 'required|numeric|min:0',
            'location' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $fuelFillup->update($validated);

        return redirect()->route('fuel_fillups.index')
            ->with('success', 'Fuel fill-up updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FuelFillup $fuelFillup)
    {
        $fuelFillup->delete();

        return redirect()->route('fuel_fillups.index')
            ->with('success', 'Fuel fill-up deleted successfully!');
    }
}
