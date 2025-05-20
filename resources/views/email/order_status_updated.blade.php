
<!DOCTYPE html>
<html>
<head>
    <title>Order Status Updated</title>
</head>
<body>
    <h1>Order Status Updated</h1>
    <p>Dear {{ $order->user->name }},</p>
    <p>Your order with ID {{ $order->id }} is {{ ucfirst($order->status) }}.</p>
    <p>Thank you for shopping with us!</p>
</body>
</html>
