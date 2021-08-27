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
                      <li class="cryptocurrency login_btn">
                          <a href="login.html">Login or Create Account <i class="fa fa-long-arrow-right"></i></a>
                      </li>
                      <li class="cryptocurrency">
                          <a href="index.html"><i class="fa fa-home"></i>Home</a>
                      </li>
                      <li class="cryptocurrency">
                          <a href="ad-post-details.html"><i class="fa fa-plus"></i>Add Property</a>
                      </li>
                      <li class="cryptocurrency">
                          <a href="categories.html"><i class="fa fa-building"></i>Properties for Buy</a>
                      </li>
                      <li class="cryptocurrency">
                          <a href="categories.html"><i class="fa fa-hotel"></i>Properties for Rent</a>
                      </li>
                      <li class="cryptocurrency">
                          <a href="categories.html"><i class="fa fa-users"></i>Roommate</a>
                      </li>
                      <li class="cryptocurrency">
                          <a href="categories.html"><i class="fa fa-check-circle"></i>Verified Properties</a>
                      </li>
                      <li class="cryptocurrency">
                          <a href="search-filter.html"><i class="fa fa-search"></i>Search Properties</a>
                      </li>
                      <li class="cryptocurrency">
                          <a href="#"><i class="fa fa-plus"></i>Blogs</a>
                      </li>
                      <li class="cryptocurrency">
                          <a href="about-us.html"><i class="fa fa-plus"></i>About Us</a>
                      </li>
                      <li class="cryptocurrency">
                          <a href="about-us.html"><i class="fa fa-plus"></i>Testimonials</a>
                      </li>
                      <li class="cryptocurrency">
                          <a href="sitemap.html"><i class="fa fa-share-alt"></i>Sitemap</a>
                      </li>
                      <li class="cryptocurrency">
                          <a href="contact.html"><i class="fa fa-address-card"></i>Contact Us</a>
                      </li>
                  </ul>

                  <h3 class="hotline_title">Hotline</h3>
                  <h5 class="hotline_num">01730583483</h5>
                  <h4 class="contact_via_title">Contact with us via:</h4>
                  <ul class="contact_via">
                      <li><a href="#" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a></li>
                      <li><a href="#" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="#" target="_blank" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
                      <li><a href="#" target="_blank" class="instagram"><i class="fa fa-instagram"></i></a></li>
                      <li><a href="#" target="_blank" class="youtube"><i class="fa fa-youtube"></i></a></li>
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
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              <div class="collapse navbar-collapse d-none d-lg-block" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="dropdown-nav d-none d-lg-block nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="dropdown_open fa fa-bars"></i> <i class="dropdown_close d-none fa fa-times"></i></a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Dropdown</a></li>
                            <li><a class="dropdown-item" href="#">Dropdown</a></li>
                            <li><a class="dropdown-item" href="#">Dropdown</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="filter-search.html"><i class="search_icon fa fa-search"></i></a>
                    </li>
                    <li class="search_bar">
                         <form class="example header_search" action="#">
                            <div class="search-box">
	                            <input type="text" placeholder="Search.." name="search2">
	                            <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                         </form>
                    </li>
                    <li class="nav-menu nav-item">
                        <a class="nav-link active" href="index.html">Home</a>
                    </li>
                    <li class="nav-menu nav-item">
                        <a class="nav-link" href="categories.html">Sale</a>
                    </li>
                    <li class="nav-menu nav-item">
                        <a class="nav-link" href="categories.html">Rent</a>
                    </li>
                    <li class="nav-menu nav-item">
                        <a class="nav-link" href="categories.html">Roommate</a>
                    </li>
                    <li class="nav-menu nav-item">
                        <a class="nav-link" href="{{ route('web.property') }}">Properties</a>
                    </li>
                    <li class="nav-menu nav-item">
                      @guest
                        <a class="nav-link" href="{{route('login') }}">Login</a>
                      @else
                      <a class="nav-link" href="{{route('my-account') }}">My Account</a>
                      @endguest
                    </li>
                    <li class="dropdown-nav d-block d-lg-none nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownTwo" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-bars"></i></a>
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
              <a href=" @guest {{route('login') }}  @else {{route('listings.create') }} @endguest ">Post Your Ad</a>
          </div>
    </div><!-- container-fluid  -->
</div>
