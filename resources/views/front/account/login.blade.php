@extends('layouts.master')

@section('content')
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
            <h2 class="user-head">Login</h2>
            <form action="{{ route('account.authenticate') }}" method="post" id="loginForm">
                @csrf
                <div class="form-groupp">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid  @enderror" value="{{ old('email') }} ">
                    @error('email')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-groupp">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control @error('password') is-invalid  @enderror">
                    @error('password')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group small">
                    <a href="{{ route('front.forgotPassword') }}" class="forgot-link">Forgot Password?</a>
                </div>
                <button type="submit" class="btnn bgg-royal-blue" value="login">Login</button>

        </form>
        <div class="text-center small m-2">Don't Have an Account? <a href="{{ route('account.register') }}">Sign Up</a></div>
        </div>


    </section>
@endsection
