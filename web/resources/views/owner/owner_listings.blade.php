@extends('layouts.app')
@section('owner-listings','active')
@push('custom_css')

@endpush
<?php
$listings = $data['listing'] ?? [];
?>

@section('content')
    <!--
     ============   dashboard   ============
 -->
    <div class="dashboard-sec">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-3 mb-5 d-none d-md-block">
                    @include('common._left_menu')
                </div>
                <div class="col-md-9 col-sm-12">
                    <div class="account-details">
                        <!-- properties -->
                        <div class="property-wrapper">
                            <div class="new-property">
                                <div class="property-heading">
                                    <h3><a href="{{ route('owner-listings') }}"><i class="fa fa-long-arrow-left"></i>My
                                            Properties</a> <a
                                            href="{{ route('listings.create') }}" style="float: right;">Add new</a></h3>
                                </div>

                                <!-- product -->
                                @if($listings->count()>0)
                                    @foreach($listings as $listing)
                                        <div class="property-product mb-2">
                                            <div class="row no-gutters position-relative">
                                                <div class="col-3">
                                                    <div class="property-bx">
                                                        <a href="#"><img
                                                                src="{{ asset($listing->getDefaultThumb->THUMB_PATH ?? '') }}"
                                                                class="w-100"
                                                                alt="image"></a>
                                                    </div>
                                                    @if($listing->IS_FEATURE==1)
                                                        <div class="featured">
                                                            <div class="feature-text">
                                                                <span>Featured</span>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-9 position-static">
                                                    <h5 class="mt-0"><a href="details.html">{{$listing->TITLE}}</a></h5>
                                                    <a href="#" class="location"><i
                                                            class="fa fa-map-marker"></i>{{$listing->AREA_NAME}}
                                                        , {{$listing->CITY_NAME}}</a>
                                                    <div class="owner-info">
                                                        <ul>
                                                            <li><i class="fa fa-edit"></i><a
                                                                    href="{{route('listings.edit',$listing->PK_NO)}}">Edit</a>
                                                            </li>
                                                            <li><i class="fa fa-times"></i><a
                                                                    href="{{route('listings.delete',$listing->PK_NO)}}"
                                                                    onclick="return confirm('Are You Sure To Delete This?')">Delete</a>
                                                            </li>
                                                            <li>
                                                                <i class="fa fa-money"></i>
                                                                <a href="{{route('listings.pay',$listing->PK_NO)}}">Pay Now</a>
                                                            </li>
                                                            <li class="float-right"><i class="fa fa-check"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="row no-gutters">
                                        <div class="col-12">
                                            <h6 class="font-weight-bold text-danger text-center">No Data Found!</h6>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- row -->
        </div><!-- container -->
    </div>


@endsection

@push('custom_js')

@endpush
