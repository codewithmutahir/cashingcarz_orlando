<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Withdrawal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\WithdrawalRequestedMail;
use App\Mail\WithdrawalStatusMail;

class WithdrawalController extends Controller
{
   public function index()
{
    $user = Auth::user();
    $withdrawals = $user->withdrawals()->latest()->get();

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

    return view('account.withdrawals.index', compact('withdrawals', 'user', 'accountMenu'));
}


    public function store(Request $request)
    {
        

        $user = Auth::user();
        
            if (!$user->bank_name || !$user->account_title || !$user->account_number) {
        return back()->with('error', 'Please update your bank details before requesting a withdrawal.');
    }
        $eligibleAmount = $user->totalConvertedEarnings() - $user->pendingWithdrawals();

        if ($eligibleAmount <= 0) {
            return back()->with('error', 'You have no eligible amount to withdraw.');
        }

        Withdrawal::create([
            'user_id' => $user->id,
            'amount' => $eligibleAmount,
            'status' => 'Pending',
        ]);
        
        Mail::to('siyalsiyal42@gmail.com')->send(new WithdrawalRequestedMail($withdrawal));
        Mail::to(auth()->user()->email)->send(new WithdrawalStatusMail($withdrawal));

        return redirect()->back()->with('success', 'Withdrawal request submitted successfully.');
    }
}