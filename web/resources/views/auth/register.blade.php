@extends('layouts.app')
@section('content')
<!-- 
     ============   sign up   ============
 -->
<div class="signup-sec">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                 <div class="sign-wrap">
                      <h1>Create Your BDFlats.com Account</h1>
                      <form method="POST" action="{{ route('register') }}">
                        @csrf
                      <div class="account-info">
                          <h5>I am:</h5>
                                <input type="radio" name="usertype" value="seeker" id="seeker"> <label for="seeker">Seeker</label>
                                <input type="radio" name="usertype" value="owner" id="owner"> <label for="owner">Owner</label> 
                                <input type="radio" name="usertype" value="builder" id="builder"> <label for="builder">Builder</label> 
                                <input type="radio" name="usertype" value="agency" id="agency"> <label for="agency">Agency</label> 
                       </div>
                          <div class="row">
                            <div class="col-12 form-group">
                                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Name"  required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                              <div class="col-12 form-group">
                                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Your Email" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                              <div class="col-12 form-group">
                                  <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile Number" required="">
                              </div>
                              <div class="col-12 form-group">
                                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Type Password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                              <div class="col-12 form-group">
                                 <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" value="{{ old('password_confirmation') }}" name="password_confirmation" required autocomplete="new-password">
                              </div>
                              <div class="col-12 form-group">
                                  <input type="text" name="person_name" id="person_name" class="form-control" placeholder="Contact Person Name" value="{{ old('person_name') }}" required="">
                              </div>
                              <div class="col-12 form-group">
                                  <input type="text" name="designation" value="{{ old('designation') }}" id="designation" class="form-control" placeholder="Designation" required="">
                              </div>
                              <div class="col-12 form-group">
                                  <input type="text" name="office_address" value="{{ old('office_address') }}" id="office_address" class="form-control" placeholder="Office Address" required="">
                              </div>
                              
                               <div class="col-12 form-group text-center pb-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                              </div>
                          </div>
                      </form>

                      <!-- login account -->
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
