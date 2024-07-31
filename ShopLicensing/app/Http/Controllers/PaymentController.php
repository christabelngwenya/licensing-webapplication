<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Licenses;

class PaymentController extends Controller
{
    public function checkOutstandingPayments(Request $request)
    {
        $accountNumber = $request->input('account_number');
        $license = Licenses::where('account_number', $accountNumber)->first();

        if ($license) {
            $outstandingBalance = ($license->license_fees + $license->penalty_fees + $license->other_fees) > 0;
            return response()->json(['outstanding_balance' => $outstandingBalance]);
        }

        return response()->json(['outstanding_balance' => false]);
    }

    public function uploadPaymentProof(Request $request)
    {
        $request->validate([
            'account_number' => 'required',
            'payment_proof' => 'nullable|file|mimes:jpg,png,pdf',
            'business_permission_proof' => 'nullable|file|mimes:jpg,png,pdf',
        ]);

        $license = Licenses::where('account_number', $request->input('account_number'))->first();
        
        if ($license) {
            if ($request->hasFile('payment_proof')) {
                $file = $request->file('payment_proof');
                $filePath = $file->store('payment_proofs');
                $license->payment_proof = $filePath;
            }

            if ($request->hasFile('business_permission_proof')) {
                $file = $request->file('business_permission_proof');
                $filePath = $file->store('business_permissions');
                $license->business_permission_proof = $filePath;
            }

            $license->save();

            return redirect()->back()->with('success', 'Proofs uploaded successfully.');
        }

        return redirect()->back()->with('error', 'Account not found.');
    }
}

