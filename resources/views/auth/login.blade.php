@extends('layouts.app')
@section('content')
    <!--
     ============   login   ============
 -->
    <div class="login-sec">
        <!-- container -->
        <div class="container">
            <!-- row -->
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
                            {!! Form::open(['route' => 'login', 'method' => 'post', 'class' => 'form-horizontal mt-5', 'novalidate', 'autocomplete' => 'off']) !!}
                            <div
                                class="col-12 d-flex justify-content-center form-group text-left {!! $errors->has('phone') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::tel('phone', old('phone'), [ 'id' => 'phone', 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Phone number', 'autocomplete' => 'off', 'title' => 'Your phone number']) !!}
                                    {!! $errors->first('phone', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                            <div class="col-12 form-group">
                                @csrf
                                <input type="hidden" name="as" value="seeker">
                                <input type="submit" value="Login" class="btn">
                            </div>
                            {!! Form::close() !!}
                        @endif

                    </div>
                </div>
            </div><!-- row -->
        </div><!-- container -->
    </div>
@endsection

@push('custom_css')
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
    />
@endpush

@push('custom_js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

    <script>
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
    </script>
@endpush
