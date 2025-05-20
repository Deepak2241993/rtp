<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
</head>
<body>
    <h1>Your Order Confirmation</h1>
    <p>Thank you for your purchase!</p>
    <p>Order ID: {{ $order->id }}</p>
    <p>Total Amount: {{ $order->grand_total }}</p>
    <p>Items:</p>
    @php
    // dd($order->orderItems);
    @endphp
    @if($order->orderItems)
        <ul>
            @foreach($order->orderItems as $item)
                <li>{{ $item->name }} - {{ $item->qty }} x ${{ $item->price }}</li>
            @endforeach
        </ul>
    @else
        <p>No items found for this order.</p>
    @endif
</body>
</html>
