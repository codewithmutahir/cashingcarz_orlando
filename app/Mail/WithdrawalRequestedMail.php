<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\WithdrawalStatusMail;

class WithdrawalController extends Controller
{
    public function index()
    {
        $withdrawals = Withdrawal::with('user')->latest()->get();
        return view('admin.withdrawals.index', compact('withdrawals'));
    }

    public function approve($id)
    {
        $withdrawal = Withdrawal::findOrFail($id);
        $withdrawal->status = 'Approved';
        $withdrawal->save();

        // ✅ Send email to user
        Mail::to($withdrawal->user->email)->send(new WithdrawalStatusMail($withdrawal));

        return back()->with('success', 'Withdrawal approved successfully.');
    }

    public function reject($id)
    {
        $withdrawal = Withdrawal::findOrFail($id);
        $withdrawal->status = 'Rejected';
        $withdrawal->save();

        // ✅ Send email to user
        Mail::to($withdrawal->user->email)->send(new WithdrawalStatusMail($withdrawal));

        return back()->with('success', 'Withdrawal rejected.');
    }
}
