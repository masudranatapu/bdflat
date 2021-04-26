<div class="dashboard-wrapper">
    <div class="user-info text-center">
        <h1>Hello, <a href="{{ route('my-account') }}">{{ Auth::user()->NAME }}</a></h1>
        <h5>{{ Auth::user()->EMAIL }}</h5>
    </div>
    <div class="dashboard-nav">
        <ul>
            <li><a href="{{route('my-account')}}" class="@yield('my-account')">My Account</a></li>
            <li><a href="{{route('property-requirements')}}"  class="@yield('property-requirements')">Property Requirements</a></li>
            <li><a href="{{route('suggested-properties')}}"  class="@yield('suggested-properties')">Suggested Properties</a></li>
            <li><a href="{{route('varified-properties')}}"  class="@yield('varified-properties')">Verified Properties</a></li>
            <li><a href="{{route('contacted-properties')}}"  class="@yield('contacted-properties')">Contacted Properties</a></li>
            <li><a href="{{route('browsed-properties')}}"  class="@yield('browsed-properties')">Browsed Properties</a></li>
            <li><a href="{{route('recharge-balance')}}"  class="@yield('recharge-balance')">Recharge Balance</a></li>
            <li><a href="insufficient-balance.html">Insufficient balance</a></li>
            <li><a href="pay-now.html">Pay Now</a></li>
            <li><a href="sms-verification.html">SMS Verification</a></li>
            <li><a href="submitted.html">requirement Submitted</a></li>
            <li><a href="verified-massege.html">Verified Massege</a></li>
            <li><a href="refund.html">Refund</a></li>
            <li><a href="submission-message.html">Submission</a></li>
        </ul>
        <div class="logout-btn mt-3">
            <a class="nav-link"  href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</div>
