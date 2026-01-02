<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::paginate(15);
        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'service_type' => 'required|string|max:255',
            'service_date' => 'required|date',
            'next_service_date' => 'required|date',
            'cost' => 'required|numeric|min:0',
            'status' => 'required|in:completed,pending,scheduled',
            'notes' => 'nullable|string',
        ]);

        Service::create($validated);

        return redirect()->route('services.index')
            ->with('success', 'Service record added successfully!');
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
    public function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'service_type' => 'required|string|max:255',
            'service_date' => 'required|date',
            'next_service_date' => 'required|date',
            'cost' => 'required|numeric|min:0',
            'status' => 'required|in:completed,pending,scheduled',
            'notes' => 'nullable|string',
        ]);

        $service->update($validated);

        return redirect()->route('services.index')
            ->with('success', 'Service updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('services.index')
            ->with('success', 'Service deleted successfully!');
    }
}
