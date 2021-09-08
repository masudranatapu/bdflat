@extends('layouts.app')
@section('my-account','active')
@push('custom_css')

@endpush

@section('content')
    <!--
     ============   dashboard   ============
 -->
    <div class="dashboard-sec">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-lg-3 col-md-4 mb-5 d-none d-md-block">
                    @include('common._left_menu')
                </div>
                <div class="col-lg-9 col-md-8 col-sm-12 ">
                    <div class="account-details">
                        <div class="account-user">
                            <div class="user-bx">
                                <img src="{{asset('assets/img/user/1.jpg')}}" alt="image">
                            </div>
                            <div class="user-profile">
                                <h3>{{Auth::user()->NAME}} <span
                                        style="font-size: 12px;">({{Auth::user()->USER_TYPE}})</span></h3>
                                <h5>User Id: {{Auth::user()->CODE}}</h5>
                                <a href="{{ route('profile.edit') }}"><i class="fa fa-edit"></i>Edit Profile</a>
                            </div>
                            <div class="user-logout">
                                <a class="nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
		                        document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                        @if(Auth::user()->USER_TYPE == 3)
                            <div class="user-wrapper">
                                <div class="user-nav">
                                    <div class="row text-center">
                                        <div class="col-4 mb-2">
                                            <div class="user-box">
                                                <a href="#">
                                                    <span>{{ Auth::user()->TOTAL_LISTING }}</span><br/>
                                                    My Properties
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-4 mb-2">
                                            <div class="user-box box2">
                                                <a href="#">
                                                    <span>{{ Auth::user()->TOTAL_LEAD }}</span><br/>
                                                    Leads
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="user-box box3">
                                                <a href="#">
                                                    <span>{{ number_format(Auth::user()->UNUSED_TOPUP,2) }}</span><br/>
                                                    Balance
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if(isset($data['properties']) && count($data['properties']))
                            <div class="property-wrapper">
                                <div class="new-property">
                                    <div class="property-heading">
                                        <h3>New Property <span class="float-right"><a href="#">See All</a></span></h3>
                                    </div>

                                    @foreach($data['properties'] as $property)
                                        <div class="row">
                                            <div class="col-12 mb-1">
                                                <!-- product -->
                                                <div class="sale-wrapper">
                                                    <div class="sale-product">
                                                        <div class="row no-gutters position-relative">
                                                            <div class="col-3">
                                                                <div class="category-bx">
                                                                    <a href="{{ route('web.property.details', $property->URL_SLUG) }}"><img
                                                                            src="{{$property->getDefaultThumb ? asset($property->getDefaultThumb->THUMB_PATH) : ""}}"
                                                                            class="img-fluid" alt="image"></a>
                                                                </div>
                                                                <div class="featured">
                                                                    <div class="feature-text">
                                                                        <span>{{ $property->listingType ? $property->listingType->SHORT_NAME : '' }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-9 position-static pl-3">
                                                                <div class="category-price">
                                                                    <h3>TK 50.00</h3>
                                                                </div>
                                                                <div class="category-title">
                                                                    <h5 class="mt-0">
                                                                        <a href="details.html">{{ $property->TITLE }}</a>
                                                                    </h5>
                                                                </div>
                                                                <div class="category-address">
                                                                    <a href="#"><i class="fa fa-map-marker"></i>
                                                                        {{ $property->AREA_NAME ? $property->AREA_NAME . ', ' : '' }}
                                                                        {{ $property->CITY_NAME }}
                                                                    </a>
                                                                </div>
                                                                <div class="owner-info">
                                                                    <ul>
                                                                        <li><i class="fa fa-edit"></i><a
                                                                                href="{{ route('listings.edit', $property->PK_NO) }}">Edit</a>
                                                                        </li>
                                                                        <li><i class="fa fa-times"></i><a
                                                                                href="{{ route('listings.delete', $property->PK_NO) }}">Delete</a>
                                                                        </li>
                                                                        <li class="float-right"><i
                                                                                class="fa fa-check"></i>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div><!-- row -->
        </div><!-- container -->
    </div>


@endsection

@push('custom_js')

@endpush
