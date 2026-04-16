<?php

namespace App\Http\Controllers;

use App\Models\Referral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewReferralAdminMail;
use Illuminate\Support\Facades\Log;
use App\Mail\ReferralSubmittedUserMail;
use App\Http\Controllers\Account\BaseAccountController;


class ReferralController extends Controller
{
   public function store(Request $request)
{
    $request->validate([
        'first_name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'required',
        'year' => 'required',
        'brand' => 'required',
        'model' => 'required',
        'sub_model' => 'required',
        'referrer_email' => 'required',
        'referrer_phone' => 'required'
    ]);

    $referral = new Referral();
    $referral->first_name = $request->first_name;
    $referral->email = $request->email;
    $referral->phone = $request->phone;
    $referral->referrer_email = $request->referrer_email;
    $referral->referrer_phone = $request->referrer_phone;
    $referral->year_name = $request->year_name;
    $referral->brand_name = $request->brand_name;
    $referral->model_name = $request->model_name;
    $referral->sub_model_name = $request->sub_model_name;

    // Save referral by logged-in user OR by referral_code (stored in session or URL)
    if (auth()->check()) {
        $referral->user_id = auth()->id(); // Logged-in user
    } elseif (session()->has('referral_code')) {
        $referrer = \App\Models\User::where('referral_code', session('referral_code'))->first();
        if ($referrer) {
            $referral->user_id = $referrer->id;
        }
    }

    $referral->status = 'New'; // Default status
    $referral->save();
    
    Mail::to('siyalsiyal42@gmail.com')->send(new NewReferralAdminMail($referral));
    Mail::to($referral->email)->send(new ReferralSubmittedUserMail($referral));

    return redirect()->back()->with('success', 'Thanks for referring! Our team will contact you soon.');
}

public function index()
{
    try {
        $referrals = \App\Models\Referral::where('user_id', auth()->id())->latest()->get();

        // Full sidebar menu
        $accountMenu = collect([
            'My Listings' => [
                [
                    'name' => 'Messenger',
                    'url' => '/account/messages',
                    'icon' => 'fa fa-envelope',
                    'isActive' => request()->is('account/messages'),
                ],
                [
                    'name' => 'Saved searches',
                    'url' => '/account/saved-searches',
                    'icon' => 'fa fa-heart',
                    'isActive' => request()->is('account/saved-searches'),
                ],
            ],
            'My Account' => [
                [
                    'name' => 'My Account',
                    'url' => '/account',
                    'icon' => 'fa fa-cog',
                    'isActive' => request()->is('account') && !request()->is('account/*'),
                ],
                [
                    'name' => 'Log Out',
                    'url' => '/logout',
                    'icon' => 'fa fa-sign-out',
                    'isActive' => false,
                ],
                [
                    'name' => 'Close account',
                    'url' => '/account/close',
                    'icon' => 'fa fa-times-circle',
                    'isActive' => request()->is('account/close'),
                ],
                [
                    'name' => 'My Referrals',
                    'url' => '/account/referrals',
                    'icon' => 'fa fa-users',
                    'isActive' => request()->is('account/referrals'),
                ],
                [
                    'name' => 'Withdrawals',
                    'url' => '/account/withdrawals',
                    'icon' => 'fa fa-money-bill-wave',
                    'isActive' => request()->is('account/withdrawals'),
                ],
                [
                    'name' => 'Bank Details',
                    'url' => '/account/bank-details',
                    'icon' => 'fa fa-university',
                    'isActive' => request()->is('account/bank-details'),
                ],
            ],
            'Admin Panel' => [
                [
                    'name' => 'Admin Panel',
                    'url' => '/admin/dashboard',
                    'icon' => 'fa fa-users-cog',
                    'isActive' => request()->is('admin*'),
                ],
            ],
        ]);

        return view('account.referrals.index', compact('referrals', 'accountMenu'));
    } catch (\Throwable $e) {
        Log::error('ReferralController@index crashed: ' . $e->getMessage(), [
            'trace' => $e->getTraceAsString()
        ]);
        abort(500, 'Something went wrong.');
    }
}


}
