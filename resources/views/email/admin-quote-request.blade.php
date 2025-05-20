<!DOCTYPE html>
<html>
<head>
    <title>New Quote Request</title>
</head>
<body>
    <h1>New Quote Request</h1>
    <p>Type: {{ $quoteRequest['type'] }}</p>
    <p>First Name: {{ $quoteRequest['first_name'] }}</p>
    <p>Last Name: {{ $quoteRequest['last_name'] }}</p>
    <p>Business Name: {{ $quoteRequest['business_name'] }}</p>
    <p>Phone Number: {{ $quoteRequest['phone_number'] }}</p>
    <p>Email: {{ $quoteRequest['email'] }}</p>
    <p>Quote Details: {{ $quoteRequest['quote_details'] }}</p>
</body>
</html>
