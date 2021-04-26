<div class="dashboard-wrapper">
    <div class="user-info text-center">
        <h1>Hello, <a href="{{ route('my-account') }}">{{ Auth::user()->NAME }}</a></h1>
        <h5>{{ Auth::user()->EMAIL }}</h5>
    </div>
    <div class="dashboard-nav">
        <ul>
            <li><a href="{{route('my-account')}}" class="@yield('my-account')">My Account</a></li>
            <li><a href="{{ route('owner-properties') }}"  class="@yield('owner-properties')">My Propertices</a></li>
            <li><a href="{{ route('owner-leads') }}" class="@yield('owner-leads')">Leads</a></li>
        </ul>
        <div class="logout-btn mt-3">
            <a class="nav-link"  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
        </div>
    </div>
</div>
