<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JobRequestController extends Controller
{
    public function create(): View
    {
        return view('jobrequest');
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'employee_name' => 'required|string|max:255',
            'id_number'     => 'required|string|max:50',
            'pc_name'       => 'required|string|max:100',
            'department'    => 'required|string|max:255',
            'position'      => 'required|string|max:255',
            'date_requested'=> 'nullable|date',
            'purpose'       => 'required|string|max:255',
            'request_types' => 'required|array|min:1',
            'request_types.*' => 'string|max:100',
            'firewall_policy' => 'required|string|max:20',
            'valid_from'    => 'nullable|date',
            'valid_to'      => 'nullable|date|after_or_equal:valid_from',
            'reason'        => 'required|string',
            'prepared_by'   => 'nullable|string|max:255',
            'supervisor'    => 'nullable|string|max:255',
            'jp_manager'    => 'nullable|string|max:255',
        ]);

        // TODO: persist to the database, e.g. JobRequest::create($data);
        $ref = 'IT-' . now()->format('ymd') . '-' . str_pad((string) random_int(0, 9999), 4, '0', STR_PAD_LEFT);

        return response()->json(['ref' => $ref]);
    }
}