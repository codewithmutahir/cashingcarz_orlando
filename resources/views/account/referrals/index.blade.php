@extends('layouts.master')

@php
	$authUserIsAdmin ??= false;
	$stats ??= [];
	$countThreads = data_get($stats, 'threads.all') ?? 0;
	$postsVisits = data_get($stats, 'posts.visits') ?? 0;
	$countPosts = (data_get($stats, 'posts.published') ?? 0)
		+ (data_get($stats, 'posts.archived') ?? 0)
		+ (data_get($stats, 'posts.pendingApproval') ?? 0);
	$countFavoritePosts = data_get($stats, 'posts.favourite') ?? 0;

	$fiTheme = config('larapen.core.fileinput.theme', 'bs5');
@endphp

@section('content')
<div class="container-fluid py-5">
    <div class="container">
        <div class="row mt-3">
            <!-- Sidebar -->
            <div class="col-md-3">
                <aside>
                    @includeFirst([config('larapen.core.customizedViewPath') . 'account.inc.sidebar', 'account.inc.sidebar'])
                </aside>
            </div>

            <!-- Main Content -->
            <div class="col-md-9">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white d-flex align-items-center">
                        <h3 class="mt-3">Referral Submissions</h3>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if($referrals->count())
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Referral Email</th>
                                            <th>Referral PH</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Car</th>
                                            <th>Status</th>
                                            <th>Submitted</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($referrals as $referral)
                                            <tr>
                                                <td>{{ $referral->referrer_email ?? 'N/A' }}</td>
                                                <td>{{ $referral->referrer_phone ?? 'N/A' }}</td>
                                                <td>{{ $referral->first_name ?? 'N/A' }}</td>
                                                <td>{{ $referral->email ?? 'N/A' }}</td>
                                                <td>{{ $referral->phone ?? 'N/A' }}</td>
                                                <td>
                                                    {{ $referral->year_name ?? 'N/A' }}
                                                    {{ $referral->brand_name ?? 'N/A' }}
                                                    {{ $referral->model_name ?? 'N/A' }}
                                                    {{ $referral->sub_model_name ?? 'N/A' }}
                                                </td>
                                                <td><span class="badge bg-info text-dark">{{ $referral->status ?? 'N/A' }}</span></td>
                                                <td>{{ optional($referral->created_at)->format('d M Y, h:i A') ?? 'N/A' }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="text-muted">No referrals submitted yet.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('after_scripts')
@endsection
