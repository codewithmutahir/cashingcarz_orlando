<p>Hello {{ $withdrawal->user->name }},</p>

@if($withdrawal->status == 'Approved')
    <p>🎉 Your withdrawal request of ${{ $withdrawal->amount }} has been <strong>approved</strong>.</p>
@elseif($withdrawal->status == 'Rejected')
    <p>⚠️ Your withdrawal request of ${{ $withdrawal->amount }} has been <strong>rejected</strong>. Please contact support for details.</p>
@endif

<p>Thank you,<br>Cashing Carz Team</p>
