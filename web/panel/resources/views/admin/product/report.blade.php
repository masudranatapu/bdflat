@extends('admin.layout.master')

@section('product_list','active')
@section('Product Management','open')

@section('title') @lang('product.product_report') @endsection
@section('page-name') @lang('product.product_report') @endsection



@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('product.breadcrumb_title')  </a></li>
<li class="breadcrumb-item active">Report   </li>
@endsection

@push('custom_css')


@endpush('custom_css')


<?php 


    $roles = userRolePermissionArray();
    $active_tab = request('tab') ?? 1;
    $variant_id = request('variant_id') ?? null;
    $type = request('type') ?? null;


?>

@section('content')
<div class="content-body">
    <div class="row">
        <div class="col-md-12">
            <div class="card" >
                <div class="card-content">
                    <div class="card-body">

                        <h4>Post Title : {{ $product->ad_title }}</h4>
                        <table class="table table-striped table-bordered table-sm" >
                            <thead>
                                <tr>
                                    <th style="width: 5%">SL</th>
                                    <th style="width: 10%">Email</th>
                                    <th style="width: 85%">Report</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($product->allReports && count($product->allReports) > 0 )

                                @foreach( $product->allReports as $key => $value )
                                <tr>
                                    <td style="width: 5%">{{ $key+1 }}</td>
                                    <td style="width: 10%">{{ $value->email }}</td>
                                    <td style="width: 85%">{{ $value->message }}</td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                            
                        </table>
                                                 
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

<!--script only for product page-->
<script type="text/javascript" src="{{ asset('app-assets/pages/product.js')}}"></script>






 @endpush('custom_js')