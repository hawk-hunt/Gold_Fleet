<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $issues = Issue::paginate(15);
        return view('issues.index', compact('issues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('issues.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'issue_type' => 'required|string|max:255',
            'severity' => 'required|in:critical,high,low',
            'description' => 'required|string',
            'reported_date' => 'required|date',
            'status' => 'required|in:open,in_progress,resolved',
            'resolution_notes' => 'nullable|string',
        ]);

        Issue::create($validated);

        return redirect()->route('issues.index')
            ->with('success', 'Issue reported successfully!');
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
    public function edit(Issue $issue)
    {
        return view('issues.edit', compact('issue'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Issue $issue)
    {
        $validated = $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'issue_type' => 'required|string|max:255',
            'severity' => 'required|in:critical,high,low',
            'description' => 'required|string',
            'reported_date' => 'required|date',
            'status' => 'required|in:open,in_progress,resolved',
            'resolution_notes' => 'nullable|string',
        ]);

        $issue->update($validated);

        return redirect()->route('issues.index')
            ->with('success', 'Issue updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Issue $issue)
    {
        $issue->delete();

        return redirect()->route('issues.index')
            ->with('success', 'Issue deleted successfully!');
    }
}
