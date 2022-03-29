@extends('layouts.app')

@push('custom_css')
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/forms/validation/form-validation.css')}}"> --}}
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css"/>
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />

    <style>
        .iti {display: block !important;}
    </style>
@endpush

@section('content')
    <div class="signup-sec">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                    <div class="sign-wrap">
                        <h1>Create Your BDFlats.com Account</h1>
                        {!! Form::open([ 'route' => 'seeker_register_submit', 'method' => 'post', 'class' => 'registerForm', 'files' => true , 'novalidate', 'autocomplete' => 'off']) !!}
                            {{-- <div class="account-info">
                                <h5>I am:</h5>
                                <input type="radio" name="usertype" value="1" id="seeker" checked> <label for="seeker">Seeker</label>
                                <input type="radio" name="usertype" value="2" id="owner" checked> <label for="owner">Owner</label>
                                <input type="radio" name="usertype" value="3" id="builder"> <label for="builder">Builder</label>
                                <input type="radio" name="usertype" value="4" id="agency"> <label for="agency">Agency</label>
                            </div> --}}
                            <div class="row">
                                <div class="col-12 form-group regi-name {!! $errors->has('name') ? 'error' : '' !!}">
                                    <div class="controls">
                                        {!! Form::text('name', old('name'), [ 'class' => 'form-control', 'autocomplete' => 'off', 'tabindex' => 1, 'title' => 'Your name', 'id' => 'regi-name']) !!}
                                        {!! $errors->first('name', '<label class="help-block text-danger">:message</label>') !!}
                                    </div>
                                </div>
                                <div class="col-12 form-group regi-mobile {!! $errors->has('mobile') ? 'error' : '' !!}">
                                    <div class="controls">
                                        {!! Form::tel('mobile', old('mobile'), [ 'class' => 'form-control', 'id' => 'phone', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Your number', 'autocomplete' => 'off', 'tabindex' => 2, 'title' => 'Your number, It will be verify by OTP']) !!}
                                        {!! $errors->first('mobile', '<label class="help-block text-danger">:message</label>') !!}
                                    </div>
                                </div>

                                <div class="col-12 form-group regi-email {!! $errors->has('email') ? 'error' : '' !!}">
                                    <div class="controls">
                                        {!! Form::email('email', old('email'), [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Email address (optional)', 'autocomplete' => 'off', 'tabindex' => 2, 'title' => 'Your email']) !!}
                                        {!! $errors->first('email', '<label class="help-block text-danger">:message</label>') !!}
                                    </div>
                                </div>

                                {{-- <div class="mb-3">
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <input type="tel" name="phone" id="phone" class="form-control">
                                            <div class="input-group-append">
                                                <button id="add_phone" class="input-group-text btn-primary add_phone" style="display: block">Send</button>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="verification_status" id="verification_status" value="0">
                                    <input type="hidden" name="vaccine_recipient_phone" id="recipient_phone" class="form-control" value="{{ old('vaccine_recipient_phone') }}" autocomplete>
                                    <span id="otp_time_left" class="verify">@lang('web.minutes_left')</span>
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <input type="text" name="otp" id="otp" placeholder="Enter otp" class="form-control verify">
                                            <div class="input-group-append">
                                                <button id="verify_button" class="btn-primary verify input-group-text" style="display: block">@lang('web.verify')</button>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="col-12 form-group regi-password {!! $errors->has('password') ? 'error' : '' !!}">
                                    <div class="controls">
                                        {!! Form::password('password', [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Type password', 'minlength' => '6', 'data-validation-minlength-message' => 'Minimum 6 characters', 'autocomplete' => 'off', 'tabindex' => 2, 'title' => 'Type Password']) !!}
                                        {!! $errors->first('password', '<label class="help-block text-danger">:message</label>') !!}
                                    </div>
                                </div>
                                <div class="col-12 form-group text-center pb-4">
                                    <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
                                </div>
                            </div>
                        {!! Form::close() !!}

                        <div class="login-account text-center">
                            <h3>Have an Account on BDF.com?</h3>
                            <h5>Login in your account.</h5>
                            <a href="{{route('login')}}?as=seeker">Login Now</a>
                        </div>

                    </div>
                </div>
            </div><!-- row -->
        </div><!-- container -->
    </div>
@endsection






    @push('custom_js')
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>

    <script>
    $(document).ready(function() {

    $('.registerForm').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
                name: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The username is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The username must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_]+$/,
                        message: 'The username can only consist of alphabetical, number and underscore'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email is required and cannot be empty'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            }
        }
    });

});
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script>
        var input = document.querySelector("#phone");
        window.intlTelInput(input, {
        initialCountry: "auto",
        geoIpLookup: function(callback) {
            $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
            var countryCode = (resp && resp.country) ? resp.country : "bd";
            callback(countryCode);
            });
        },
        utilsScript: "../../build/js/utils.js?1638200991544" // just for formatting/placeholders etc
        });
    </script>

    <script>
        $(document).ready(function () {
            let makeWait = null;
            $('.verify').hide();

            $('.add_phone').click(function (e) {
                e.preventDefault();
                let pn = $('#phone').val();
                // if(pn.length > 10){
                //     $('#otp_time_left').show().text('Please enter correct phone number.');
                //     return false;
                // }
                // if(pn.length < 9){
                //     $('#otp_time_left').show().text('Please enter correct phone number.');
                //     return false;
                // }
                // $(".add_phone").html('<i class="fa fa-spinner" aria-hidden="true"></i>');

                // $.ajaxSetup({
                //         headers: {
                //             'X-CSRF-TOKEN': $('input[name="_token"]').value()
                //         }
                // });
                // $.ajaxSetup({
                //     headers: {
                //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                //     }
                // });
                $.ajax({
                    type: 'POST',
                    url: '{{ route('send-otp') }}',
                    data: {
                        phone: $('#verify_phone_number').val(),
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (res) {
                        console.log(res);
                        if (res.success) {
                            $('.add').hide();
                            $('#verify_phone_number').attr('readonly', true);
                            $('.verify').show();
                            $('#otp_time_left').css('color', 'black');
                            $('#otp_time_left').text(res.msg);
                            $(".add_phone").text('Click for resend');

                            const minutes = 1000 * 60 * 5;
                            makeWait = setTimeout(() => {
                                $('.add').show();
                                // $('#verify_phone_number').attr('readonly', true);
                                $('.verify').hide();
                            }, minutes);
                        } else {
                            $('#otp_time_left').show();
                            $('#otp_time_left').text(res.msg);
                            if(res.verification == 'verified'){
                                $('#verification_status').val(1);
                            }
                            $('#otp_time_left').css('color', 'red');
                            $(".add_phone").text('Send OTP');
                        }
                    },
                    error: function (err) {
                        $('#otp_time_left').show();
                        // $('#otp_time_left').text('Please enter correct phone number.');
                        $('#otp_time_left').css('color', 'red');
                    }
                });
            });
            $('#verify_button').click(function (e) {
                e.preventDefault();
                $('#recipient_phone').hide();

                $.ajax({
                    type: 'POST',
                    url: "{{ route('verify-otp') }}",
                    data: {
                        otp: $('#otp').val(),
                        phone_number: $('#verify_phone_number').val(),
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (res) {
                        if (res.success) {
                            clearTimeout(makeWait);
                            $('.input-group-prepend').hide();
                            $('#recipient_phone').val('+60' + $('#verify_phone_number').val());
                            $('#recipient_phone').attr('type', 'number');
                            // $('#recipient_phone').attr('disabled', 'disabled');
                            $('#verify_button').hide();
                            $('#otp').hide();
                            $('#otp_time_left').hide();
                            $('.add_phone').text('Verified');
                            $('#add_phone').removeClass('add_phone');
                            $('#verification_status').val(1);

                        } else {
                            $('#otp_time_left').show();
                            $('#otp_time_left').text('Wrong OTP given.');
                            $('#otp_time_left').css('color', 'red');
                        }
                        // console.log(res);
                    },
                    error: function (err) {
                        $('#otp_time_left').show();
                        $('#otp_time_left').text('Wrong OTP given.');
                        $('#otp_time_left').css('color', 'red');
                    }
                });
            });
        });
    </script>
 @endpush

