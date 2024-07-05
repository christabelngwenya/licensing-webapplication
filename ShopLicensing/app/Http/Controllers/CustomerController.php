<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{  public function storeLicenseData(Request $request)
    {
        $validatedData = $request->validate([
            'account_number' => 'required',
            'tin_number' => 'required',
            'class_type_goods' => 'required',
            'vending_details' => 'required',
            'floor_area' => 'required|numeric',
            'range_number' => 'required',
            'address_premises' => 'required',
            'license_name' => 'required',
            'trading_as' => 'required',
            'owner_name' => 'required',
        ]);

        Customer::create($validatedData);

        return redirect()->route('home')->with('success', 'Customer data saved successfully!');
    }
    public function search(Request $request)
    {
        $accountNumber = $request->query('account_number');
        $customers = Customer::where('account_number', $accountNumber)->get();

        return response()->json($customers);
    }

}
