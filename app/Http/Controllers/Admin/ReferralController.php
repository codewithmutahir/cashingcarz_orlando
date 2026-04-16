<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Referral;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReferralStatusChangedMail;


class ReferralController extends Controller
{
    public function index()
    {
        $referrals = Referral::with('user')->latest()->get();

        return view('admin.referrals.index', compact('referrals'));
    }

  public function updateStatus(Request $request, Referral $referral)
{
    $request->validate([
        'status' => 'required|string'
    ]);
    
    // If the new status is "Converted" and it wasn't already converted
    if ($request->status === 'Converted' && $referral->status !== 'Converted') {
        $referral->status = 'Converted';
        $referral->earning = 100; // $100
    } else {
        $referral->status = $request->status;
    }
    
    $referral->save(); // Add this line!
    
        Mail::to($referral->email)->send(new ReferralStatusChangedMail($referral));
    
    return redirect()->back()->with('success', 'Status updated successfully.');
}

}