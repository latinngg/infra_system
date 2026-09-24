<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IPActivityController extends Controller
{
    /**
     * Display the IP Activity form.
     */
    public function create()
    {
        return view('ip_activity');
    }

    /**
     * Store the submitted IP Activity Information.
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
            ->route('ip-activity.form')
            ->with('success', 'IP Activity Information submitted successfully.');
    }
}