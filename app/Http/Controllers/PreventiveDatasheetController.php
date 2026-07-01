<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PreventiveDatasheetController extends Controller
{
    /**
     * Display the Preventive Maintenance Datasheet form.
     */
    public function create()
    {
        return view('preventive_datasheet');
    }

    /**
     * Store the submitted Preventive Maintenance Datasheet.
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
        // PreventiveDatasheet::create($validated);

        return redirect()
            ->route('pm-datasheet.form')
            ->with('success', 'Preventive Maintenance Datasheet submitted successfully.');
    }
}