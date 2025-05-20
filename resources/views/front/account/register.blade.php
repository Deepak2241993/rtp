@extends('layouts.master')

@section('content')
    <section>
        <div class="user-reg">
            <h2 class="user-head">User Registration</h2>
            <form action="{{ route('account.processRegister') }}" name="registrationForm" method="post" id="registrationForm">
                @csrf <!-- Add CSRF Token -->

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                    <p></p>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                    <p></p>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="number" class="form-control" id="phone" name="phone">
                    <p></p>
                </div>
                <div class="form-group">
                    <label for="companyname">Company Name (Optional)</label>
                    <input type="text" class="form-control" id="companyname" name="companyname">
                    <p></p>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <p></p>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                    <p></p>
                </div>
                <div class="form-group small">
                    <a href="{{ route('front.forgotPassword') }}" class="forgot-link">Forgot Password?</a>
                </div>
                <button type="submit" class="btn bgg-royal-blue" value="Register">Register</button>
            </form>
            <div class="text-center small">Already Have An Account? <a href="{{ route('account.login') }}">Login Now</a></div>
        </div>
    </section>
@endsection

@section('javascript.js')
    <script type="text/javascript">
        $('#registrationForm').submit(function(event) {
            event.preventDefault();

            $("button[type='submit']").prop('disable',true);

            $.ajax({
                url: "{{ route('account.processRegister') }}",
                type: 'post',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    $("button[type='submit']").prop('disable',false);
                    var errors = response.errors;
                    if (!response.status) {
                        $.each(errors, function(key, value) {
                            $("#" + key).siblings("p").addClass('invalid-feedback').html(value);
                            $("#" + key).addClass('is-invalid');
                        });
                    } else {
                        window.location.href = "{{ route('account.login') }}";
                    }
                },
                error: function(JQSHR, exception) {
                    console.log("Something Went Wrong ");
                }
            });
        });
    </script>
@endsection
