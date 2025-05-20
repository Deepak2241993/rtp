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
            <h2 class="user-head">Forgot Password</h2>
            <form action="{{ route('front.processForgotPassword') }}" method="post" id="loginForm">
                @csrf
                <div class="form-groupp">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid  @enderror" value="{{ old('email') }} ">
                    @error('email')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btnn bgg-royal-blue" value="submit">submit</button>

        </form>
        <div class="text-center small m-2"><a href="{{ route('account.login') }}">Login</a></div>
        </div>


    </section>
@endsection
