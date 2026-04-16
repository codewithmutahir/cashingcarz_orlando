<!DOCTYPE html>
<html>
<head>
    <title>Sales Request</title>
</head>
<body>
<p>Direct sales request from:</p>

<p><strong>Post link:</strong> <a href="{{ $postLink }}">{{ $postLink }}</a></p>
<p><strong>Price:</strong> {{ $price }}</p>
<p><strong>Name:</strong> {{ $name }}</p>
<p><strong>Address:</strong> {{ $address }}</p>
<p><strong>Email:</strong> <a href="mailto:{{ $email }}">{{ $email }}</a></p>
<p><strong>Phone number:</strong> {{ $phoneNumber }}</p>
<p><strong>Profile link:</strong> <a href="{{ $profileLink }}">{{ $profileLink }}</a></p>
<p><strong>Reference number:</strong> {{ $referenceNumber }}</p>
<p><strong>Pickup time:</strong> {{ $pickupTime }}</p>

<p>Thank you</p>
</body>
</html>
