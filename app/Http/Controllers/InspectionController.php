<?php

namespace App\Http\Controllers;

use App\Models\Inspection;
use Illuminate\Http\Request;

class InspectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inspections = Inspection::paginate(15);
        return view('inspections.index', compact('inspections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inspections.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'inspection_type' => 'required|string|max:255',
            'inspection_date' => 'required|date',
            'result' => 'required|in:passed,failed',
            'checklist' => 'nullable|array',
            'status' => 'required|in:completed,pending',
            'notes' => 'nullable|string',
        ]);

        $validated['checklist'] = json_encode($request->get('checklist', []));
        Inspection::create($validated);

        return redirect()->route('inspections.index')
            ->with('success', 'Inspection recorded successfully!');
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
    public function edit(Inspection $inspection)
    {
        return view('inspections.edit', compact('inspection'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inspection $inspection)
    {
        $validated = $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'inspection_type' => 'required|string|max:255',
            'inspection_date' => 'required|date',
            'result' => 'required|in:passed,failed',
            'checklist' => 'nullable|array',
            'status' => 'required|in:completed,pending',
            'notes' => 'nullable|string',
        ]);

        $validated['checklist'] = json_encode($request->get('checklist', []));
        $inspection->update($validated);

        return redirect()->route('inspections.index')
            ->with('success', 'Inspection updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inspection $inspection)
    {
        $inspection->delete();

        return redirect()->route('inspections.index')
            ->with('success', 'Inspection deleted successfully!');
    }
}
