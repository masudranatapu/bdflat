@extends('layouts.app')
@section('contacted-properties','active')
@push('custom_css')
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/forms/validation/form-validation.css')}}">
    <style>
        .help-block{
            text-align: left !important;
            display: block !important;
            font-size: 12px !important;
            font-family: 'Montserrat-Medium' !important;
        }
    </style>
@endpush

<?php
$product_list_details = $data['product_list_details'] ?? [];
$claiming_reasons = Config::get('static_array.claiming_reason') ?? [];
?>

@section('content')
    <!--
     ============   dashboard   ============
 -->
    <!--
         ============   dashboard   ============
     -->
    <div class="dashboard-sec">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <div class="col-md-4 mb-5 d-none d-md-block">
                    @include('seeker._left_menu')
                </div>

                <div class="col-sm-12 col-md-8">
                    
                </div>

            </div><!-- row -->
        </div><!-- container -->
    </div>


@endsection

@push('custom_js')
    <script src="{{asset('/assets/js/forms/validation/jqBootstrapValidation.js')}}"></script>
    <script src="{{asset('/assets/js/forms/validation/form-validation.js')}}"></script>
@endpush
