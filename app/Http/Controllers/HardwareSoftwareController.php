<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HardwareSoftwareController extends Controller
{
    /**
     * Display the Preventive Maintenance Datasheet form.
     */
    public function create()
    {
        return view('hardware_software');
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
            ->route('hardware-software.form')
            ->with('success', 'Hardware and Software Information submitted successfully.');
    }
}