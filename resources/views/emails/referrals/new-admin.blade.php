<h2>🚗 New Referral Submitted</h2>
<p><strong>Name:</strong> {{ $referral->first_name }}</p>
<p><strong>Email:</strong> {{ $referral->email }}</p>
<p><strong>Phone:</strong> {{ $referral->phone }}</p>
<p><strong>Referrer Email:</strong> {{ $referral->referrer_email ?? 'N/A' }}</p>
<p><strong>Referrer Phone:</strong> {{ $referral->referrer_phone ?? 'N/A' }}</p>
<p><strong>Car:</strong> {{ $referral->year_name }} {{ $referral->brand_name }} {{ $referral->model_name }} {{ $referral->sub_model_name }}</p>
