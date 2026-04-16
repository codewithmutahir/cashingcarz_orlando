@extends('layouts.master')

@section('content')
<div class="container py-5">
    <div class="row mt-3">
        <!-- Sidebar -->
        <div class="col-md-3">
            <aside>
                @includeFirst([config('larapen.core.customizedViewPath') . 'account.inc.sidebar', 'account.inc.sidebar'])
            </aside>
        </div>

        <!-- Main Content -->
        <div class="col-md-9">
            <h2>Withdraw Earnings</h2>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @elseif(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <p>
                <strong>Eligible Amount:</strong> 
                ${{ $user->totalConvertedEarnings() - $user->pendingWithdrawals() }}
            </p>

            <form action="{{ route('withdrawals.store') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Request Withdrawal</button>
            </form>

            <hr>

            <h5>Withdrawal History</h5>
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Requested At</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($withdrawals as $w)
                        <tr>
                            <td>$ {{ $w->amount }}</td>
                            <td>{{ $w->status }}</td>
                            <td>{{ $w->created_at->format('d M Y, h:i A') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">No withdrawal requests found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
