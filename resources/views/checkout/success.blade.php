@extends('layouts.master')
@section('content')
    <div class="container">
        <h1>Thank You!</h1>
        @if(session()->has('message'))
        <p>{{ session('message') }}</p>
    @endif
        <p>Your order has been placed successfully.</p>
        <p>Order ID: {{ $orderId }}</p>
        
        <div class="mt-4">
            <a href="{{ url('/') }}" class="btn btn-primary">Continue Shopping</a>
            <a href="{{ route('account.profile')}}" class="btn btn-secondary">See Order</a>
        </div>
    </div>
@endsection
