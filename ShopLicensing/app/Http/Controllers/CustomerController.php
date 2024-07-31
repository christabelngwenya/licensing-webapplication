<?php

namespace App\Http\Controllers;

use App\Models\Customer;

use App\Models\Licenses;
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
   // public function searching(Request $request)
   // {
      //  $accountNumber = $request->query('account_number');
     //   $customers = Customer::where('account_number', 'LIKE', "%{$accountNumber}%")->get();
       // return response()->json($customers);
    //}

   
    public function produce_license($id)
    {
        $customer = Customer::find($id);
        return view('produce_license', compact('customer'));
    }

    public function search(Request $request)
    {
        $accountNumber = $request->query('account_number');
        $customers = Customer::where('account_number', $accountNumber)->get();
        return response()->json($customers);
    }
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'account_number' => 'required|string|max:255',
            'tin_number' => 'required|string|max:255',
            'class_type_goods' => 'required|string|max:255',
            'vending_details' => 'required|string|max:255',
            'floor_area' => 'required|string|max:255',
            'range_number' => 'required|string|max:255',
            'address_premises' => 'required|string|max:255',
            'license_name' => 'required|string|max:255',
            'trading_as' => 'required|string|max:255',
            'owner_name' => 'required|string|max:255',
        ]);

        // Find the customer by id and update the customer
        $customer = Customer::findOrFail($id);
        $customer->update($validatedData);

        // Redirect or return a response
        return redirect()->back()->with('success', 'Customer updated successfully!');
    }

   
    public function storePaymentsData(Request $request)
    {
        $validatedData = $request->validate([
            'account_number' => 'required',
            'receipt_number' => 'required|string',
            'expiring_date' => 'required|date',
            'license_fees' => 'required|numeric',
            'penalty_fees' => 'required|numeric',
            'other_fees' => 'required|numeric',
           
        ]);

        Licenses::create($validatedData);

        return redirect()->route('index.home');
    }
}
