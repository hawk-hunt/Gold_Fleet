<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companyId = auth()->user()->company_id;

        $vehicles = Vehicle::where('company_id', $companyId)
            ->with(['trips' => function($query) {
                $query->latest()->limit(1);
            }])
            ->paginate(15);

        return view('vehicles.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vehicles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $companyId = auth()->user()->company_id;

        $validator = Validator::make($request->all(), [
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'license_plate' => 'required|string|max:255|unique:vehicles,license_plate',
            'vin' => 'required|string|max:255|unique:vehicles,vin',
            'status' => 'required|in:active,inactive,maintenance',
            'fuel_capacity' => 'nullable|numeric|min:0',
            'fuel_type' => 'required|in:diesel,gasoline,electric,hybrid',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Vehicle::create([
            'company_id' => $companyId,
            'make' => $request->make,
            'model' => $request->model,
            'year' => $request->year,
            'license_plate' => $request->license_plate,
            'vin' => $request->vin,
            'status' => $request->status,
            'fuel_capacity' => $request->fuel_capacity,
            'fuel_type' => $request->fuel_type,
        ]);

        return redirect()->route('vehicles.index')
            ->with('success', 'Vehicle created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle)
    {
        // Ensure vehicle belongs to user's company
        if ($vehicle->company_id !== auth()->user()->company_id) {
            abort(403);
        }

        $vehicle->load([
            'trips' => function($query) {
                $query->latest()->limit(10);
            },
            'services' => function($query) {
                $query->latest()->limit(10);
            },
            'issues' => function($query) {
                $query->latest()->limit(10);
            },
            'expenses' => function($query) {
                $query->latest()->limit(10);
            },
            'fuelFillups' => function($query) {
                $query->latest()->limit(10);
            },
            'reminders' => function($query) {
                $query->where('status', 'pending')->latest()->limit(5);
            }
        ]);

        return view('vehicles.show', compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicle $vehicle)
    {
        // Ensure vehicle belongs to user's company
        if ($vehicle->company_id !== auth()->user()->company_id) {
            abort(403);
        }

        return view('vehicles.edit', compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        // Ensure vehicle belongs to user's company
        if ($vehicle->company_id !== auth()->user()->company_id) {
            abort(403);
        }

        $validator = Validator::make($request->all(), [
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'license_plate' => 'required|string|max:255|unique:vehicles,license_plate,' . $vehicle->id,
            'vin' => 'required|string|max:255|unique:vehicles,vin,' . $vehicle->id,
            'status' => 'required|in:active,inactive,maintenance',
            'fuel_capacity' => 'nullable|numeric|min:0',
            'fuel_type' => 'required|in:diesel,gasoline,electric,hybrid',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $vehicle->update($request->only([
            'make', 'model', 'year', 'license_plate', 'vin', 'status', 'fuel_capacity', 'fuel_type'
        ]));

        return redirect()->route('vehicles.index')
            ->with('success', 'Vehicle updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle)
    {
        // Ensure vehicle belongs to user's company
        if ($vehicle->company_id !== auth()->user()->company_id) {
            abort(403);
        }

        $vehicle->delete();

        return redirect()->route('vehicles.index')
            ->with('success', 'Vehicle deleted successfully.');
    }
}
