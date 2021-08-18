@extends('admin.layout.master')

@section('product_list','active')
@section('Product Management','open')

<!--push from page-->
@push('custom_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/selects/select2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('app-assets/file_upload/image-uploader.min.css')}}">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-tooltip.css')}}">
    <link rel="stylesheet" href="{{ asset('app-assets/lightgallery/dist/css/lightgallery.min.css') }}">
    <style>
        td table {
            width: auto !important;
        }
    </style>

@endpush('custom_css')

@section('title') @lang('product.product_view') @endsection
@section('page-name')Property | View @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('product.breadcrumb_title')  </a></li>
    <li class="breadcrumb-item active">Property | View</li>
@endsection

<?php
$roles = userRolePermissionArray();
$bed_room = Config::get('static_array.bed_room') ?? [];
$bath_room = Config::get('static_array.bath_room') ?? [];
$user_type = Config::get('static_array.user_type') ?? [];
$property_status = Config::get('static_array.property_status') ?? [];
$payment_status = Config::get('static_array.payment_status') ?? [];
?>

@section('content')
    <div class="content-body min-height">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-success">
                    <div class="card-content">
                        <div class="card-header">
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-title mb-2">
                                        <h3>Basic Information</h3>
                                    </div>
                                    <div class="saleform-header mb-2">
                                        <p>Property ID: {{$product->CODE}}</p>
                                        <p>Create Date: {{date('M d, Y', strtotime($product->CREATED_AT))}}</p>
                                        <p>Modified On: {{date('M d, Y', strtotime($product->MODIFIED_AT))}}</p>
                                        <p>Owner Name: {{ $product->getUser->NAME }}</p>
                                        <p>Owner Type: {{ $user_type[$product->USER_TYPE] ?? '' }}</p>
                                        <p>Payment Status: {{ $payment_status[$product->PAYMENT_STATUS] ?? 'N/A' }}</p>
                                        <p>Expire
                                            Date: @if($product->EXPAIRED_AT) {{ date('d-m-Y',strtotime($product->EXPAIRED_AT)) }} @else
                                                Not set yet @endif </p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <p><span class="font-weight-bold">Advertisement Type: </span>{{  }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Recent Transactions -->

@endsection
<!--push from page-->
@push('custom_js')
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/select/form-select2.js')}}"></script>

    <!--for image upload-->
    <script type="text/javascript" src="{{ asset('app-assets/file_upload/image-uploader.min.js')}}"></script>

    <!--script only for product page-->
    <script type="text/javascript" src="{{ asset('app-assets/pages/product.js')}}"></script>

    <!--for tooltip-->
    <script src="{{ asset('app-assets/js/scripts/tooltip/tooltip.js')}}"></script>

    <!--for image gallery-->
    <script src="{{ asset('app-assets/lightgallery/dist/js/lightgallery.min.js')}}"></script>

@endpush('custom_js')
