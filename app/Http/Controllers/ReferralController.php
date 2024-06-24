<?php

namespace App\Http\Controllers;

use App\Models\Referral;
use Illuminate\Http\Request;

class ReferralController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'distributor_id' => 'required|exists:distributors,id',
            'code' => 'required|unique:referrals,code',
        ]);

        $referral = Referral::create([
            'distributor_id' => $request->distributor_id,
            'code' => $request->code,
        ]);

        return response()->json(['message' => 'Referral created successfully']);
    }

    public function verify(Request $request)
    {
        $request->validate([
            'code' => 'required|exists:referrals,code',
        ]);

        $referral = Referral::where('code', $request->code)->first();
        
        if ($referral && $referral->approved) {
            return response()->json(['message' => 'Referral code is valid']);
        } else {
            return response()->json(['message' => 'Referral code is invalid or not approved'], 400);
        }
    }
}
