@extends('layouts.app')
@push('custom_css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fastselect.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <style>
        .reply:hover {
            color: #fff;
        }

        .img-fluid, .img-thumbnail {
            max-width: 100%;
            height: 100px;
        }
    </style>
@endpush
@php
    $panel_path = env('PANEL_PATH');
    $listing = $data['listing'] ?? [];
    $features = $data['features'] ?? [];
@endphp
@section('content')
    <div class="page-heading">
        <!-- container -->
        <div class="container">
            <div class="page-name">
                <ul>
                    <li><a href="{{ route('web.home') }}">Home <i class="fa fa-angle-double-right"></i></a></li>
                    <li><a href="{{ route('web.home') }}">Electronices &amp; Gedget <i
                                class="fa fa-angle-double-right"></i></a></li>
                    <li>Mobile Phone</li>
                </ul>
            </div>
        </div><!-- container -->
    </div>
    <div class="banner-form-sec d-none d-md-block">
        <!-- container -->
        <div class="container">
            <div class="banner-form">
                <form action="#" method="post">
                    <div class="form-wrap">
                        <div class="select-city" style="padding-bottom: 4px" data-toggle="modal" data-target="#exampleModal">
                            <h4>Select location / City</h4>
                        </div>
                        <div class="city-location">
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">
                                                Select City or Division | <a href="#">All of Bangladesh</a>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="nav modalcategory flex-column nav-pills"
                                                         id="v-pills-tab" role="tablist" aria-orientation="vertical">

                                                        <div class="city_title">
                                                            <h3><i class="fa fa-tags"></i>Cities</h3>
                                                        </div>
                                                        <a class="nav-link" id="v-pills-dhaka-tab" data-toggle="pill"
                                                           href="#v-pills-dhaka" role="tab"
                                                           aria-controls="v-pills-dhaka" aria-selected="true">Dhaka <i
                                                                class="fa fa-angle-right float-right"></i></a>

                                                        <a class="nav-link" id="v-pills-chattogram-tab"
                                                           data-toggle="pill" href="#v-pills-chattogram" role="tab"
                                                           aria-controls="v-pills-chattogram" aria-selected="false">Chattogram<i
                                                                class="fa fa-angle-right float-right"></i></a>

                                                        <a class="nav-link" id="v-pills-sylhet-tab" data-toggle="pill"
                                                           href="#v-pills-sylhet" role="tab"
                                                           aria-controls="v-pills-sylhet" aria-selected="false">Sylhet<i
                                                                class="fa fa-angle-right float-right"></i></a>

                                                        <a class="nav-link" id="v-pills-khulna-tab" data-toggle="pill"
                                                           href="#v-pills-khulna" role="tab"
                                                           aria-controls="v-pills-khulna" aria-selected="false">Khulna<i
                                                                class="fa fa-angle-right float-right"></i></a>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="tab-content modalsubcategory" id="v-pills-tabContent">
                                                        <div class="backcategory">
                                                            <h4><i class="fa fa-long-arrow-left"></i>Back</h4>
                                                        </div>
                                                        <div class="tab-pane fade show" id="v-pills-dhaka"
                                                             role="tabpanel" aria-labelledby="v-pills-dhaka-tab">
                                                            <div class="city-wrap">
                                                                <div class="city-list">
                                                                    <h3><i class="fa fa-map-marker"></i>Dhaka</h3>

                                                                    <div
                                                                        class="fstElement fstMultipleMode fstNoneSelected">
                                                                        <div class="fstControls"><input
                                                                                class="fstQueryInput fstQueryInputExpanded"
                                                                                style="" placeholder="Select Area">
                                                                        </div>
                                                                        <select class="multipleSelect form-control"
                                                                                multiple="" name="area">
                                                                            <option value="Afghanistan">Mohammadpur
                                                                            </option>
                                                                            <option value="Albania">Mogbazar</option>
                                                                            <option value="Algeria">Banglamotor</option>
                                                                            <option value="Andorra">Uttara</option>
                                                                            <option value="Belize">Elephant Road
                                                                            </option>
                                                                            <option value="Egypt">Savar</option>
                                                                        </select></div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="tab-pane fade" id="v-pills-chattogram"
                                                             role="tabpanel" aria-labelledby="v-pills-chattogram-tab">
                                                            <div class="city-wrap">
                                                                <div class="city-list">
                                                                    <h3><i class="fa fa-map-marker"></i>Chattogram</h3>
                                                                    <form class="attireCodeToggleBlock" action="">
                                                                        <div
                                                                            class="fstElement fstMultipleMode fstNoneSelected">
                                                                            <div class="fstControls"><input
                                                                                    class="fstQueryInput fstQueryInputExpanded"
                                                                                    style="" placeholder="Select Area">
                                                                            </div>
                                                                            <select class="multipleSelect form-control"
                                                                                    multiple="" name="area">
                                                                                <option value="Afghanistan">
                                                                                    Mohammadpur
                                                                                </option>
                                                                                <option value="Albania">Mogbazar
                                                                                </option>
                                                                                <option value="Algeria">Banglamotor
                                                                                </option>
                                                                                <option value="Andorra">Uttara</option>
                                                                                <option value="Belize">Elephant Road
                                                                                </option>
                                                                                <option value="Egypt">Savar</option>
                                                                            </select></div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="tab-pane fade" id="v-pills-sylhet" role="tabpanel"
                                                             aria-labelledby="v-pills-sylhet-tab">
                                                            <div class="city-wrap">
                                                                <div class="city-list">
                                                                    <h3><i class="fa fa-map-marker"></i>Sylhet</h3>
                                                                    <form class="attireCodeToggleBlock" action="">
                                                                        <div
                                                                            class="fstElement fstMultipleMode fstNoneSelected">
                                                                            <div class="fstControls"><input
                                                                                    class="fstQueryInput fstQueryInputExpanded"
                                                                                    style="" placeholder="Select Area">
                                                                            </div>
                                                                            <select class="multipleSelect form-control"
                                                                                    multiple="" name="area">
                                                                                <option value="Afghanistan">
                                                                                    Mohammadpur
                                                                                </option>
                                                                                <option value="Albania">Mogbazar
                                                                                </option>
                                                                                <option value="Algeria">Banglamotor
                                                                                </option>
                                                                                <option value="Andorra">Uttara</option>
                                                                                <option value="Belize">Elephant Road
                                                                                </option>
                                                                                <option value="Egypt">Savar</option>
                                                                            </select></div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="tab-pane fade" id="v-pills-khulna" role="tabpanel"
                                                             aria-labelledby="v-pills-khulna-tab">
                                                            <div class="city-wrap">
                                                                <div class="city-list">
                                                                    <h3><i class="fa fa-map-marker"></i>Khulna</h3>
                                                                    <form class="attireCodeToggleBlock" action="">
                                                                        <div
                                                                            class="fstElement fstMultipleMode fstNoneSelected">
                                                                            <div class="fstControls"><input
                                                                                    class="fstQueryInput fstQueryInputExpanded"
                                                                                    style="" placeholder="Select Area">
                                                                            </div>
                                                                            <select class="multipleSelect form-control"
                                                                                    multiple="" name="area">
                                                                                <option value="Afghanistan">
                                                                                    Mohammadpur
                                                                                </option>
                                                                                <option value="Albania">Mogbazar
                                                                                </option>
                                                                                <option value="Algeria">Banglamotor
                                                                                </option>
                                                                                <option value="Andorra">Uttara</option>
                                                                                <option value="Belize">Elephant Road
                                                                                </option>
                                                                                <option value="Egypt">Savar</option>
                                                                            </select></div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="form-wrap">
                    <!-- property types -->
                    <div class="property-select">
                        <h4 data-toggle="modal" data-target="#staticBackdrop">Property Types </h4>
                        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false"
                             tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <label for="all">
                                            <input type="checkbox" name="all" value="all" id="all">All
                                            <span class="checkmark"></span>
                                        </label>
                                        <label for="flats">
                                            <input type="checkbox" name="flats" value="flats" id="flats">Flats
                                            <span class="checkmark"></span>
                                        </label>
                                        <label for="land">
                                            <input type="checkbox" name="land" value="land" id="land">Land
                                            <span class="checkmark"></span>
                                        </label>
                                        <label for="room">
                                            <input type="checkbox" name="room" value="room" id="room">Room
                                            <span class="checkmark"></span>
                                        </label>
                                        <label for="office">
                                            <input type="checkbox" name="office" value="office" id="office">Office
                                            <span class="checkmark"></span>
                                        </label>
                                        <label for="industrial">
                                            <input type="checkbox" name="industrial" value="industrial" id="industrial">Industrial
                                            Space
                                            <span class="checkmark"></span>
                                        </label>
                                        <label for="house">
                                            <input type="checkbox" name="house" value="house" id="house">House
                                            <span class="checkmark"></span>
                                        </label>

                                        <!-- property-btn -->
                                        <div class="property-ctn text-center">
                                            <button data-dismiss="modal" aria-label="Close">Continue</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="search-form">
                    <input type="text" placeholder="Type Your key word" name="search" id="search">
                    <button type="submit">Search</button>
                </div>

            </div>
        </div><!-- container -->
    </div>

    <div class="single-product-sec">
        <!-- container -->
        <div class="container">
            <div class="singleproduct">
                <!-- row -->
                <div class="row">
                    <div class="col-lg-7">
                        @if(isset($listing->images) && count($listing->images))
                            <div class="single-product-slider">
                                <div id="carouselExampleIndicators" class="carousel slide pointer-event"
                                     data-ride="carousel">

                                    <ol class="carousel-indicators">
                                        @foreach($listing->images as $key => $image)
                                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}"
                                                class="{{ $key == 0 ? 'active' : '' }}">
                                                <img src="{{ asset($image->THUMB_PATH) }}" alt="image"
                                                     class="img-fluid">
                                            </li>
                                        @endforeach
                                    </ol>

                                    <div class="carousel-inner">
                                        @foreach($listing->images as $key => $image)
                                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                <a href="{{ asset($image->IMAGE_PATH) }}" class="popup">
                                                    <img style="max-height: 415px"
                                                         src="{{ asset($image->IMAGE_PATH) }}" class="d-block w-100"
                                                         alt="image"></a>
                                            </div>
                                        @endforeach
                                    </div>

                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                       data-slide="prev">
                                        <i class="fa fa-angle-left"></i>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                       data-slide="next">
                                        <i class="fa fa-angle-right"></i>
                                    </a>

                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-lg-5">
                        <div class="single-product-details">
                            <div class="single-product">
                                <div class="single-price">
                                    <h4>Tk {{ number_format($listing->getListingVariant->TOTAL_PRICE ?? 0, 2) }}</h4>
                                </div>
                                <div class="single-title">
                                    <h1>{{ $listing->TITLE }}</h1>
                                    <p><span>Offered by: <a href="{{ route('web.owner', $listing->owner->PK_NO) }}">{{ $listing->owner->NAME ?? '' }}</a></span></p>
                                    <p><span>Ad ID: <a href="#">{{ $listing->CODE ?? ''  }}</a></span>
                                    </p></div>
                                <div class="single-pro-ads">
                                    <h4>
                                        <a href="#"><i class="fa fa-map-marker"></i> {{ $listing->AREA_NAME ?? '' }}, {{ $listing->CITY_NAME }}</a>
                                        <i class="fa fa-suitcase"></i><a
                                            href="#"><strong>({{ ucwords($listing->PROPERTY_FOR ?? '') }})</strong></a>
                                    </h4>
                                </div>
                                <div class="short-info">
                                    <h3>Short Info</h3>
                                    <p>Condition:<a href="#">{{ $listing->PROPERTY_CONDITION ?? '' }}</a></p>
                                    <p>Size:<a href="#">{{ $listing->getListingVariant->PROPERTY_SIZE ?? '' }}</a></p>
                                    <p>Bedroom:<a href="#">{{ $listing->getListingVariant->BEDROOM ?? '' }}</a></p>
                                    <p>Bathroom:<a href="#">{{ $listing->getListingVariant->BATHROOM ?? '' }}</a></p>
                                    <p>Facing:<a href="#">{{ $listing->additionalInfo->FACING ?? '' }}</a></p>
                                    <p>Features:
                                        @foreach($features as $key => $feature)
                                            <a href="{{ $feature->URL_SLUG }}">{{ $feature->TITLE }}@if($key < count($features) - 1), @endif</a>
                                        @endforeach
                                    </p>
                                </div>
                                <div class="contect-with">
                                    <h3>Contact With</h3>
                                    <span class="show-number mb-2 mr-3">
                                   <i class="fa fa-phone"></i>
                                   <span class="hide_text">Show Number</span>
                                   <span class="Show_num d-none">{{ $listing->MOBILE1 }}</span>
                                </span>
                                    <a href="#" class="reply"><i class="fa fa-envelope"></i>Reply by email</a>
                                </div>
                                <div class="share-product">
                                    <h3>Share this ad</h3>
                                    <ul>
                                        <li><a href="#" class="fb"><i class="fa fa-facebook-square"></i></a></li>
                                        <li><a href="#" class="tw"><i class="fa fa-twitter-square"></i></a></li>
                                        <li><a href="#" class="ggle"><i class="fa fa-google-plus-square"></i></a></li>
                                        <li><a href="#" class="lin"><i class="fa fa-linkedin-square"></i></a></li>
                                        <li><a href="#" class="pin"><i class="fa fa-pinterest-square"></i></a></li>
                                        <li><a href="#" class="tum"><i class="fa fa-tumblr-square"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- row -->
            </div>
        </div><!-- container -->
    </div>

    <div class="product-des">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-8 mb-4">
                    <div class="des-product">
                        <h3>Description</h3>
                        {!! $listing->additionalInfo->DESCRIPTION ?? '' !!}
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    @if(isset($data['rightAd']) && isset($data['rightAd']->images[0]))
                        <div class="product-ads">
                            <a href="{{ $data['rightAd']->images[0]->URL ?? 'javascript:void(0)' }}" target="_blank"><img
                                    src="{{ $panel_path . $data['rightAd']->images[0]->IMAGE_PATH }}" class="w-100"
                                    alt="image"></a>
                        </div>
                    @endif
                </div>
            </div><!-- row -->
        </div><!-- container -->
    </div>

    <div class="recommended-sec">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-8 mb-5">
                    <div class="recommended-product">

                        @if(isset($data['similarListings']) && count($data['similarListings']))
                            <div class="recommended-title">
                                <h2>Similar Properties for you</h2>
                            </div>
                            <div class="row">
                                @foreach($data['similarListings'] as $property)
                                    <div class="col-lg-12 mb-3">
                                        <!-- product -->
                                        <div class="sale-wrapper" style="height: 100%;">
                                            <div class="sale-product" style="height: 100%;">
                                                <div class="row no-gutters position-relative">
                                                    <div class="col-3">
                                                        <div class="category-bx">
                                                            <a href="{{ route('web.property.details', $property->URL_SLUG) }}"><img
                                                                    src="{{ asset($property->getDefaultThumb->THUMB_PATH ?? '') }}"
                                                                    class="img-fluid" alt="image"></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-9 position-static">
                                                        <div class="category-price">
                                                            <h3>
                                                                TK {{ number_format($property->getListingVariant->TOTAL_PRICE ?? 0, 2) }}</h3>
                                                        </div>
                                                        <div class="category-title">
                                                            <h5 class="mt-0"><a
                                                                    href="{{ route('web.property.details', $property->URL_SLUG) }}">{{ $property->TITLE }}</a>
                                                            </h5>
                                                        </div>
                                                        <div class="category-address">
                                                            <a href="#"><i
                                                                    class="fa fa-map-marker"></i>{{ $property->AREA_NAME }}, {{ $property->CITY_NAME }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-4 text-center mb-5">
                    <div class="recommended-cta">

                        <div class="secure-cat">
                            <img src="{{ asset('assets/img/icon/13.png') }}" alt="image">
                            <h3>Secure Trading</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                        </div>

                        <div class="support-cat">
                            <img src="{{ asset('assets/img/icon/14.png') }}" alt="image">
                            <h3>24/7 Support</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                        </div>

                        <div class="trading-cat">
                            <img src="{{ asset('assets/img/icon/15.png') }}" alt="image">
                            <h3>Easy Trading</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                        </div>

                        <div class="need-help">
                            <h3>Need Help?</h3>
                            <p>Give a call on 08048100000</p>
                        </div>

                    </div>
                </div>
            </div><!-- row -->
        </div>
        <!-- container -->
    </div>

    @include('layouts.post-ad')
@endsection

@push('custom_js')
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/fastselect.standalone.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/hc-offcanvas-nav.js?ver=6.1.1') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script>
        $(document).on('click', '.modalcategory .nav-link', function () {
            $('.modalcategory').hide();
            $('.modalsubcategory').show();
            $('.backcategory').show();
        });
        $(document).on('click', '.backcategory', function () {
            $('.modalsubcategory').hide();
            $('.modalcategory').show();
        });

        // multiple select area
        $(document).ready(function () {
            $('.multipleSelect').fastselect();
        })

        // image Magnific Popup
        $('.popup').magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            }
        });

        (function ($) {
            //  sidebar menu
            var Nav = new hcOffcanvasNav('#main-nav', {
                disableAt: false,
                customToggle: '.toggle',
                levelSpacing: 40,
                levelTitles: false,
                levelTitleAsBack: true,
                labelClose: false
            });

        })(jQuery);
    </script>
@endpush
