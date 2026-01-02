<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\VehicleLocation;
use Illuminate\Http\Request;

class MapDashboardController extends Controller
{
    public function index()
    {
        $companyId = auth()->user()->company_id;

        // Get all active vehicles for the company
        $vehicles = Vehicle::where('company_id', $companyId)
            ->where('status', 'active')
            ->with(['vehicleLocations' => function($query) {
                $query->latest('recorded_at')->limit(1);
            }])
            ->get();

        // Get latest locations for map display
        $vehicleLocations = VehicleLocation::whereHas('vehicle', function($query) use ($companyId) {
            $query->where('company_id', $companyId)->where('status', 'active');
        })
        ->with('vehicle')
        ->selectRaw('DISTINCT ON (vehicle_id) *')
        ->orderBy('vehicle_id')
        ->orderBy('recorded_at', 'desc')
        ->get();

        return view('dashboard.map', compact('vehicles', 'vehicleLocations'));
    }

    public function getVehicleLocations()
    {
        $companyId = auth()->user()->company_id;

        $locations = VehicleLocation::whereHas('vehicle', function($query) use ($companyId) {
            $query->where('company_id', $companyId)->where('status', 'active');
        })
        ->with(['vehicle:id,make,model,license_plate'])
        ->selectRaw('DISTINCT ON (vehicle_id) *')
        ->orderBy('vehicle_id')
        ->orderBy('recorded_at', 'desc')
        ->get();

        return response()->json($locations);
    }
}
