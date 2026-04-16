@extends('admin.layouts.master') {{-- Use your admin layout --}}

@section('content')
<div class="container">
    <h2 class="my-4">Referral Submissions</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Referral Phone</th>
                <th>Referral Email</th>
                <th>Referred By</th>
                <th>Contact</th>
                <th>Car</th>
                <th>Status</th>
                <th>Submitted</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($referrals as $ref)
                <tr>
                    <td>{{ $ref->referrer_phone ?? 'N/A' }}</td>
                    <td>{{ $ref->referrer_email ?? 'N/A' }}</td>
                    <td>{{ $ref->first_name }}</td>
                    <td>{{ $ref->email }}<br>{{ $ref->phone }}</td>
                                     <td>
    {{ $ref->year_name ?? 'N/A' }}
    {{ $ref->brand_name ?? 'N/A' }}
    {{ $ref->model_name ?? 'N/A' }}
    {{ $ref->sub_model_name ?? 'N/A' }}
</td>
                                       
                    <td>
                        <form method="POST" action="{{ route('admin.referrals.updateStatus', $ref->id) }}">
                            @csrf
                            <select name="status" onchange="this.form.submit()" class="form-select">
                                @foreach(['New', 'In Contact', 'Converted', 'Not Interested'] as $status)
                                    <option value="{{ $status }}" {{ $ref->status == $status ? 'selected' : '' }}>
                                        {{ $status }}
                                    </option>
                                @endforeach
                            </select>
                        </form>
                    </td>
                    <td>{{ $ref->created_at->format('d M Y, h:i A') }}</td>
                    <td>
                        <!-- You can add edit/delete if needed -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
