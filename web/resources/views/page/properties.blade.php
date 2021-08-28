@extends('layouts.app')
@push('custom_css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fastselect.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <style>
        .reply:hover {
            color: #fff;
        }

    </style>
@endpush
@php
    $panel_path = env('PANEL_PATH');
    $listing = $data['listing'] ?? [];
    $features = $data['features'] ?? [];
@endphp
@section('content')
    <div class="page-heading d-none d-md-block">
        <!-- container -->
        <div class="container">
            <div class="page-name">
                <ul>
                    <li><a href="{{ route('web.home') }}">Home <i class="fa fa-angle-double-right"></i></a></li>
                    <li>Electronics &amp; Gedget</li>
                </ul>
                <h1>Mobile Phones</h1>
            </div>
        </div><!-- container -->
    </div>

    <div class="banner-form-sec d-none d-md-block">
        <!-- container -->
        <div class="container">
            <div class="banner-form">
                <form action="#" method="post">
                    {{-- <div class="form-wrap">
                        <div class="form-group">
                            <select class="form-control" id="selectCity">
                                <option>Select Location</option>
                                <option>United Kingdom</option>
                                <option>United States</option>
                                <option>China</option>
                                <option>Russia</option>
                            </select>
                        </div>
                    </div> --}}
                    <div class="form-wrap">
                        <div class="form-group">
                            <select class="form-control" id="selectCategory">
                                <option>All Property Type</option>
                                <option value="buy">Sale</option>
                                <option value="rent">Rent</option>
                                <option value="roommmate">Roommate</option>
                            </select>
                        </div>
                    </div>
                    <div class="search-form">
                        <input type="text" placeholder="Type Your key word" name="search" id="search">
                        <button type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div><!-- container -->
    </div>

    <div class="category-nav mb-4 d-block d-md-none">
        <div class="nav-header">
            <h3>
                <a href="index.html">
                    <i class="fa fa-long-arrow-left"></i>
                    Flats in Dhaka <br>
                    <span>12,345 ads</span>
                </a>
            </h3>
        </div>
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-4 text-center">
                    <div class="category-nav-list">
                        <a href="search-filter.html"><i class="fa fa-filter"></i>Filters</a>
                    </div>
                </div>

                <div class="col-4 text-center">
                    <div class="category-nav-list sortby d-block d-md-none">
                        <p>
                            <select class="form-control" id="sortby">
                                <option>Sort</option>
                                <option>Price: low to high</option>
                                <option>Price: high to low</option>
                            </select>
                        </p>
                    </div>
                </div>

                <div class="col-4 text-center">
                    <div class="category-nav-list">
                        <a href="#"><i class="fa fa-check-square"></i>Verified</a>
                    </div>
                </div>

            </div><!-- row -->
        </div><!-- container -->
    </div>

    <div class="categories-sec">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-4 col-lg-3 mb-5 d-none d-md-block">
                    <div class="categorie-wrapper">
                        <div class="categorie-wrap">
                            <div class="accordion" id="accordionExample">
                                <!-- all categories -->
                                    <div class="card">
                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                             data-parent="#accordionExample" style="">
                                            <div class="card-body">
                                                <div class="categories-list">
                                                    <select  class="form-control" id="verified_prop">
                                                        <option value="all_properties" {{ request()->query('verified') == 'all_properties' ? 'selected' : '' }}>Properties</option>
                                                        <option value="verified_properties" {{ request()->query('verified') == 'verified_properties' ? 'selected' : '' }}>Verified Properties</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                <!-- all categories -->
                                @if(isset($data['categories']) && count($data['categories']))
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h2 class="mb-0">
                                                <button class="btn btn-block text-left" type="button"
                                                        data-toggle="collapse"
                                                        data-target="#collapseOne" aria-expanded="true"
                                                        aria-controls="collapseOne">All Categories
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                             data-parent="#accordionExample" style="">
                                            <div class="card-body">
                                                <div class="categories-list">
                                                    <ul>
                                                        @foreach($data['categories'] as $category)
                                                            <li>
                                                                <img src="{{ $panel_path . $category->ICON_PATH }}"
                                                                     alt="" class="img-fluid">
                                                                <a href="?cat={{ $category->URL_SLUG }}"
                                                                   data-value="{{ $category->PK_NO }}"
                                                                   class="category">{{ $category->PROPERTY_TYPE }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            <!-- condition -->
                                @if(isset($data['conditions']) && count($data['conditions']))
                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <h2 class="mb-0">
                                                <button class="btn btn-block text-left collapsed" type="button"
                                                        data-toggle="collapse" data-target="#collapseTwo"
                                                        aria-expanded="false" aria-controls="collapseTwo">Condition
                                                </button>
                                            </h2>
                                        </div>
                                        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo"
                                             data-parent="#accordionExample">
                                            <div class="card-body">
                                                <div class="categories-condition">
                                                    <form method="get" action="" id="conditionForm">
                                                        @foreach($data['conditions'] as $condition)
                                                            <label for="{{ strtolower($condition->PROD_CONDITION) }}">
                                                                <input class="condition" type="checkbox"
                                                                       name="condition"
                                                                       {{ request()->query->has('condition') ? (in_array($condition->PK_NO, explode(',', request()->query('condition'))) ? 'checked' : '') : '' }}
                                                                       value="{{ $condition->PK_NO }}"
                                                                       id="{{ strtolower($condition->PROD_CONDITION) }}">
                                                                {{ $condition->PROD_CONDITION }}
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        @endforeach
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            @endif

                            <!-- price -->
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h2 class="mb-0">
                                            <button class="btn btn-block text-left collapsed" type="button"
                                                    data-toggle="collapse" data-target="#collapseThree"
                                                    aria-expanded="false" aria-controls="collapseThree">Price
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseThree" class="collapse show" aria-labelledby="headingThree"
                                         data-parent="#accordionExample">
                                        <div class="card-body price-body">
                                            <div class="categories-price">
                                                <form action="#">
                                                    <div class="row">
                                                        <div class="col-5">
                                                            <div class="range-form ml-1">
                                                                <input type="number" name="p_min"
                                                                       value="{{ request()->query('p_min') }}"
                                                                       class="form-control"
                                                                       placeholder="Min">
                                                            </div>
                                                        </div>
                                                        <div class="col-2 text-center">
                                                            <div class="range-to">
                                                                <span>To</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-5">
                                                            <div class="range-form mr-1">
                                                                <input type="number" name="p_max"
                                                                       value="{{ request()->query('p_max') }}"
                                                                       class="form-control"
                                                                       placeholder="Max">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-center mt-3">
                                                        <button class="filter_btn" id="priceFilter">Filter</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- posted by -->
                                <div class="card">
                                    <div class="card-header" id="headingFour">
                                        <h2 class="mb-0">
                                            <button class="btn btn-block text-left collapsed" type="button"
                                                    data-toggle="collapse" data-target="#collapseFour"
                                                    aria-expanded="false" aria-controls="collapseFour">Posted By
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseFour" class="collapse show" aria-labelledby="headingFour"
                                         data-parent="#accordionExample" style="">
                                        <div class="card-body">
                                            <div class="categories-posted">
                                                <form action="#">
                                                    <label for="induvidual">
                                                        <input type="checkbox" name="posted" value="2"
                                                               {{ request()->query->has('by') ? (in_array(2, explode(',', request()->query('by'))) ? 'checked ' : '') : '' }}
                                                               id="induvidual"> Owner
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label for="dealer">
                                                        <input type="checkbox" name="posted"
                                                               {{ request()->query->has('by') ? (in_array(3, explode(',', request()->query('by'))) ? 'checked ' : '') : '' }}
                                                               value="3" id="dealer">Builder
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label for="reseller">
                                                        <input type="checkbox" name="posted" value="4"
                                                               {{ request()->query->has('by') ? (in_array(4, explode(',', request()->query('by'))) ? 'checked ' : '') : '' }}
                                                               id="reseller"> Agency
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label for="Manufacturer">
                                                        <input type="checkbox" name="posted" value="5"
                                                               {{ request()->query->has('by') ? (in_array(5, explode(',', request()->query('by'))) ? 'checked ' : '') : '' }}
                                                               id="Manufacturer"> Agent
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 col-lg-7">
                    <div class="categorie-product">
                        <div class="categorie-header d-flex justify-content-between">
                            <div class="categorie-title">
                                @if(isset($data['listings']) && count($data['listings']))
                                    <h2>Properties found</h2>
                                @else
                                    <h2>Properties not found</h2>
                                @endif
                            </div>
                            <div class="sortby d-none d-md-block">
                                <p>
                                    Sort By
                                    <select class="form-control" id="sortBy" name="sortBy">
                                        <option value="d">Default</option>
                                        <option value="lh" {{ request()->query('sb') == 'lh' ? 'selected' : '' }}>Price:
                                            low to high
                                        </option>
                                        <option value="hl" {{ request()->query('sb') == 'hl' ? 'selected' : '' }}>Price:
                                            high to low
                                        </option>
                                    </select>
                                </p>
                            </div>
                        </div>
                        <!-- product -->
                        @if(isset($data['listings']) && count($data['listings']))
                            @foreach($data['listings'] as $listing)
                                <div class="verified-product {{ $listing->IS_TOP ? 'top_product' : '' }} mb-3">
                                    <div class="verified-wrap">
                                        <div class="row no-gutters position-relative">
                                            <div class="col-4 col-md-3">
                                                <div class="verified-bx">
                                                    <a href="{{ route('web.property.details', $listing->URL_SLUG) }}"><img
                                                            src="{{ asset($listing->getDefaultThumb->THUMB_PATH ?? '') }}"
                                                            class="img-fluid" alt="image"></a>
                                                </div>
                                                @if($listing->IS_FEATURE)
                                                    <div class="featured">
                                                        <div class="feature-text">
                                                            <span>Featured</span>
                                                        </div>
                                                    </div>
                                                @elseif($listing->IS_VERIFIED)
                                                    <div class="featured">
                                                        <div class="verified-text feature-text">
                                                            <span>Verified</span>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-8 col-md-9 position-static">
                                                <div class="verified-price">
                                                    <h3>
                                                        TK {{ number_format($listing->getListingVariant->TOTAL_PRICE ?? 0, 2) }}</h3>
                                                </div>
                                                <div class="verified-title">
                                                    <h5 class="mt-0"><a
                                                            href="{{ route('web.property.details', $listing->URL_SLUG) }}">{{ $listing->TITLE }}</a>
                                                    </h5>
                                                    <h6>{{ $listing->getListingVariant && $listing->getListingVariant->BEDROOM ? $listing->getListingVariant->BEDROOM . ' Bed, ' : '' }}{{ $listing->getListingVariant && $listing->getListingVariant->BATHROOM ? $listing->getListingVariant->BATHROOM . ' Bath' : '' }}</h6>
                                                </div>
                                                <div class="verified-address">
                                                    <a href="#"><i
                                                            class="fa fa-map-marker"></i>{{ $listing->AREA_NAME . ', ' }}{{ $listing->CITY_NAME }}
                                                    </a>
                                                </div>
                                                @if($listing->IS_TOP)
                                                    <div class="top_pro">
                                                        <span>Top</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    <!-- ads -->
                        @if(isset($data['bottomAd']) && isset($data['bottomAd']->images[0]))
                            <div class="advertisement mb-3">
                                <a href="{{ $data['bottomAd']->images[0]->URL ?? 'javascript:void(0)' }}">
                                    <img
                                        src="{{ $panel_path . ($data['bottomAd']->images ? $data['bottomAd']->images[0]->IMAGE_PATH : '') }}"
                                        alt="" class="img-fluid">
                                </a>
                            </div>
                    @endif

                    <!-- pagination -->
                        <div class="pagination-wrap mt-4">
                            {{ $data['listings']->links('layouts.pagination') }}
                        </div>

                    </div>
                </div>

                @if(isset($data['rightAd']) && isset($data['rightAd']->images[0]))
                    <div class="d-none d-lg-block col-lg-2 mt-4">
                        <div class="advertisement">
                            <a href="{{ $data['rightAd']->images[0]->URL ?? 'javascript:void(0)' }}">
                                <img src="{{ $panel_path . ($data['rightAd']->images ? $data['rightAd']->images[0]->IMAGE_PATH : '') }}" alt="Images" class="img-fluid">
                            </a>
                        </div>
                    </div>
                @endif
            </div>
            <!-- row -->
        </div><!-- container -->
    </div>

@endsection

@push('custom_js')
    <script>
        $(document).ready(function () {
            let makeWait;
            let data = {
                condition: '',
                p_min: '',
                p_max: '',
                category: '{{ request()->query('cat') }}',
                postedBy: '',
                sortBy: '',
                verified: '',
            };

            let condition = $('.condition');
            let priceMin = $('input[name=p_min]');
            let priceMax = $('input[name=p_max]');
            let category = $('.category');
            let sortBy = $('#sortBy');
            let verified = $('#verified_prop');
            let postedBy = $('input[name=posted]');

            $('#priceFilter').click(function (e) {
                e.preventDefault();
                filter();
            });

            category.click(function (e) {
                e.preventDefault();
                data.category = $(this).data('value');
                filter();
            });

            sortBy.change(function () {
                filter();
            });

            verified.change(function () {
                filter();
            });

            condition.click(function () {
                filter();
            });

            postedBy.click(function () {
                filter();
            });

            function filter() {
                clearTimeout(makeWait);
                makeWait = setTimeout(function () {
                    let s = '';
                    $('input[name=condition]:checkbox:checked').each(function (i) {
                        s += $(this).val() + ',';
                    });
                    data.condition = s.substring(0, s.length - 1);

                    let r = '';
                    $('input[name=posted]:checkbox:checked').each(function (i) {
                        r += $(this).val() + ',';
                    });
                    data.postedBy = r.substring(0, r.length - 1);

                    data.sortBy = sortBy.val();
                    data.verified = verified.val();

                    data.p_min = priceMin.val();
                    data.p_max = priceMax.val();

                    let url = '{{ route('web.property') }}?condition=' + data.condition
                        + '&p_min=' + data.p_min + '&p_max=' + data.p_max +
                        '&cat=' + data.category + '&by=' + data.postedBy + '&sb=' + data.sortBy + '&verified=' + data.verified;
                    window.location = url;
                }, 500);
            }
        })
    </script>
@endpush
