@extends('admin.layouts.master')

@section('content')
<div class="container py-5">
    <h2>Withdrawal Requests</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>User</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Requested At</th>
                <th>Bank Info</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($withdrawals as $w)
                <tr>
                    <td>{{ $w->user->name ?? 'N/A' }}<br><small>{{ $w->user->email }}</small></td>
                    <td>${{ $w->amount }}</td>
                    <td><span class="badge bg-info">{{ $w->status }}</span></td>
                    <td>{{ $w->created_at->format('d M Y, h:i A') }}</td>
                    <td>
                        <strong>Bank:</strong> {{ $w->user->bank_name }}<br>
                        <strong>Acc:</strong> {{ $w->user->account_number }}<br>
                        <strong>Name:</strong> {{ $w->user->account_title }}
                    </td>
                    <td>
                        @if($w->status == 'Pending')
                            <form method="POST" action="{{ route('admin.withdrawals.approve', $w->id) }}" class="d-inline">
                                @csrf
                                <button class="btn btn-success btn-sm">Approve</button>
                            </form>
                            <form method="POST" action="{{ route('admin.withdrawals.reject', $w->id) }}" class="d-inline ms-2">
                                @csrf
                                <button class="btn btn-danger btn-sm">Reject</button>
                            </form>
                        @else
                            <span class="text-muted">No action</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr><td colspan="6">No withdrawals yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
