@extends('layouts.app')

@push('custom_css')
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/forms/validation/form-validation.css')}}">
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
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
                        {!! Form::open([ 'route' => 'register', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate', 'autocomplete' => 'off']) !!}
                            <div class="account-info">
                                <h5>I am:</h5>
                                {{-- <input type="radio" name="usertype" value="1" id="seeker" checked> <label for="seeker">Seeker</label> --}}
                                <input type="radio" name="usertype" value="2" id="owner" checked> <label for="owner">Individual</label>
                                <input type="radio" name="usertype" value="3" id="builder"> <label for="builder">Company</label>
                                <input type="radio" name="usertype" value="4" id="agency"> <label for="agency">Agency</label>
                            </div>
                            <div class="row">
                                <div class="col-12 form-group regi-name {!! $errors->has('name') ? 'error' : '' !!}">
                                    <div class="controls">
                                        <label for="phone" class="control-label">Name:</label>
                                        {!! Form::text('name', old('name'), [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Name','minlength' => '2', 'data-validation-minlength-message' => 'Minimum 2 characters', 'maxlength' => '50',  'data-validation-maxlength-message' => 'Maximum 50 characters', 'autocomplete' => 'off', 'tabindex' => 1, 'title' => 'Your name', 'id' => 'regi-name']) !!}
                                        {!! $errors->first('name', '<label class="help-block text-danger">:message</label>') !!}
                                    </div>
                                </div>
                                <div class="col-12 form-group d-none regi-contact_name {!! $errors->has('contact_name') ? 'error' : '' !!}">
                                    <div class="controls">
                                        <label for="phone" class="control-label">Contact name:</label>
                                        {!! Form::text('contact_name', old('contact_name'), [ 'class' => 'form-control','placeholder' => 'Contact person name', 'autocomplete' => 'off', 'tabindex' => 2, 'title' => 'Contact person name' ]) !!}
                                        {!! $errors->first('contact_name', '<label class="help-block text-danger">:message</label>') !!}
                                    </div>
                                </div>
                                <div class="col-12 form-group d-none regi-designation {!! $errors->has('designation') ? 'error' : '' !!}">
                                    <div class="controls">
                                        <label for="phone" class="control-label">Designation:</label>
                                        {!! Form::text('designation', old('designation'), [ 'class' => 'form-control', 'placeholder' => 'Designation', 'autocomplete' => 'off', 'tabindex' => 2, 'title' => 'Designation' ]) !!}
                                        {!! $errors->first('designation', '<label class="help-block text-danger">:message</label>') !!}
                                    </div>
                                </div>
                                <div class="col-12 form-group d-none regi-office_address {!! $errors->has('office_address') ? 'error' : '' !!}">
                                    <div class="controls">
                                        <label for="phone" class="control-label">Phone:</label>
                                        {!! Form::text('office_address', old('office_address'), [ 'class' => 'form-control', 'placeholder' => 'Office address', 'autocomplete' => 'off', 'tabindex' => 2, 'title' => 'Office address' ]) !!}
                                        {!! $errors->first('office_address', '<label class="help-block text-danger">:message</label>') !!}
                                    </div>
                                </div>
                                <div class="col-12 form-group regi-email {!! $errors->has('email') ? 'error' : '' !!}">
                                    <div class="controls">
                                        <label for="phone" class="control-label">Email:</label>
                                        {!! Form::email('email', old('email'), [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Email address', 'autocomplete' => 'off', 'tabindex' => 2, 'title' => 'Your email']) !!}
                                        {!! $errors->first('email', '<label class="help-block text-danger">:message</label>') !!}
                                    </div>
                                </div>
                                <div class="col-12 form-group regi-mobile {!! $errors->has('mobile') ? 'error' : '' !!}">
                                    <div class="controls">
                                        <label for="phone" class="control-label">Mobile No:</label>
                                        {!! Form::text('mobile', old('mobile'), [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Your number', 'autocomplete' => 'off', 'tabindex' => 2, 'title' => 'Your number, It will be verify by OTP']) !!}
                                        {!! $errors->first('mobile', '<label class="help-block text-danger">:message</label>') !!}
                                    </div>
                                </div>
                                <div class="col-12 form-group regi-password {!! $errors->has('password') ? 'error' : '' !!}">
                                    <div class="controls">
                                        <label for="phone" class="control-label">Password:</label>
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
                            <a href="{{route('login')}}">Login Now</a>
                        </div>

                    </div>

                </div>
            </div><!-- row -->
        </div><!-- container -->
    </div>
@endsection

@push('custom_js')
    <script src="{{asset('/assets/js/forms/validation/jqBootstrapValidation.js')}}"></script>
    <script src="{{asset('/assets/js/forms/validation/form-validation.js')}}"></script>
    <script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
    <script>
    toastr.options.progressBar = true;
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif
    $("input[name='usertype']").click(function () {
        var usertype = $(this).val();
        if(usertype == 1){
            $('#regi-name').attr('placeholder','Name');
           $('.regi-contact_name, .regi-designation, .regi-office_address').addClass('d-none');
        }
        if(usertype == 2){
            $('#regi-name').attr('placeholder','Name');
           $('.regi-contact_name, .regi-designation, .regi-office_address').addClass('d-none');
        }
        if(usertype == 3){
            $('#regi-name').attr('placeholder','Builder name');
           $('.regi-contact_name, .regi-designation, .regi-office_address').removeClass('d-none');
        }
        if(usertype == 4){
            $('#regi-name').attr('placeholder','Agency name');
           $('.regi-contact_name, .regi-designation, .regi-office_address').removeClass('d-none');
        }
    });

    </script>

@endpush
