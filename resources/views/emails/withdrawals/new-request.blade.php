<h2>Withdrawal Request Submitted</h2>
<p>Dear {{ $user->name }},</p>
<p>Your withdrawal request has been submitted successfully.</p>

<strong>Request Details:</strong>
<ul>
    <li>Amount: ${{ $withdrawal->amount }}</li>
    <li>Status: {{ $withdrawal->status }}</li>
    <li>Date: {{ $withdrawal->created_at->format('M d, Y') }}</li>
</ul>

<p>We will review your request and update you shortly.</p>
<p>Thank you!</p>