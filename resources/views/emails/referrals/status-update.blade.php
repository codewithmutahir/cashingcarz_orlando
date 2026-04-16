<h2>Your Referral Status Has Changed</h2>
<p><strong>Referral:</strong> {{ $referral->first_name }}</p>
<p><strong>New Status:</strong> {{ $referral->status }}</p>

@if($referral->status === 'Converted')
    <p>✅ Congratulations! Your referral has been converted and you’ll receive your reward soon.</p>

@elseif($referral->status === 'In Contact')
    <p>📞 Good news! Our team has contacted the referral you submitted. We’ll update you when there’s more progress.</p>

@elseif($referral->status === 'Not Interested')
    <p>❌ Unfortunately, the person you referred was not interested at this time. Don’t worry, feel free to refer others!</p>

@else
    <p>Status update: {{ $referral->status }}</p>
@endif
