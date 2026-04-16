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
            <h2>Bank Details</h2>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('bank.update') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Bank Name</label>
                    <input type="text" name="bank_name" class="form-control"
                           value="{{ old('bank_name', $user->bank_name) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Account Title</label>
                    <input type="text" name="account_title" class="form-control"
                           value="{{ old('account_title', $user->account_title) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Account Number</label>
                    <input type="text" name="account_number" class="form-control"
                           value="{{ old('account_number', $user->account_number) }}">
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
