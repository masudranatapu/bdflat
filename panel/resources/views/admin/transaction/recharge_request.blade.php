@extends('admin.layout.master')

@section('Payment','open')
@section('recharge_request','active')

@section('title') Refund Request @endsection
@section('page-name') Refund Request @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('agent.breadcrumb_title') </a></li>
    <li class="breadcrumb-item active">Refund Request</li>
@endsection

@push('custom_css')
    <link rel="stylesheet" type="text/css" href="{{asset('/custom/css/custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
@endpush

@push('custom_js')

    <!-- BEGIN: Data Table-->
    <script src="{{asset('/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('/app-assets/js/scripts/tables/datatables/datatable-basic.js')}}"></script>
    <!-- END: Data Table-->
@endpush

@php
    $roles = userRolePermissionArray()
@endphp

@section('content')
    <div class="content-body min-height">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-success">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row  mb-2">
                                <div class="col-12">
                                    <div class="row mb-1">
                                        <div class="col-2">
                                            <form action="">
                                                <div style="position: relative">
                                                    <i class="fa fa-search" style="position: absolute;top: 9px;left: 10px"></i>
                                                    <input type="text" class="form-control" name="search" placeholder="Search"
                                                           style="border-radius: 25px !important;padding-left: 28px;">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-2 offset-8 text-right" style="padding-top: 10px">
                                            <a href="" class="text-warning font-weight-bold"><i class="fa fa-plus"></i> Add New</a>
                                        </div>
                                        <img src="{{ asset('/assets/img/recharge_request.png') }}"  />
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
