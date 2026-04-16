<!DOCTYPE html>
<html>
<head>
    <title>Order Processing</title>
</head>
<body>
<p>Dear {{ $name }},</p>

<p>Your vehicle has been approved for sale. The order is under processing.</p>

<p>Your Post ID: {{ $postId }}</p>

<p>If you have already sold the car, please inform us and delete the post.</p>

<p>Post delete link: <a href="{{ $deleteLink }}">Delete Post</a> or Call / Email.</p>

<p>Otherwise, we confirm the receipt of your order, and the buyer will contact you shortly.</p>

<p>For immediate assistance, please call us at (469) 383-8321.</p>

<p>Best regards,</p>

<p>The Cashing Carz Team</p>
<p><a href="https://www.cashingcarz.com">www.cashingcarz.com</a></p>
</body>
</html>
