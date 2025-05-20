<!DOCTYPE html>
<html>
<head>
    <title>Thank you for your quote request</title>
</head>
<body>
    <h1>Thank you for your quote request</h1>
    <p>Dear {{ $quoteRequest['first_name'] }},</p>
    <p>We have received your quote request for {{ $quoteRequest['quote_details'] }}. Our team will get back to you soon.</p>
    <p>Thank you!</p>
</body>
</html>
