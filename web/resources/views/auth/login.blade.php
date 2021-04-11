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
                        {!! Form::open([ 'route' => 'login', 'method' => 'post', 'class' => 'form-horizontal mt-5', 'files' => true , 'novalidate', 'autocomplete' => 'off']) !!}
                        @csrf
                          <div class="row">
                            <div class="col-12 form-group text-left login-email {!! $errors->has('email') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::email('email', old('email'), [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Email address', 'autocomplete' => 'off', 'tabindex' => 2, 'title' => 'Your email']) !!}
                                    {!! $errors->first('email', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                            <div class="col-12 form-group text-left login-password {!! $errors->has('password') ? 'error' : '' !!}">
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

                 </div>
            </div>
        </div><!-- row -->
    </div><!-- container -->
</div>
@endsection
