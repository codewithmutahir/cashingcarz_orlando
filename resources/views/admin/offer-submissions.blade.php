@extends('admin.layouts.master') {{-- your admin layout --}}

@section('content')
<div class="container mt-4">
    <h2>Offer Submissions</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Post Title</th>
                <th>Customer Name</th>
                <th>Email</th>
                <th>Offer Price</th>
                <th>Reference Number</th>
                <th>Submitted At</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($submissions as $submission)
                <tr>
                    <td>{{ $submission->id }}</td>
                    <td>{{ $submission->post->title ?? 'N/A' }}</td>
                    <td>{{ $submission->customer->name ?? 'N/A' }}</td>
                    <td>{{ $submission->email }}</td>
                    <td>${{ number_format($submission->offer_price, 2) }}</td>
                    <td>{{ $submission->reference_number }}</td>
                    <td>{{ $submission->created_at->format('d M Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">No submissions found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $submissions->links() }} {{-- Pagination --}}
</div>
@endsection
