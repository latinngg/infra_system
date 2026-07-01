<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PreventiveChecklistController extends Controller
{
    /**
     * Display the Preventive Maintenance Checklist form.
     */
    public function create()
    {
        return view('preventive_checklist');
    }

    /**
     * Store the submitted Preventive Maintenance Checklist.
     */
    public function store(Request $request)
    {
        // Validation
        $validated = $request->validate([
            // Sample fields
            // 'computer_name' => 'required|string|max:255',
            // 'department'    => 'required|string|max:255',
            // 'checked_by'    => 'required|string|max:255',
        ]);

        // TODO:
        // Save to database here if you already have a model.
        //
        // Example:
        // PreventiveChecklist::create($validated);

        return redirect()
            ->route('pm-checklist.form')
            ->with('success', 'Preventive Maintenance Checklist submitted successfully.');
    }
}