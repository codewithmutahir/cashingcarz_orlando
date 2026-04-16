<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BankDetailsController extends Controller
{
   public function edit()
{
    $user = Auth::user();

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

    return view('account.bank.edit', compact('user', 'accountMenu'));
}


    public function update(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'bank_name' => 'required|string|max:255',
            'account_title' => 'required|string|max:255',
            'account_number' => 'required|string|max:255',
        ]);

        $user->update([
            'bank_name' => $request->bank_name,
            'account_title' => $request->account_title,
            'account_number' => $request->account_number,
        ]);

                return redirect()->route('bank.edit')->with('success', 'Bank details updated successfully.');
    }
}
