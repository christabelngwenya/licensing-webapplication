<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Licenses;

class LicensesController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'account_number' => 'required|string',
            'tin_number' => 'required|string',
            'receipt_number' => 'nullable|string',
            'floor_area' => 'nullable|string',
            'range' => 'nullable|string',
            'expiring_date' => 'required|date',
            'license_fees' => 'nullable|numeric',
            'penalty_fees' => 'nullable|numeric',
            'other_fees' => 'nullable|numeric',
            'name_of_license' => 'required|string',
        
            ,
        ]);

        // Create a new License instance
        $license = Licenses::create($validatedData);

        // Optionally, you can redirect or return a response here
        return redirect()->back()->with('success', 'License details saved successfully!');
    }
}
