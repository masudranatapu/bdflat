@extends('layouts.app')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <div class="login-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                    <div class="login-wrap text-center">
                        <h1>Sign In & Access Your Account</h1>

                        @if(request()->query->get('as') == "owner")
                            {!! Form::open([ 'route' => 'login', 'method' => 'post', 'class' => 'form-horizontal mt-5', 'files' => true , 'novalidate', 'autocomplete' => 'off']) !!}
                            @csrf
                            <div class="row">
                                <div
                                    class="col-12 form-group text-left login-email {!! $errors->has('email') ? 'error' : '' !!}">
                                    <div class="controls">
                                        {!! Form::email('email', old('email'), [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Email address', 'autocomplete' => 'off', 'tabindex' => 2, 'title' => 'Your email']) !!}
                                        {!! $errors->first('email', '<label class="help-block text-danger">:message</label>') !!}
                                    </div>
                                </div>
                                <div
                                    class="col-12 form-group text-left login-password {!! $errors->has('password') ? 'error' : '' !!}">
                                    <div class="controls">
                                        {!! Form::password('password', [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Type password', 'minlength' => '6', 'data-validation-minlength-message' => 'Minimum 6 characters', 'autocomplete' => 'off', 'tabindex' => 2, 'title' => 'Type Password']) !!}
                                        {!! $errors->first('password', '<label class="help-block text-danger">:message</label>') !!}
                                    </div>
                                </div>

                                <div class="col-12 form-group text-center">
                                    <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                            <div class="forget-pass">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                            <div class="create-account">
                                <h3>New to BDF.com?</h3>
                                <h5>Create your FREE Account</h5>
                                <a href="{{route('register')}}">Create Account</a>
                            </div>
                        @else
                            {!! Form::open([ 'id' => 'phone_form', 'route' => 'seeker.login', 'method' => 'post', 'class' => 'form-horizontal mt-5', 'novalidate', 'autocomplete' => 'off']) !!}
                            <div
                                class="col-12 d-flex justify-content-center form-group text-left {!! $errors->has('phone') ? 'error' : '' !!}">
                                <div class="controls">
                                    <label for="phone" class="control-label">Phone No:</label>
                                    {!! Form::tel('phone', old('phone'), [ 'id' => 'phone', 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Phone number', 'autocomplete' => 'off', 'title' => 'Your phone number']) !!}
                                    {!! $errors->first('phone', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                            <div id="verification_code" class="col-12 d-flex justify-content-center form-group text-left {!! $errors->has('phone') ? 'error' : '' !!}" >
                                <div class="controls">

                                    {!! Form::tel('otp', old('otp'), [ 'id' => 'otp', 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'OTP Code', 'autocomplete' => 'off', 'title' => 'OTP Verification']) !!}
                                    {!! $errors->first('otp', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                            <div class="col-12 form-group">
                                @csrf
                                <input type="hidden" name="as" value="seeker">
                                <input type="submit" value="Send OTP" class="btn">
                            </div>

                            <p>New user? please <a href=" {{route('seeker_register')}} ">Sign up</a></p>
                            {!! Form::close() !!}

                            {{-- <form action="" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">@lang('web.vaccine_recipient_phone') <span
                                            class="text-danger">*</span> </label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">+60</span>
                                        </div>
                                        <input type="text" name="verify_phone_number" id="verify_phone_number" class="form-control">
                                        <div class="input-group-append">
                                            <button id="add_phone" class="input-group-text btn-primary add_phone" style="display: block">@lang('web.send')</button>
                                        </div>
                                    </div>
                                    <input type="hidden" name="verification_status" id="verification_status" value="0">
                                    <input type="hidden" name="vaccine_recipient_phone" id="recipient_phone" class="form-control" value="{{ old('vaccine_recipient_phone') }}" autocomplete>
                                    <span id="otp_time_left" class="verify">@lang('web.minutes_left')</span>
                                    <div class="col-sm-12">
                                        <div class="input-group mb-3">
                                            <input type="text" name="otp" id="otp" placeholder="Enter otp" class="form-control verify">
                                            <div class="input-group-append">
                                                <button id="verify_button" class="btn-primary verify input-group-text" style="display: block">@lang('web.verify')</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form> --}}
                            {{-- <form method="POST" action="{{ route('loginWithOtp') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Mobile No') }}</label>

                                    <div class="col-md-6">
                                        <input id="mobile" type="number" class="form-control" name="mobile" required autofocus>

                                    </div>
                                </div>



                                <div class="form-group row otp">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">OTP</label>

                                    <div class="col-md-6">

                                        <input id="otp" type="number" class="form-control" name="otp" >
                                    </div>
                                </div>


                                <div class="form-group row mb-0 otp">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>

                                    </div>
                                </div>
                            </form> --}}

                            {{-- <div class="form-group row send-otp">
                                <div class="col-md-8 offset-md-4">
                                    <button class="btn btn-success sendotp" >Send OTP</button>
                                </div>
                            </div> --}}
                        @endif

                    </div>
                </div>
            </div><!-- row -->
        </div><!-- container -->
    </div>

@endsection

@section('scripts')
    @push('custom_css')
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
        />
    @endpush

    @push('custom_js')
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
            const verification_code = $('#verification_code');
            verification_code.hide();
            verification_code.removeClass("d-flex");

            $(document).on('submit', '#phone_form', function (e) {
                e.preventDefault();

                getOTP();
            });

            const phoneInputField = document.querySelector("#phone");
            const phoneInput = window.intlTelInput(phoneInputField, {
                initialCountry: "auto",
                geoIpLookup: getIp,
                utilsScript:
                    "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
            });

            function getIp(callback) {
                fetch('https://ipinfo.io/json', {headers: {'Accept': 'application/json'}})
                    .then((resp) => resp.json())
                    .catch(() => {
                        return {
                            country: 'bd',
                        };
                    })
                    .then((resp) => callback(resp.country));
            }

            function getOTP() {
                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{ route('seeker.login') }}',
                    method: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        phone: $('#phone').val()
                    },
                    success: function (res) {
                        console.log(res);
                        if (res.status === false) {
                            toastr.error(res.message);
                        } else {
                            verification_code.addClass('d-flex');
                            verification_code.show();
                            toastr.success(res.message);
                        }
                    },
                    error: function (err) {
                        console.log(err);
                    }
                })
            }
        });
    </script>
    <script>
        $(document).ready(function () {
            let makeWait = null;
            $('.verify').hide();

            $('.add_phone').click(function (e) {
                e.preventDefault();
                let pn = $('#verify_phone_number').val();
                if(pn.length > 10){
                    $('#otp_time_left').show().text('Please enter correct phone number.');
                    return false;
                }
                if(pn.length < 9){
                    $('#otp_time_left').show().text('Please enter correct phone number.');
                    return false;
                }
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
    <script>
        $(document).ready(function () {
            $('.otp').hide();
        $('.sendotp').click(function (e) {
            e.preventDefault();

            sendOtp();
        });
        function sendOtp() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // alert($('#mobile').val());
            $.ajax( {
                url:'sendOtp',
                type:'post',
                data: {'MOBILE_NO': $('#mobile').val()},
                success:function(data) {
                    // alert(data);
                    if(data != 0){
                        $('.otp').show();
                        $('.send-otp').hide();
                    }else{
                        alert('Mobile No not found');
                    }
                },
                error:function () {
                    console.log('error');
                }
            });
        }
        });
    </script>
    @endpush
@endsection
