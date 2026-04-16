<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;

class BaseAccountController extends Controller
{
    protected function getAccountMenu(): Collection
    {
        return collect([
            'My Account' => [
                [
                    'name' => 'Dashboard',
                    'url' => route('account'),
                    'icon' => 'fa fa-dashboard',
                    'isActive' => request()->is('account') || request()->is('account/dashboard'),
                ],
                [
                    'name' => 'My Referrals',
                    'url' => route('referrals.index'),
                    'icon' => 'fa fa-users',
                    'isActive' => request()->is('account/referrals'),
                ],
                [
                    'name' => 'Withdrawals',
                    'url' => route('withdrawals.index'),
                    'icon' => 'fa fa-money-bill-wave',
                    'isActive' => request()->is('account/withdrawals'),
                ],
                [
                    'name' => 'Bank Details',
                    'url' => route('bank.edit'),
                    'icon' => 'fa fa-university',
                    'isActive' => request()->is('account/bank-details'),
                ],
                [
                    'name' => 'Profile',
                    'url' => route('account.profile'),
                    'icon' => 'fa fa-user',
                    'isActive' => request()->is('account/profile'),
                ],
            ]
        ]);
    }
}