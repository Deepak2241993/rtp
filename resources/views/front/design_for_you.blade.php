@extends('layouts.master')

@section('style.css')
<style>
    .radio-group {
        display: flex;
        align-items: center;
        gap: 15px; /* Adjust spacing between each radio button and label */
    }
    
    .radio-group input[type="radio"] {
        margin-right: 5px;
    }
    </style>
@endsection

@section('content')
<div class="container-req">
    <p>At Ready to print , we understand the importance of presenting print-ready files for a smooth printing process. Most of our clients provide us with these files, and we offer a complimentary check to ensure everything is in order before proceeding to print. If we identify any issues, we will promptly inform you to avoid any complications during production. Additionally, should you require assistance in designing from scratch, we have  skilled designers available to assist you, whether you need a basic design or a more complex project. For a separate design quote, please click on the link below, and one of our team members will be happy to provide you with the information you need. And have something like this
    </p>
    <a href="tel:0296213111">
        <img src="{{ asset('front-assets/images/design_for_you.png') }}" alt="Design for you" class="img-fluid" />
    </a>
    <!-- <img src="{{ asset('front-assets/images/design_for_you.png') }}" alt="Design for you" class="img-fluid" /> -->
@endsection

@section('javascript.js')

@endsection
