<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssetsHandoverController extends Controller
{
    
    /**
     * Display the Asset Handover form.
     */
    public function create()
    {
        return view('assets_handover');
    }

    /**
     * Store the submitted Assets Handover Information.
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
            ->route('assets-handover.form')
            ->with('success', 'Assets Handover Information submitted successfully.');
    }
}
