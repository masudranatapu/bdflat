<?php
$active_menu = 'home';
if (request()->get('verified') == '1') {
    $active_menu = 'verified_property';
}
if (request()->segment(2) == 'rent') {
    $active_menu = 'rent';
}
if (request()->segment(2) == 'sale') {
    $active_menu = 'sale';
}
if (request()->segment(2) == 'roommate') {
    $active_menu = 'roommate';
}

?>
<!--
   ============  mobile menu  ============
-->
<header class="d-block d-lg-none mobile-menu">
    <!-- container-fluid -->
    <div class="container-fluid">
        <div class="wrapper cf">
            <nav id="main-nav">
                <h4 class="site_logo">
                    <a href="{{url('/')}}"><img src="{{ asset('assets/img/logo.png') }}" alt="logo"></a>
                </h4>

                <ul class="first-nav">
                    @guest
                        <li class="cryptocurrency login_btn">
                            <a href="{{route('login')}}">Login or Create Account <i class="fa fa-long-arrow-right"></i></a>
                        </li>
                    @endguest
                    <li class="cryptocurrency">
                        <a href="{{ route('web.home') }}"><i class="fa fa-home"></i>Home</a>
                    </li>
                    <li class="cryptocurrency">
                        <a href="{{ route('listings.create') }}"><i class="fa fa-plus"></i>Add Property</a>
                    </li>
                    <li class="cryptocurrency">
                        <a href="{{ route('web.property', ['type' => 'sale']) }}"><i class="fa fa-building"></i>Properties
                            for Buy</a>
                    </li>
                    <li class="cryptocurrency">
                        <a href="{{ route('web.property', ['type' => 'rent']) }}"><i class="fa fa-hotel"></i>Properties
                            for Rent</a>
                    </li>
                    <li class="cryptocurrency">
                        <a href="{{ route('web.property', ['type' => 'roommate']) }}"><i class="fa fa-users"></i>Roommate</a>
                    </li>
                    <li class="cryptocurrency">
                        <a href="{{ route('web.property') }}?verified=1"><i class="fa fa-check-circle"></i>Verified
                            Properties</a>
                    </li>
                    <li class="cryptocurrency">
                        <a href="{{ route('web.property') }}?verified=0"><i class="fa fa-search"></i>Search
                            Properties</a>
                    </li>
                    {{-- <li class="cryptocurrency">
                        <a href="#"><i class="fa fa-plus"></i>Blogs</a>
                    </li> --}}
                    <li class="cryptocurrency">
                        <a href="{{ route('about-us') }}"><i class="fa fa-plus"></i>About Us</a>
                    </li>
                    {{-- <li class="cryptocurrency">
                        <a href="about-us.html"><i class="fa fa-plus"></i>Testimonials</a>
                    </li> --}}
                    <li class="cryptocurrency">
                        <a href="{{ route('site-map') }}"><i class="fa fa-share-alt"></i>Sitemap</a>
                    </li>
                    <li class="cryptocurrency">
                        <a href="{{ route('contact-us') }}"><i class="fa fa-address-card"></i>Contact Us</a>
                    </li>
                </ul>

                @auth
                    <ul class="first-nav">
                        <li class="cryptocurrency">
                            <span><i class="fa fa-user"></i>Account</span>
                            @if(Auth::user()->USER_TYPE == 1)
                                <ul>
                                    <li><a href="{{route('my-account')}}" class="@yield('my-account')">My
                                            Account</a></li>
                                    <li><a href="{{route('property-requirements')}}"
                                           class="@yield('property-requirements')">Property Requirements</a>
                                    </li>
                                    <li><a href="{{route('suggested-properties')}}"
                                           class="@yield('suggested-properties')">Suggested Properties</a>
                                    </li>
                                    <li><a href="{{route('contacted-properties')}}"
                                           class="@yield('contacted-properties')">Contacted Properties</a>
                                    </li>
                                    <li><a href="{{route('browsed-properties')}}"
                                           class="@yield('browsed-properties')">Browsed Properties</a></li>
                                    <li><a href="{{route('recharge-balance')}}"
                                           class="@yield('recharge-balance')">Recharge Balance</a></li>
                                    <li><a href="{{route('payment-history')}}"
                                           class="@yield('payment-history')">Payment History</a></li>
                                </ul>
                            @endif
                            @if(Auth::user()->USER_TYPE == 2)
                                <ul>
                                    <li><a href="{{route('my-account')}}" class="@yield('my-account')">My
                                            Account</a></li>
                                    <li><a href="{{route('buy-leads')}}" class="@yield('buy-leads')">Suggested
                                            Leads</a></li>
                                    <li><a href="{{ route('owner-listings') }}"
                                           class="@yield('owner-listings')">My Properties</a></li>
                                    <li><a href="{{ route('owner-leads') }}" class="@yield('owner-leads')">Leads</a>
                                    </li>
                                    <li><a href="{{route('recharge-balance')}}"
                                           class="@yield('recharge-balance')">Recharge Balance</a></li>
                                    <li><a href="{{route('payment-history')}}"
                                           class="@yield('payment-history')">Payment History</a></li>
                                </ul>
                            @endif
                            @if(Auth::user()->USER_TYPE == 3)
                                <ul>
                                    <li><a href="{{route('my-account')}}" class="@yield('my-account')">Dashboard</a>
                                    </li>
                                    <li><a href="{{ route('developer-listings') }}"
                                           class="@yield('developer-listings')">Properties</a></li>
                                    <li><a href="{{ route('developer-leads') }}"
                                           class="@yield('developer-leads')">Leads</a></li>
                                    <li><a href="{{ route('developer-buy-leads') }}"
                                           class="@yield('developer-buy-leads')">Suggested Leads</a></li>
                                    <li><a href="{{route('recharge-balance')}}"
                                           class="@yield('recharge-balance')">Recharge Balance</a></li>
                                    <li><a href="{{ route('developer-payments') }}"
                                           class="@yield('developer-payments')">Payments</a></li>
                                </ul>
                            @endif
                            @if(Auth::user()->USER_TYPE == 4)
                                <ul>
                                    <li><a href="{{route('my-account')}}" class="@yield('my-account')">Dashboard</a>
                                    </li>
                                    <li><a href="{{ route('agency-listings') }}"
                                           class="@yield('agency-listings')">Properties</a></li>
                                    <li><a href="{{ route('agency-leads') }}"
                                           class="@yield('agency-leads')">Leads</a></li>
                                    <li><a href="{{ route('agency-buy-leads') }}"
                                           class="@yield('agency-buy-leads')">Suggested Leads</a></li>
                                    <li><a href="{{route('recharge-balance')}}"
                                           class="@yield('recharge-balance')">Recharge Balance</a></li>
                                    <li><a href="{{ route('agency-payments') }}"
                                           class="@yield('agency-payments')">Payments</a></li>
                                </ul>
                            @endif
                            @if(Auth::user()->USER_TYPE == 5)
                                <ul>
                                    <li><a href="{{route('my-account')}}" class="@yield('my-account')">Dashboard</a>
                                    </li>
                                    <li><a href="{{ route('agent-listings') }}"
                                           class="@yield('agent-listings')">Properties</a></li>
                                    <li><a href="{{ route('agent-leads') }}" class="@yield('agent-leads')">Leads</a>
                                    </li>
                                    <li><a href="{{ route('agent-buy-leads') }}" class="@yield('agent-buy-leads')">Suggested
                                            Leads</a></li>
                                    <li><a href="{{ route('agent-payments') }}"
                                           class="@yield('agent-payments')">Payments</a></li>
                                    <li><a href="{{ route('agent-earnings') }}"
                                           class="@yield('agent-earnings')">Earnings</a></li>
                                </ul>
                            @endif
                        </li>
                    </ul>
                @endauth
                <h3 class="hotline_title">Hotline</h3>
                <h5 class="hotline_num"><a href="tel:{{ setting()->PHONE_1 ?? '' }}">{{ setting()->PHONE_1 ?? '' }}</a>
                </h5>
                <h4 class="contact_via_title">Contact with us via:</h4>
                <ul class="contact_via">
                    <li><a href="{{ setting()->FACEBOOK_URL ?? '' }}" target="_blank" class="facebook"><i
                                class="fa fa-facebook"></i></a></li>
                    <li><a href="{{ setting()->TWITTER_URL ?? '' }}" target="_blank" class="twitter"><i
                                class="fa fa-twitter"></i></a></li>
                    <li><a href="{{ setting()->PINTEREST_URL ?? '' }}" target="_blank" class="pinterest"><i
                                class="fa fa-pinterest"></i></a></li>
                    <li><a href="{{ setting()->INSTAGRAM_URL ?? '' }}" target="_blank" class="instagram"><i
                                class="fa fa-instagram"></i></a></li>
                    <li><a href="{{ setting()->YOUTUBE_URL ?? '' }}" target="_blank" class="youtube"><i
                                class="fa fa-youtube"></i></a></li>
                </ul>

            </nav>
            <a class="toggle" href="#">
                <span></span>
            </a>
        </div>
    </div><!-- container-fluid -->
</header>

<!--
   ============   menu  ============
 -->
<div id="header" class="home-menu">
    <!-- container-fluid -->
    <div class="container-fluid">
        <!-- nav -->
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="{{url('/')}}">
                <img src="{{ asset('assets/img/logo.png') }}" class="d-none d-md-block" alt="logo">
                <img src="{{ asset('assets/img/logo2.png') }}" class="d-block d-md-none" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-none d-lg-block" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="dropdown-nav d-none d-lg-block nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false"><i class="dropdown_open fa fa-bars"></i> <i
                                class="dropdown_close d-none fa fa-times"></i></a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Coming Soon...</a></li>
                        </ul>
                    </li>
                    <!-- <li>
                        <a href="filter-search.html"><i class="search_icon fa fa-search"></i></a>
                    </li> -->
                    <li class="search_bar">
                        <form class="example header_search" action="{{ route('web.property') }}" method="get">
                            <div class="search-box">
                                <input type="text" placeholder="Search.." value="{{ request()->query('search') }}"
                                       name="search">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </li>
                    <li class="nav-menu nav-item">
                        <a class="nav-link {{ $active_menu == 'home' ? 'active' : ''  }}"
                           href="{{ route('web.home') }}">Home</a>
                    </li>
                    <li class="nav-menu nav-item">
                        <a class="nav-link {{ $active_menu == 'sale' ? 'active' : ''  }}"
                           href="{{ route('web.property', ['type' => 'sale']) }}">Sale</a>
                    </li>
                    <li class="nav-menu nav-item">
                        <a class="nav-link {{ $active_menu == 'rent' ? 'active' : ''  }}"
                           href="{{ route('web.property', ['type' => 'rent']) }}">Rent</a>
                    </li>
                    <li class="nav-menu nav-item">
                        <a class="nav-link {{ $active_menu == 'roommate' ? 'active' : ''  }}"
                           href="{{ route('web.property', ['type' => 'roommate']) }}">Roommate</a>
                    </li>
                    <li class="nav-menu nav-item">
                        <a class="nav-link {{ $active_menu == 'verified_property' ? 'active' : ''  }}"
                           href="{{ route('web.property') }}?verified=1">Verified properties</a>
                    </li>
                    <li class="nav-menu nav-item dropdown">
                        @guest
                            <a class="nav-link dropdown-toggle" href="{{ route('login') }}" id="navbarDropdown"
                               role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Login
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <!-- <a class="dropdown-item" href="{{ route('login', ['as' => 'seeker']) }}">As Seeker</a> -->
                                <a class="dropdown-item" href="{{route('seeker_register')}}">As Seeker</a>
                                <a class="dropdown-item" href="{{ route('login', ['as' => 'owner']) }}">As Owner</a>
                            </div>
                        @else
                            <a class="nav-link" href="{{route('my-account') }}">My Account</a>
                        @endguest
                    </li>
                    <li class="dropdown-nav d-block d-lg-none nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownTwo" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-bars"></i></a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownTwo">
                            <li><a class="dropdown-item" href="#">Dropdown</a></li>
                            <li><a class="dropdown-item" href="#">Dropdown</a></li>
                            <li><a class="dropdown-item" href="#">Dropdown</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav><!-- nav -->

        <!-- post add -->
        <div class="nav-btn">
            {{-- <a type="button" data-toggle="modal" data-target="#exampleModal">
                Post Your Ad
            </a> --}}
            {{-- <a href="{{route('listings.create') }}">Post Your Ad</a> --}}
            <a href="#" data-toggle="modal" data-target="#exampleModal">Post Your Ad</a>
        </div>
        <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                @if($response)
                <div class="login-wrap text-center">
                  <div class="pt-3 pb-3">
                    <p>We've sent a 4-digit one time PIN in your phone</p>
                    <strong>{{ $MOBILE_NO }}</strong>
                  </div>
                  <form class="" action="{{ route('verify-otp') }}" method="post">
                    @csrf
                    <input type="hidden" id="user_phone" name="MOBILE_NO" value="{{ $MOBILE_NO }}">
                    <div class="form-group">
                    <input class="form-control" type="text" name="otp" placeholder="Please enter 4-digit one time pin" value="{{ old('otp') }}">
                    </div>
                    <!-- <div class="btn-group" role="group" aria-label="OTP Submit"> -->
                    <button type="submit" class="btn btn-danger text-center" style="position: relative; margin-left: -198px; padding: 6px 37px;">ENTER</button>
                    <!-- <button type="submit" class="btn btn-info">REQUEST PIN AGAIN</button> -->
                   <!-- </div> -->
                  </form>
                  @php
                      $todate = date('Y-m-d');
                      $check = DB::table('OTP_VARIFICATION')->where('MOBILE', Session::get('otp_phone'))->where('OTP_DATE', $todate)->count('MOBILE');
//daily d times er besi send kora jabe na. $check && count($check)
                    if ($check > 4) {
                        
                    }
                  @endphp
                  
                  <form class="" action="{{ route('send_otp') }}" method="post">
                    @csrf
                    <input type="hidden" name="user_phone" value="{{ $MOBILE_NO }}">
                    @if($check < 5)
                            <button href="#" class="btn btn-info text-center" style="position: relative; margin-top: -62px; margin-right: -110px;" disabled> Please Wait<span id="Timer"></span> </button>
                            <button id="Timer_out" type="submit" class="btn btn-info text-center" style="position: relative; margin-top: -62px; margin-right: -199px;">REQUEST PIN AGAIN <span ></span> </button>
                        
                    @else
                        <button type="submit" class="btn btn-danger text-center" style="position: relative; margin-top: -62px; margin-right: -110px;" disabled>REQUEST NEXTDAY </button>
                    @endif
                  </form>
                  

                </div>
            @else
            <div class="sign-wrap">
                <h1>Your BDFlats.com Account</h1>
                {!! Form::open([ 'route' => 'seeker_register_submit', 'id' => 'phone_form', 'method' => 'post', 'class' => 'registerForm', 'files' => true , 'novalidate', 'autocomplete' => 'off']) !!}
                    <div class="row" id="regForm">
                        <!-- <div class="col-12 form-group regi-name {!! $errors->has('name') ? 'error' : '' !!}">
                            <div class="controls">
                                <label for="name" class="control-label">Full Name:</label>
                                {!! Form::text('name', old('name'), [ 'class' => 'form-control', 'id' => 'regi-name', 'autocomplete' => 'off', 'tabindex' => 1, 'placeholder' => 'Your name']) !!}
                                {!! $errors->first('name', '<label class="help-block text-danger">:message</label>') !!}
                            </div>
                        </div> -->
                        <div class="col-12 form-group regi-mobile {!! $errors->has('mobile') ? 'error' : '' !!}">
                            <div class="controls">
                                <label for="phone" class="control-label">Phone No:</label>
                                {!! Form::tel('mobile', old('mobile'), [ 'class' => 'form-control', 'id' => 'phone', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Your number', 'autocomplete' => 'off', 'tabindex' => 2, 'title' => 'Your number, It will be verify by OTP']) !!}
                                {!! $errors->first('mobile', '<label class="help-block text-danger">:message</label>') !!}
                                <span class="text-danger" id="mobileErrorMsg"></span>
                            </div>
                        </div>

                         <!-- <div class="col-12 form-group regi-email {!! $errors->has('email') ? 'error' : '' !!}">
                            <div class="controls">
                                <label for="email" class="control-label">Email Address:</label>
                                {!! Form::email('email', old('email'), [ 'class' => 'form-control', 'id' => 'email',  'placeholder' => 'Email address (optional)', 'autocomplete' => 'off', 'tabindex' => 2, 'title' => 'Your email']) !!}
                                {!! $errors->first('email', '<label class="help-block text-danger">:message</label>') !!}
                                <span class="text-danger" id="emailErrorMsg"></span>
                            </div>
                        </div>

                        <div class="col-12 form-group regi-password {!! $errors->has('password') ? 'error' : '' !!}">
                            <div class="controls">
                                <label for="password" class="control-label">Password:</label>
                                {!! Form::password('password', [ 'class' => 'form-control', 'id' => 'password', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Type password', 'minlength' => '6', 'data-validation-minlength-message' => 'Minimum 6 characters', 'autocomplete' => 'off', 'tabindex' => 2, 'title' => 'Type Password']) !!}
                                {!! $errors->first('password', '<label class="help-block text-danger">:message</label>') !!}
                            </div>
                        </div>  -->

                        <div class="col-12 form-group text-center pb-4">
                            <button type="submit" class="btn btn-primary">{{ __('SIGN UP / LOGIN') }}</button>
                        </div>
                    </div>
                {!! Form::close() !!}
                <form action="" method="post">
                    <div class="row" id="verification_code">
                        <div class="col-12 justify-content-center form-group text-left {!! $errors->has('phone') ? 'error' : '' !!}" >
                            <div class="controls">

                                {!! Form::tel('otp', old('otp'), [ 'id' => 'otp', 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'OTP Code', 'autocomplete' => 'off', 'title' => 'OTP Verification']) !!}
                                {!! $errors->first('otp', '<label class="help-block text-danger">:message</label>') !!}
                            </div>
                        </div>
                        <div class="row justify-content-center text-center">

                            <div class="col-6 form-group text-right pb-4">
                                <button type="submit" class="btn btn-primary">{{ __('Verified') }}</button>
                            </div>
                            <div class="col-6 form-group text-right pb-4">
                                <button type="button" class="btn btn-primary">{{ __('Resend') }}</button>
                            </div>
                        </div>
                    </div>
                </form>

                {{-- <div class="login-account text-center">
                    <h3>Have an Account on BDF.com?</h3>
                    <h5>Login in your account.</h5>
                    <a href="{{route('login')}}?as=seeker">Login Now</a>
                </div> --}}

            </div>
            @endif
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Send Otp</button>
            </div>
        </div>
    </div>
    </div>
    </div><!-- container-fluid  -->
</div>
