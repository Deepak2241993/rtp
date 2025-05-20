@extends('layouts.master')

@section('content')
{{-- <section class="section-5 pt-3 pb-3 mb-3 bg-white">
    <div class="container">
        <div class="light-front">
            <ol class="breadcrum Primary-color mb-0">
                <li class="breadcrum-item"><a class="white-text" href="#"></a></li>
                <li class="breadcrum-item">Forgot Password</li>
            </ol>
        </div>
    </div>
</section> --}}
    <section>


        <div class="user-reg">
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
            @endif
            <h2 class="user-head">Reset Password</h2>
            <form action="{{ route('front.processResetPassword') }}" method="post" id="loginForm">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-groupp">
                    <label for="password">New Password</label>
                    <input type="password" id="new_password" name="new_password" class="form-control @error('new_password') is-invalid  @enderror" value="">
                    @error('new_password')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-groupp">
                    <label for="password">Confirm Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" class="form-control @error('confirm_password') is-invalid  @enderror" value="">
                    @error('confirm_password')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btnn bgg-royal-blue" value="submit">Submit</button>

        </form>
        <div class="text-center small m-2"><a href="{{ route('account.login') }}">Click Here To Login</a></div>
        </div>


    </section>
@endsection
