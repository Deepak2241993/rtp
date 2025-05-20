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
    <h2>Request a Quote</h2>
    <br>
    <p>Whatever your business printing needs, your local Ready To Print can provide a range of solutions. Simply complete the form below and we will get in touch as soon as possible to discuss your print requirements.</p>

    <!-- Success Message -->
    <div id="success-message" class="alert alert-success" style="display:none;">
    </div>

    <!-- Error Message -->
    <div id="error-message" class="alert alert-danger" style="display:none;">
    </div>

    <form action="#" method="post" id="loginForm">
        @csrf
        <div class="radio-group">
            <input type="radio" name="requestName" id="personal" value="personal" required>
            <label for="personal"><strong>Personal</strong></label>
            <input type="radio" name="requestName" id="business" value="business">
            <label for="business"><strong>Business</strong></label>
        </div>
        <input class="input-form" type="text" name="firstname" placeholder="First Name" required>
        <input class="input-form" type="text" name="lastname" placeholder="Last Name" required>
        <input class="input-form" type="text" name="businessname" placeholder="Business Name" required>
        <input class="input-form" type="tel" name="phonenumber" placeholder="Phone Number" required>
        <input class="input-form" type="email" name="email" placeholder="Email" required>
        <br>
        <label for="formBuilder-245887" class="fb-v2-label Top required">Quote Details – E.g. the product(s) you require, including quantity, due date, and any known printing specifications</label>
        <div>
            <textarea name="formBuilder[245588]" id="formBuilder-245588" rows="8" cols="40" elementtype="3" class="medium longInput textareaa" spellcheck="false"></textarea>
            <p>Not sure about the specifics? No problem. We're here to assist and can discuss the details with you when we reach out. Your satisfaction is our priority.</p>
        </div>
        <br>
        <label for="formBuilder-245887" class="fb-v2-label Top required">Have a Specific Artwork File?</label>
        <div class="qq-upload-button qq-upload-button-hover" style="position: relative; overflow: hidden; direction: ltr;">
            Upload a file
            <input id="file-input" multiple="multiple" type="file" name="file" style="position: absolute; right: 0px; top: 0px; z-index: 1; font-size: 460px; margin: 0px; padding: 0px; cursor: pointer; opacity: 0;">
        </div>
        <br>
        <span id="file-name" style="display:none;"></span>
        
        <br><br>
        <div>
            <button class="sub" type="submit" id="elementSubmit15516">
                Submit
                <span id="loading-spinner" class="spinner-border spinner-border-sm" style="display:none;"></span>
            </button>
        </div>
    </form>
</div>
@endsection

@section('javascript.js')

<script>
    $(document).ready(function () {
         // Handle file input change
         $('#file-input').on('change', function () {
            var files = $(this).prop('files');
            if (files.length > 0) {
                $('#file-name').text(files[0].name).show();
            } else {
                $('#file-name').hide();
            }
        });
        $('#loginForm').on('submit', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append('_token', '{{ csrf_token() }}');

            // Show loading spinner and disable the submit button
            $('#elementSubmit15516').prop('disabled', true);
            $('#loading-spinner').show();

            $.ajax({
                type: 'POST',
                url: '{{ route('quote.request.store') }}',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    $('#success-message').text(response.success).show();
                    $('#error-message').hide();
                    $('#loginForm')[0].reset();

                    // Hide loading spinner and enable the submit button
                    $('#elementSubmit15516').prop('disabled', false);
                    $('#loading-spinner').hide();
                },
                error: function (response) {
                    console.log(response);
                    $('#error-message').text('There was an error submitting the form.').show();
                    $('#success-message').hide();

                    // Hide loading spinner and enable the submit button
                    $('#elementSubmit15516').prop('disabled', false);
                    $('#loading-spinner').hide();
                }
            });
        });
    });
</script>
@endsection
