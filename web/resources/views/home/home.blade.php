@extends('layouts.app')
@push('custom_css')
@endpush
@php
    $panel_path = env('PANEL_PATH');
@endphp
@section('content')
    <!--
   ============  mobile banner  ============
 -->
    <div class="banner-sec d-block d-md-none">
        <!-- container -->
        <div class="container text-center">
            <div class="banner-article">
                <h2>Welcome to bdflats</h2>
                <h5>No.1 Property Maarketplace</h5>
            </div>
        </div>
        <!-- container -->
    </div>

    <!--
       ============  mobile search box  ============
     -->
    <div class="mobile-search_bx d-block d-md-none">
        <!-- container -->
        <div class="container">
            <a href="search-filter.html">
                <button>Search cities, localities, property name & ID <i class="fa fa-search float-right"></i></button>
            </a>
        </div><!-- container -->
    </div>

    <!--
        ============  slider  ============
     -->
    <div class="slider d-none d-md-block">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
            @if(isset($data['sliders']) && count($data['sliders']))
                <ol class="carousel-indicators">
                    @foreach($data['sliders'] as $key => $slider)
                        <li data-target="#carouselExampleFade" data-slide-to="{{ $key }}"
                            class="{{ $key == 0 ? 'active' : '' }}"></li>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    @foreach($data['sliders'] as $key => $slider)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <img src="{{ $panel_path . $slider->BANNER }}" class="d-block w-100"
                                 alt="{{ $slider->TITLE }}">
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>


    <!--
        ============  category  ============
     -->
    <div class="category-sec">
        <!-- container -->
        <div class="container">
            <!-- heading -->
            <div class="category-heading text-center">
                <h1 class="d-none d-md-block">Verified Property Marketplace for Buy, Sale and Rent</h1>
                <h2 class="d-block d-md-none">Explore with Property Type</h2>
                <p class="d-none d-md-block">Sed ut perspiciatis unde omnis uste natus error sit volupteatem <br/>Accusantium
                    doloremque laudantium</p>
            </div>
            <!-- heading -->

            <!-- row -->
            <div class="row">
                <div class="d-none d-md-block col-md-2 text-center">
                    @if($data['leftAd'])
                    <div class="advertisement">
                        <a href="{{ $data['leftAd']->URL_SLUG }}"><img src="{{ $panel_path . ($data['leftAd']->images ? $data['leftAd']->images[0]->IMAGE_PATH : '') }}" alt="Images"
                                         class="img-fluid"></a>
                    </div>
                    @endif
                </div>

                <!-- product-list -->
                <div class="col-md-8">
                    <!-- categorys -->
                    <div class="section category-ad text-center">
                        <ul class="category-list">
                            @if(isset($data['categories']) && count($data['categories']))
                                <div class="row">
                                    @foreach($data['categories'] as $category)
                                        <div class="col-6 col-sm-3">
                                            <!-- category-item -->
                                            <li class="category-item">
                                                <a href="#{{ $category->URL_SLUG }}">
                                                    <div class="category-icon"><img
                                                            src="{{ $panel_path . $category->ICON_PATH }}"
                                                            alt="" class="img-fluid"></div>
                                                    <span class="category-title">{{ $category->PROPERTY_TYPE }}</span>
                                                    <span
                                                        class="category-quantity">({{ $category->TOTAL_LISTING }})</span>
                                                </a>
                                            </li>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </ul>
                    </div><!-- category-ad -->
                </div>

                    <div class="d-none d-md-block col-md-2 text-center">
                        @if($data['rightAd'])
                        <div class="advertisement">
                            <a href="#{{ $data['rightAd']->URL_SLUG }}"><img src="{{ $panel_path . ($data['rightAd']->images ? $data['rightAd']->images[0]->IMAGE_PATH : '') }}" alt="Images"
                                             class="img-fluid"></a>
                        </div>
                        @endif
                    </div>

            </div><!-- row -->
        </div><!-- container -->
    </div>

    <!--
        ============ Bottom ads ============
    -->
    @if(isset($data['bottomAd']) && $data['bottomAd'])
        <div class="ads-sec mb-4 mt-3">
            <!-- container -->
            <div class="container text-center">
                <div class="ads">
                    <a href="{{ $data['bottomAd']->URL_SLUG }}"><img
                            src="{{ $panel_path . ($data['bottomAd']->images ? $data['bottomAd']->images[0]->IMAGE_PATH : '') }}"
                            class="img-fluid" alt="image"></a>
                </div>
            </div><!-- container -->
        </div>
    @endif


    <!--
       ============  featured properties   ============
    -->
    <div class="featured-sec">
        <!-- container -->
        <div class="container">
            <div class="sec-heading">
                <h3>Featured Properties</h3>
            </div>

            <div class="featured_btn d-block d-sm-none">
                <a href="#">See All</a>
            </div>

            <!--  featured product  -->
            <div class="owl-carousel owl-theme">

                <!-- featured -->
                <div class="item">
                    <div class="featured-wrap">
                        <div class="featured-bx">
                            <a href="details.html"><img src="{{asset('assets/img/featured/1.jpg')}}" class="img-fluid"
                                                        alt="image"></a>
                        </div>
                        <div class="featured-content">
                            <div class="featured-price">
                                <h3>TK 50.00</h3>
                            </div>
                            <div class="featured-info">
                                <h2><a href="details.html">Apple MacBook Pro with Retina Display</a></h2>
                                <span>2 Bed, 3 Bath</span>
                            </div>
                            <div class="featured-footer">
                                <div class="address">
                                    <a href="#"><i class="fa fa-map-marker"></i>Mirpur, Dhaka</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- featured -->
                <div class="item">
                    <div class="featured-wrap">
                        <div class="featured-bx">
                            <a href="details.html"><img src="{{asset('assets/img/featured/2.jpg')}}" class="img-fluid"
                                                        alt="image"></a>
                        </div>
                        <div class="featured-content">
                            <div class="featured-price">
                                <h3>TK 50.00</h3>
                            </div>
                            <div class="featured-info">
                                <h2><a href="details.html">Apple MacBook Pro with Retina Display</a></h2>
                                <span>5 Katha</span>
                            </div>
                            <div class="featured-footer">
                                <div class="address">
                                    <a href="#"><i class="fa fa-map-marker"></i>Gulshan, Dhaka</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- featured -->
                <div class="item">
                    <div class="featured-wrap">
                        <div class="featured-bx">
                            <a href="details.html"><img src="{{asset('assets/img/featured/3.jpg')}}" class="img-fluid"
                                                        alt="image"></a>
                        </div>
                        <div class="featured-content">
                            <div class="featured-price">
                                <h3>TK 50.00</h3>
                            </div>
                            <div class="featured-info">
                                <h2><a href="details.html">Apple MacBook Pro with Retina Display</a></h2>
                                <span>2 Bed, 3 Bath</span>
                            </div>
                            <div class="featured-footer">
                                <div class="address">
                                    <a href="#"><i class="fa fa-map-marker"></i>Gulshan, Dhaka</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- featured -->
                <div class="item">
                    <div class="featured-wrap">
                        <div class="featured-bx">
                            <a href="details.html"><img src="{{asset('assets/img/featured/4.jpg')}}" class="img-fluid"
                                                        alt="image"></a>
                        </div>
                        <div class="featured-content">
                            <div class="featured-price">
                                <h3>TK 50.00</h3>
                            </div>
                            <div class="featured-info">
                                <h2><a href="details.html">Apple MacBook Pro with Retina Display</a></h2>
                                <span>2 Bed, 3 Bath</span>
                            </div>
                            <div class="featured-footer">
                                <div class="address">
                                    <a href="#"><i class="fa fa-map-marker"></i>Gulshan, Dhaka</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--  featured product  -->
        </div><!-- container -->
    </div>


    <!--
       ============ ads ============
     -->
    <div class="ads-sec mb-2">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row text-center">
                <div class="col-md-4 mb-4">
                    <div class="ads">
                        <a href="#"><img src="{{asset('assets/img/ads/3.jpg')}}" class="img-fluid" alt="image"></a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="ads">
                        <a href="#"><img src="{{asset('assets/img/ads/3.jpg')}}" class="img-fluid" alt="image"></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ads">
                        <a href="#"><img src="{{asset('assets/img/ads/3.jpg')}}" class="img-fluid" alt="image"></a>
                    </div>
                </div>
            </div><!-- row -->
        </div><!-- container -->
    </div>



    <!--
       ============  verified properties   ============
    -->
    <div class="verified-sec">
        <!-- container -->
        <div class="container">
            <div class="sec-heading text-center mb-4">
                <h3>Verified Properties</h3>
            </div>
            <!-- row -->
            <div class="row">
                <!-- verified product -->
                <div class="col-md-6 mb-3">
                    <div class="verified-product">
                        <div class="verified-wrap">
                            <div class="row no-gutters position-relative">
                                <div class="col-4 col-md-5">
                                    <div class="verified-bx">
                                        <a href="details.html"><img src="{{asset('assets/img/verified/5.jpg')}}"
                                                                    class="img-fluid" alt="image"></a>
                                    </div>
                                </div>
                                <div class="col-8 col-md-7 position-static">
                                    <div class="verified-price">
                                        <h3>TK 50.00</h3>
                                    </div>
                                    <div class="verified-title">
                                        <h5 class="mt-0"><a href="details.html">Apple MacBook Pro with Retina
                                                Display</a></h5>
                                        <h6>2 Bed, 3 Bath</h6>
                                    </div>
                                    <div class="verified-address">
                                        <a href="#"><i class="fa fa-map-marker"></i>Gulshan, Dhaka</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- verified product -->
                <div class="col-md-6 mb-3">
                    <div class="verified-product">
                        <div class="verified-wrap">
                            <div class="row no-gutters position-relative">
                                <div class="col-4 col-md-5">
                                    <div class="verified-bx">
                                        <a href="details.html"><img src="{{asset('assets/img/verified/6.jpg')}}"
                                                                    class="img-fluid" alt="image"></a>
                                    </div>
                                </div>
                                <div class="col-8 col-md-7 position-static">
                                    <div class="verified-price">
                                        <h3>TK 50.00</h3>
                                    </div>
                                    <div class="verified-title">
                                        <h5 class="mt-0"><a href="details.html">Apple MacBook Pro with Retina
                                                Display</a></h5>
                                        <h6>2 Bed, 3 Bath</h6>
                                    </div>
                                    <div class="verified-address">
                                        <a href="#"><i class="fa fa-map-marker"></i>Gulshan, Dhaka</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- verified product -->
                <div class="col-md-6 mb-3">
                    <div class="verified-product">
                        <div class="verified-wrap">
                            <div class="row no-gutters position-relative">
                                <div class="col-4 col-md-5">
                                    <div class="verified-bx">
                                        <a href="details.html"><img src="{{asset('assets/img/verified/7.jpg')}}"
                                                                    class="img-fluid" alt="image"></a>
                                    </div>
                                </div>
                                <div class="col-8 col-md-7 position-static">
                                    <div class="verified-price">
                                        <h3>TK 50.00</h3>
                                    </div>
                                    <div class="verified-title">
                                        <h5 class="mt-0"><a href="details.html">Apple MacBook Pro with Retina
                                                Display</a></h5>
                                        <h6>2 Bed, 3 Bath</h6>
                                    </div>
                                    <div class="verified-address">
                                        <a href="#"><i class="fa fa-map-marker"></i>Gulshan, Dhaka</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- verified product -->
                <div class="col-md-6">
                    <div class="verified-product">
                        <div class="verified-wrap">
                            <div class="row no-gutters position-relative">
                                <div class="col-4 col-md-5">
                                    <div class="verified-bx">
                                        <a href="details.html"><img src="{{asset('assets/img/verified/5.jpg')}}"
                                                                    class="img-fluid" alt="image"></a>
                                    </div>
                                </div>
                                <div class="col-8 col-md-7 position-static">
                                    <div class="verified-price">
                                        <h3>TK 50.00</h3>
                                    </div>
                                    <div class="verified-title">
                                        <h5 class="mt-0"><a href="details.html">Apple MacBook Pro with Retina
                                                Display</a></h5>
                                        <h6>2 Bed, 3 Bath</h6>
                                    </div>
                                    <div class="verified-address">
                                        <a href="#"><i class="fa fa-map-marker"></i>Gulshan, Dhaka</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- row -->
        </div><!-- container -->
    </div>

    <!--
        ============ ads ============
    -->
    <div class="ads-sec mt-2 mb-2">
        <!-- container -->
        <div class="container text-center">
            <div class="ads">
                <a href="#"><img src="{{asset('assets/img/ads/2.jpg')}}" class="img-fluid" alt="image"></a>
            </div>
        </div><!-- container -->
    </div>


    <!--
        ============ category-product  ============
    -->
    <div class="category-pro-sec">
        <!--  container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!--  For sale -->
                <div class="col-lg-4">
                    <div class="sale-heading">
                        <h3>For Sale</h3>
                    </div>
                    <div class="sale-wrapper">
                        <div class="owl-carousel">
                            <div class="item">
                                <!-- sale product -->
                                <div class="sale-product mb-3">
                                    <div class="row no-gutters position-relative">
                                        <div class="col-5">
                                            <div class="category-bx">
                                                <a href="details.html"><img src="{{asset('assets/img/sale/1.jpg')}}"
                                                                            class="img-fluid" alt="image"></a>
                                            </div>
                                        </div>
                                        <div class="col-7 position-static pl-3">
                                            <div class="category-price">
                                                <h3>TK 50.00</h3>
                                            </div>
                                            <div class="category-title">
                                                <h5 class="mt-0"><a href="details.html">Apple MacBook Pro with Retina
                                                        Display</a></h5>
                                            </div>
                                            <div class="category-address">
                                                <a href="#"><i class="fa fa-map-marker"></i>Gulshan, Dhaka</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- sale product -->
                                <div class="sale-product mb-3">
                                    <div class="row no-gutters position-relative">
                                        <div class="col-5">
                                            <div class="category-bx">
                                                <a href="details.html"><img src="{{asset('assets/img/sale/2.jpg')}}"
                                                                            class="img-fluid" alt="image"></a>
                                            </div>
                                        </div>
                                        <div class="col-7 position-static pl-3">
                                            <div class="category-price">
                                                <h3>TK 50.00</h3>
                                            </div>
                                            <div class="category-title">
                                                <h5 class="mt-0"><a href="details.html">Apple MacBook Pro with Retina
                                                        Display</a></h5>
                                            </div>
                                            <div class="category-address">
                                                <a href="#"><i class="fa fa-map-marker"></i>Gulshan, Dhaka</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- sale product -->
                                <div class="sale-product mb-3">
                                    <div class="row no-gutters position-relative">
                                        <div class="col-5">
                                            <div class="category-bx">
                                                <a href="details.html"><img src="{{asset('assets/img/sale/3.jpg')}}"
                                                                            class="img-fluid" alt="image"></a>
                                            </div>
                                        </div>
                                        <div class="col-7 position-static pl-3">
                                            <div class="category-price">
                                                <h3>TK 50.00</h3>
                                            </div>
                                            <div class="category-title">
                                                <h5 class="mt-0"><a href="details.html">Apple MacBook Pro with Retina
                                                        Display</a></h5>
                                            </div>
                                            <div class="category-address">
                                                <a href="#"><i class="fa fa-map-marker"></i>Gulshan, Dhaka</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <!-- sale product -->
                                <div class="sale-product mb-3">
                                    <div class="row no-gutters position-relative">
                                        <div class="col-5">
                                            <div class="category-bx">
                                                <a href="details.html"><img src="{{asset('assets/img/sale/4.jpg')}}"
                                                                            class="img-fluid" alt="image"></a>
                                            </div>
                                        </div>
                                        <div class="col-7 position-static pl-3">
                                            <div class="category-price">
                                                <h3>TK 50.00</h3>
                                            </div>
                                            <div class="category-title">
                                                <h5 class="mt-0"><a href="details.html">Apple MacBook Pro with Retina
                                                        Display</a></h5>
                                            </div>
                                            <div class="category-address">
                                                <a href="#"><i class="fa fa-map-marker"></i>Gulshan, Dhaka</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- sale product -->
                                <div class="sale-product mb-3">
                                    <div class="row no-gutters position-relative">
                                        <div class="col-5">
                                            <div class="category-bx">
                                                <a href="details.html"><img src="{{asset('assets/img/sale/2.jpg')}}"
                                                                            class="img-fluid" alt="image"></a>
                                            </div>
                                        </div>
                                        <div class="col-7 position-static pl-3">
                                            <div class="category-price">
                                                <h3>TK 50.00</h3>
                                            </div>
                                            <div class="category-title">
                                                <h5 class="mt-0"><a href="details.html">Apple MacBook Pro with Retina
                                                        Display</a></h5>
                                            </div>
                                            <div class="category-address">
                                                <a href="#"><i class="fa fa-map-marker"></i>Gulshan, Dhaka</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- sale product -->
                                <div class="sale-product mb-3">
                                    <div class="row no-gutters position-relative">
                                        <div class="col-5">
                                            <div class="category-bx">
                                                <a href="details.html"><img src="{{asset('assets/img/sale/3.jpg')}}"
                                                                            class="img-fluid" alt="image"></a>
                                            </div>
                                        </div>
                                        <div class="col-7 position-static pl-3">
                                            <div class="category-price">
                                                <h3>TK 50.00</h3>
                                            </div>
                                            <div class="category-title">
                                                <h5 class="mt-0"><a href="details.html">Apple MacBook Pro with Retina
                                                        Display</a></h5>
                                            </div>
                                            <div class="category-address">
                                                <a href="#"><i class="fa fa-map-marker"></i>Gulshan, Dhaka</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--  For Rent -->
                <div class="col-lg-4">
                    <div class="sale-heading">
                        <h3>For Rent</h3>
                    </div>
                    <div class="sale-wrapper">
                        <div class="owl-carousel">
                            <div class="item">
                                <!-- sale product -->
                                <div class="sale-product mb-3">
                                    <div class="row no-gutters position-relative">
                                        <div class="col-5">
                                            <div class="category-bx">
                                                <a href="details.html"><img src="{{asset('assets/img/sale/1.jpg')}}"
                                                                            class="img-fluid" alt="image"></a>
                                            </div>
                                        </div>
                                        <div class="col-7 position-static pl-3">
                                            <div class="category-price">
                                                <h3>TK 50.00</h3>
                                            </div>
                                            <div class="category-title">
                                                <h5 class="mt-0"><a href="details.html">Apple MacBook Pro with Retina
                                                        Display</a></h5>
                                            </div>
                                            <div class="category-address">
                                                <a href="#"><i class="fa fa-map-marker"></i>Gulshan, Dhaka</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- sale product -->
                                <div class="sale-product mb-3">
                                    <div class="row no-gutters position-relative">
                                        <div class="col-5">
                                            <div class="category-bx">
                                                <a href="details.html"><img src="{{asset('assets/img/sale/2.jpg')}}"
                                                                            class="img-fluid" alt="image"></a>
                                            </div>
                                        </div>
                                        <div class="col-7 position-static pl-3">
                                            <div class="category-price">
                                                <h3>TK 50.00</h3>
                                            </div>
                                            <div class="category-title">
                                                <h5 class="mt-0"><a href="details.html">Apple MacBook Pro with Retina
                                                        Display</a></h5>
                                            </div>
                                            <div class="category-address">
                                                <a href="#"><i class="fa fa-map-marker"></i>Gulshan, Dhaka</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- sale product -->
                                <div class="sale-product mb-3">
                                    <div class="row no-gutters position-relative">
                                        <div class="col-5">
                                            <div class="category-bx">
                                                <a href="details.html"><img src="{{asset('assets/img/sale/3.jpg')}}"
                                                                            class="img-fluid" alt="image"></a>
                                            </div>
                                        </div>
                                        <div class="col-7 position-static pl-3">
                                            <div class="category-price">
                                                <h3>TK 50.00</h3>
                                            </div>
                                            <div class="category-title">
                                                <h5 class="mt-0"><a href="details.html">Apple MacBook Pro with Retina
                                                        Display</a></h5>
                                            </div>
                                            <div class="category-address">
                                                <a href="#"><i class="fa fa-map-marker"></i>Gulshan, Dhaka</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <!-- sale product -->
                                <div class="sale-product mb-3">
                                    <div class="row no-gutters position-relative">
                                        <div class="col-5">
                                            <div class="category-bx">
                                                <a href="details.html"><img src="{{asset('assets/img/sale/4.jpg')}}"
                                                                            class="img-fluid" alt="image"></a>
                                            </div>
                                        </div>
                                        <div class="col-7 position-static pl-3">
                                            <div class="category-price">
                                                <h3>TK 50.00</h3>
                                            </div>
                                            <div class="category-title">
                                                <h5 class="mt-0"><a href="details.html">Apple MacBook Pro with Retina
                                                        Display</a></h5>
                                            </div>
                                            <div class="category-address">
                                                <a href="#"><i class="fa fa-map-marker"></i>Gulshan, Dhaka</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- sale product -->
                                <div class="sale-product mb-3">
                                    <div class="row no-gutters position-relative">
                                        <div class="col-5">
                                            <div class="category-bx">
                                                <a href="details.html"><img src="{{asset('assets/img/sale/2.jpg')}}"
                                                                            class="img-fluid" alt="image"></a>
                                            </div>
                                        </div>
                                        <div class="col-7 position-static pl-3">
                                            <div class="category-price">
                                                <h3>TK 50.00</h3>
                                            </div>
                                            <div class="category-title">
                                                <h5 class="mt-0"><a href="details.html">Apple MacBook Pro with Retina
                                                        Display</a></h5>
                                            </div>
                                            <div class="category-address">
                                                <a href="#"><i class="fa fa-map-marker"></i>Gulshan, Dhaka</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- sale product -->
                                <div class="sale-product mb-3">
                                    <div class="row no-gutters position-relative">
                                        <div class="col-5">
                                            <div class="category-bx">
                                                <a href="details.html"><img src="{{asset('assets/img/sale/3.jpg')}}"
                                                                            class="img-fluid" alt="image"></a>
                                            </div>
                                        </div>
                                        <div class="col-7 position-static pl-3">
                                            <div class="category-price">
                                                <h3>TK 50.00</h3>
                                            </div>
                                            <div class="category-title">
                                                <h5 class="mt-0"><a href="details.html">Apple MacBook Pro with Retina
                                                        Display</a></h5>
                                            </div>
                                            <div class="category-address">
                                                <a href="#"><i class="fa fa-map-marker"></i>Gulshan, Dhaka</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--  For Roommate -->
                <div class="col-lg-4">
                    <div class="sale-heading">
                        <h3>Roommate</h3>
                    </div>
                    <div class="sale-wrapper">
                        <div class="owl-carousel">
                            <div class="item">
                                <!-- sale product -->
                                <div class="sale-product mb-3">
                                    <div class="row no-gutters position-relative">
                                        <div class="col-5">
                                            <div class="category-bx">
                                                <a href="details.html"><img src="{{asset('assets/img/sale/1.jpg')}}"
                                                                            class="img-fluid" alt="image"></a>
                                            </div>
                                        </div>
                                        <div class="col-7 position-static pl-3">
                                            <div class="category-price">
                                                <h3>TK 50.00</h3>
                                            </div>
                                            <div class="category-title">
                                                <h5 class="mt-0"><a href="details.html">Apple MacBook Pro with Retina
                                                        Display</a></h5>
                                            </div>
                                            <div class="category-address">
                                                <a href="#"><i class="fa fa-map-marker"></i>Gulshan, Dhaka</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- sale product -->
                                <div class="sale-product mb-3">
                                    <div class="row no-gutters position-relative">
                                        <div class="col-5">
                                            <div class="category-bx">
                                                <a href="details.html"><img src="{{asset('assets/img/sale/2.jpg')}}"
                                                                            class="img-fluid" alt="image"></a>
                                            </div>
                                        </div>
                                        <div class="col-7 position-static pl-3">
                                            <div class="category-price">
                                                <h3>TK 50.00</h3>
                                            </div>
                                            <div class="category-title">
                                                <h5 class="mt-0"><a href="details.html">Apple MacBook Pro with Retina
                                                        Display</a></h5>
                                            </div>
                                            <div class="category-address">
                                                <a href="#"><i class="fa fa-map-marker"></i>Gulshan, Dhaka</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- sale product -->
                                <div class="sale-product mb-3">
                                    <div class="row no-gutters position-relative">
                                        <div class="col-5">
                                            <div class="category-bx">
                                                <a href="details.html"><img src="{{asset('assets/img/sale/3.jpg')}}"
                                                                            class="img-fluid" alt="image"></a>
                                            </div>
                                        </div>
                                        <div class="col-7 position-static pl-3">
                                            <div class="category-price">
                                                <h3>TK 50.00</h3>
                                            </div>
                                            <div class="category-title">
                                                <h5 class="mt-0"><a href="details.html">Apple MacBook Pro with Retina
                                                        Display</a></h5>
                                            </div>
                                            <div class="category-address">
                                                <a href="#"><i class="fa fa-map-marker"></i>Gulshan, Dhaka</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <!-- sale product -->
                                <div class="sale-product mb-3">
                                    <div class="row no-gutters position-relative">
                                        <div class="col-5">
                                            <div class="category-bx">
                                                <a href="details.html"><img src="{{asset('assets/img/sale/4.jpg')}}"
                                                                            class="img-fluid" alt="image"></a>
                                            </div>
                                        </div>
                                        <div class="col-7 position-static pl-3">
                                            <div class="category-price">
                                                <h3>TK 50.00</h3>
                                            </div>
                                            <div class="category-title">
                                                <h5 class="mt-0"><a href="details.html">Apple MacBook Pro with Retina
                                                        Display</a></h5>
                                            </div>
                                            <div class="category-address">
                                                <a href="#"><i class="fa fa-map-marker"></i>Gulshan, Dhaka</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- sale product -->
                                <div class="sale-product mb-3">
                                    <div class="row no-gutters position-relative">
                                        <div class="col-5">
                                            <div class="category-bx">
                                                <a href="details.html"><img src="{{asset('assets/img/sale/2.jpg')}}"
                                                                            class="img-fluid" alt="image"></a>
                                            </div>
                                        </div>
                                        <div class="col-7 position-static pl-3">
                                            <div class="category-price">
                                                <h3>TK 50.00</h3>
                                            </div>
                                            <div class="category-title">
                                                <h5 class="mt-0"><a href="details.html">Apple MacBook Pro with Retina
                                                        Display</a></h5>
                                            </div>
                                            <div class="category-address">
                                                <a href="#"><i class="fa fa-map-marker"></i>Gulshan, Dhaka</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- sale product -->
                                <div class="sale-product mb-3">
                                    <div class="row no-gutters position-relative">
                                        <div class="col-5">
                                            <div class="category-bx">
                                                <a href="details.html"><img src="{{asset('assets/img/sale/3.jpg')}}"
                                                                            class="img-fluid" alt="image"></a>
                                            </div>
                                        </div>
                                        <div class="col-7 position-static pl-3">
                                            <div class="category-price">
                                                <h3>TK 50.00</h3>
                                            </div>
                                            <div class="category-title">
                                                <h5 class="mt-0"><a href="details.html">Apple MacBook Pro with Retina
                                                        Display</a></h5>
                                            </div>
                                            <div class="category-address">
                                                <a href="#"><i class="fa fa-map-marker"></i>Gulshan, Dhaka</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- row -->
        </div><!--  container -->
    </div>

    <!--
       ============  Popular Cities  ============
    -->
    <div class="popular-cities">
        <!-- container -->
        <div class="container">
            <div class="sec-heading text-center mb-3">
                <h3>Popular Cities</h3>
            </div>
            <!-- row -->
            <div class="row">
                <!-- Dhaka Division -->
                <div class="col-6 col-md-4 col-lg-3 text-center">
                    <a href="">
                        <div class="location-article text-center">
                            <h3>200</h3>
                            <h4><i class="fa fa-map-marker"></i>Dhaka </h4>
                        </div>
                    </a>
                </div>

                <!-- Chittagong Division -->
                <div class="col-6 col-md-4 col-lg-3 text-center">
                    <a href="">
                        <div class="location-article text-center">
                            <h3>365</h3>
                            <h4><i class="fa fa-map-marker"></i>Khulna </h4>
                        </div>
                    </a>
                </div>

                <!-- Khulna Division -->
                <div class="col-6 col-md-4 col-lg-3 text-center">
                    <a href="">
                        <div class="location-article text-center">
                            <h3>1201</h3>
                            <h4><i class="fa fa-map-marker"></i>Barisal </h4>
                        </div>
                    </a>
                </div>

                <!-- Barisal Division -->
                <div class="col-6 col-md-4 col-lg-3 text-center">
                    <a href="">
                        <div class="location-article text-center">
                            <h3>105</h3>
                            <h4><i class="fa fa-map-marker"></i>Sylhet </h4>
                        </div>
                    </a>
                </div>

                <!-- Sylhet Division -->
                <div class="col-6 col-md-4 col-lg-3 text-center">
                    <a href="">
                        <div class="location-article text-center">
                            <h3>2005</h3>
                            <h4><i class="fa fa-map-marker"></i>Rangpur </h4>
                        </div>
                    </a>
                </div>

                <!-- Rajshahi Division -->
                <div class="col-6 col-md-4 col-lg-3 text-center">
                    <a href="">
                        <div class="location-article text-center">
                            <h3>3652</h3>
                            <h4><i class="fa fa-map-marker"></i>Mymensingh </h4>
                        </div>
                    </a>
                </div>

                <!-- Rangpur Division -->
                <div class="col-6 col-md-4 col-lg-3 text-center">
                    <a href="">
                        <div class="location-article text-center">
                            <h3>1254</h3>
                            <h4><i class="fa fa-map-marker"></i>Chittagong </h4>
                        </div>
                    </a>
                </div>

                <!-- Mymensingh Division -->
                <div class="col-6 col-md-4 col-lg-3 text-center">
                    <a href="">
                        <div class="location-article text-center">
                            <h3>3654</h3>
                            <h4><i class="fa fa-map-marker"></i>Rajshahi </h4>
                        </div>
                    </a>
                </div>

            </div><!-- row -->
        </div><!-- container -->
    </div>

    <!--
       ============  featured Developers   ============
    -->
    <div class="featured-developers">
        <!-- container -->
        <div class="container">
            <div class="sec-heading text-center mb-3">
                <h3>Featured Developers</h3>
            </div>
            <!-- row -->
            <div class="row text-center">
                <div class="col-3 col-md-2 col-xl-1">
                    <div class="developers">
                        <a href="#"><img src="{{asset('assets/img/developers/1.jpg')}}" class="img-fluid"
                                         alt="image"></a>
                    </div>
                </div>

                <div class="col-3 col-md-2 col-xl-1">
                    <div class="developers">
                        <a href="#"><img src="{{asset('assets/img/developers/2.jpg')}}" class="img-fluid"
                                         alt="image"></a>
                    </div>
                </div>

                <div class="col-3 col-md-2 col-xl-1">
                    <div class="developers">
                        <a href="#"><img src="{{asset('assets/img/developers/3.jpg')}}" class="img-fluid"
                                         alt="image"></a>
                    </div>
                </div>

                <div class="col-3 col-md-2 col-xl-1">
                    <div class="developers">
                        <a href="#"><img src="{{asset('assets/img/developers/4.jpg')}}" class="img-fluid"
                                         alt="image"></a>
                    </div>
                </div>

                <div class="col-3 col-md-2 col-xl-1">
                    <div class="developers">
                        <a href="#"><img src="{{asset('assets/img/developers/5.jpg')}}" class="img-fluid"
                                         alt="image"></a>
                    </div>
                </div>

                <div class="col-3 col-md-2 col-xl-1">
                    <div class="developers">
                        <a href="#"><img src="{{asset('assets/img/developers/6.jpg')}}" class="img-fluid"
                                         alt="image"></a>
                    </div>
                </div>

                <div class="col-3 col-md-2 col-xl-1">
                    <div class="developers">
                        <a href="#"><img src="{{asset('assets/img/developers/7.jpg')}}" class="img-fluid"
                                         alt="image"></a>
                    </div>
                </div>

                <div class="col-3 col-md-2 col-xl-1">
                    <div class="developers">
                        <a href="#"><img src="{{asset('assets/img/developers/8.jpg')}}" class="img-fluid"
                                         alt="image"></a>
                    </div>
                </div>

                <div class="col-3 col-md-2 col-xl-1">
                    <div class="developers">
                        <a href="#"><img src="{{asset('assets/img/developers/9.jpg')}}" class="img-fluid"
                                         alt="image"></a>
                    </div>
                </div>

                <div class="col-3 col-md-2 col-xl-1">
                    <div class="developers">
                        <a href="#"><img src="{{asset('assets/img/developers/10.jpg')}}" class="img-fluid" alt="image"></a>
                    </div>
                </div>

                <div class="col-3 col-md-2 col-xl-1">
                    <div class="developers">
                        <a href="#"><img src="{{asset('assets/img/developers/11.jpg')}}" class="img-fluid" alt="image"></a>
                    </div>
                </div>

                <div class="col-3 col-md-2 col-xl-1">
                    <div class="developers">
                        <a href="#"><img src="{{asset('assets/img/developers/12.jpg')}}" class="img-fluid" alt="image"></a>
                    </div>
                </div>

            </div><!-- row -->
        </div><!-- container -->
    </div>

    <!--
        ============  featured Agencies   ============
    -->
    <div class="featured-agencies">
        <!-- container -->
        <div class="container">
            <div class="sec-heading text-center mb-3">
                <h3>Featured Agencies</h3>
            </div>
            <!-- row -->
            <div class="row text-center">
                <div class="col-3 col-md-2 col-xl-1">
                    <div class="agencies">
                        <a href="#"><img src="{{asset('assets/img/agencies/1.jpg')}}" class="img-fluid" alt="image"></a>
                    </div>
                </div>

                <div class="col-3 col-md-2 col-xl-1">
                    <div class="agencies">
                        <a href="#"><img src="{{asset('assets/img/agencies/2.jpg')}}" class="img-fluid" alt="image"></a>
                    </div>
                </div>

                <div class="col-3 col-md-2 col-xl-1">
                    <div class="agencies">
                        <a href="#"><img src="{{asset('assets/img/agencies/3.jpg')}}" class="img-fluid" alt="image"></a>
                    </div>
                </div>

                <div class="col-3 col-md-2 col-xl-1">
                    <div class="agencies">
                        <a href="#"><img src="{{asset('assets/img/agencies/4.jpg')}}" class="img-fluid" alt="image"></a>
                    </div>
                </div>

                <div class="col-3 col-md-2 col-xl-1">
                    <div class="agencies">
                        <a href="#"><img src="{{asset('assets/img/agencies/5.jpg')}}" class="img-fluid" alt="image"></a>
                    </div>
                </div>

                <div class="col-3 col-md-2 col-xl-1">
                    <div class="agencies">
                        <a href="#"><img src="{{asset('assets/img/agencies/6.jpg')}}" class="img-fluid" alt="image"></a>
                    </div>
                </div>

                <div class="col-3 col-md-2 col-xl-1">
                    <div class="agencies">
                        <a href="#"><img src="{{asset('assets/img/agencies/7.jpg')}}" class="img-fluid" alt="image"></a>
                    </div>
                </div>

                <div class="col-3 col-md-2 col-xl-1">
                    <div class="agencies">
                        <a href="#"><img src="{{asset('assets/img/agencies/8.jpg')}}" class="img-fluid" alt="image"></a>
                    </div>
                </div>

                <div class="col-3 col-md-2 col-xl-1">
                    <div class="agencies">
                        <a href="#"><img src="{{asset('assets/img/agencies/9.jpg')}}" class="img-fluid" alt="image"></a>
                    </div>
                </div>

                <div class="col-3 col-md-2 col-xl-1">
                    <div class="agencies">
                        <a href="#"><img src="{{asset('assets/img/agencies/10.jpg')}}" class="img-fluid"
                                         alt="image"></a>
                    </div>
                </div>

                <div class="col-3 col-md-2 col-xl-1">
                    <div class="agencies">
                        <a href="#"><img src="{{asset('assets/img/agencies/11.jpg')}}" class="img-fluid"
                                         alt="image"></a>
                    </div>
                </div>

                <div class="col-3 col-md-2 col-xl-1">
                    <div class="agencies">
                        <a href="#"><img src="{{asset('assets/img/agencies/12.jpg')}}" class="img-fluid"
                                         alt="image"></a>
                    </div>
                </div>

            </div><!-- row -->
        </div><!-- container -->
    </div>

    <!--
        ============  popular locations   ============
    -->
    <div class="locations-sec">
        <!-- container -->
        <div class="container">
            <div class="sec-heading text-center mb-4">
                <h3>Popular Location</h3>
            </div>
            <div class="location-heading mb-3">
                <h2>Popular Locations to Buy Properties</h2>
            </div>
            <!-- row -->
            <div class="row mb-1">
                <div class="col-md-4">
                    <div class="locations-wrap">
                        <h3>Flat And Apartment</h3>
                        <ul>
                            <li><a href="#">Apartment and flat sale in Dhaka</a></li>
                            <li><a href="#">Apartment and flat sale in Dhaka</a></li>
                            <li><a href="#">Apartment and flat sale in Dhaka</a></li>
                            <li><a href="#">Apartment and flat sale in Dhaka</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="locations-wrap">
                        <h3>Land And Ploat</h3>
                        <ul>
                            <li><a href="#">Apartment and flat sale in Dhaka</a></li>
                            <li><a href="#">Apartment and flat sale in Dhaka</a></li>
                            <li><a href="#">Apartment and flat sale in Dhaka</a></li>
                            <li><a href="#">Apartment and flat sale in Dhaka</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="locations-wrap">
                        <h3>Office Space</h3>
                        <ul>
                            <li><a href="#">Apartment and flat sale in Dhaka</a></li>
                            <li><a href="#">Apartment and flat sale in Dhaka</a></li>
                            <li><a href="#">Apartment and flat sale in Dhaka</a></li>
                            <li><a href="#">Apartment and flat sale in Dhaka</a></li>
                        </ul>
                    </div>
                </div>
            </div><!-- row -->

            <div class="location-heading mb-3">
                <h2>Popular Locations for Rent</h2>
            </div>
            <!-- row -->
            <div class="row mb-2">
                <div class="col-md-4">
                    <div class="locations-wrap">
                        <h3>Flat And Apartment</h3>
                        <ul>
                            <li><a href="#">Apartment and flat sale in Dhaka</a></li>
                            <li><a href="#">Apartment and flat sale in Dhaka</a></li>
                            <li><a href="#">Apartment and flat sale in Dhaka</a></li>
                            <li><a href="#">Apartment and flat sale in Dhaka</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="locations-wrap">
                        <h3>Land And Ploat</h3>
                        <ul>
                            <li><a href="#">Apartment and flat sale in Dhaka</a></li>
                            <li><a href="#">Apartment and flat sale in Dhaka</a></li>
                            <li><a href="#">Apartment and flat sale in Dhaka</a></li>
                            <li><a href="#">Apartment and flat sale in Dhaka</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="locations-wrap">
                        <h3>Office Space</h3>
                        <ul>
                            <li><a href="#">Apartment and flat sale in Dhaka</a></li>
                            <li><a href="#">Apartment and flat sale in Dhaka</a></li>
                            <li><a href="#">Apartment and flat sale in Dhaka</a></li>
                            <li><a href="#">Apartment and flat sale in Dhaka</a></li>
                        </ul>
                    </div>
                </div>
            </div><!-- row -->
        </div><!-- container -->
    </div>


@endsection

@push('custom_js')

@endpush
