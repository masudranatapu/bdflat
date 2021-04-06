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
                      <form class="mt-5" method="POST" action="{{ route('login') }}">
                        @csrf
                          <div class="row">
                              <div class="col-12 form-group">
                                   <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Your Email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                              <div class="col-12 form-group">
                                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                              <div class="col-12 form-group text-center">
                                  <!-- <input type="submit" name="submit" value="Login"> -->
                                  <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                              </div>
                          </div>
                      </form>
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
