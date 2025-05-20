@extends('layouts.master')
@section('content')
    <div class="container">
        <h1>Thank You!</h1>
        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <p>Your order has been placed successfully.</p>
        <p>Order ID: {{ $orderId }}</p>
        
        <div class="mt-4">
            <a href="{{ route('shop.index') }}" class="btn btn-primary">Continue Shopping</a>
            <a href="{{ route('orders.show', ['order' => $orderId]) }}" class="btn btn-secondary">See Order</a>
        </div>
    </div>
@endsection
