@extends('admin.layout.master')
@push('custom_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-tooltip.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">

@endpush
@section('product_list','active')
@section('Product Management','open')

@section('title')
    @lang('product.list_page_title')
@endsection

@section('page-name')
    @lang('product.list_page_sub_title')
@endsection

@push('custom_js')
    <!-- BEGIN: Data Table-->
    <script src="{{asset('/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('/app-assets/js/scripts/tables/datatables/datatable-basic.js')}}"></script>
    <!-- END: Data Table-->
@endpush

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('product.breadcrumb_title')    </a>
    </li>
    <li class="breadcrumb-item active">@lang('product.breadcrumb_sub_title')
    </li>
@endsection

@php
    $roles = userRolePermissionArray()
@endphp

@section('content')
    <div class="content-body min-height">
        <section id="pagination">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-sm card-success">
                        <div class="card-header">
                            @if(hasAccessAbility('new_product', $roles))
                                <a class="btn btn-sm btn-primary text-white" href="{{url('product/new')}}" title="ADD NEW PRODUCT MASTER"><i
                                        class="ft-plus text-white"></i> @lang('product.product_create_btn')</a>
                            @endif

                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <div class="table-responsive ">
                                    <table class="table table-striped table-bordered alt-pagination50 table-sm" id="indextable">
                                        <thead>
                                        <tr>
                                            <th class="text-center">User ID</th>
                                            <th>User Type</th>
                                            <th>User Name</th>
                                            <th>Property ID</th>
                                            <th>Property For</th>
                                            <th>Title</th>
                                            <th>Mobile</th>
                                            <th>Create Date</th>
                                            <th>Status</th>
                                            <th>AD Type</th>
                                            <th>Payment Type</th>
                                            <th style="width: 120px;">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($rows) && ($rows->count() > 0))
                                            @foreach($rows as $row)
                                                <tr>
                                                    <td>{{$row->A}}</td>
                                                    <td>{{$row->A}}</td>
                                                    <td>{{$row->A}}</td>
                                                    <td>{{$row->CODE}}</td>
                                                    <td>{{$row->PROPERTY_FOR}}</td>
                                                    <td>{{$row->TITLE}}</td>
                                                    <td>{{$row->MOBILE1}}</td>
                                                    <td>{{$row->CREATED_AT}}</td>
                                                    <td>{{$row->PROPERTY_TYPE}}</td>
                                                    <td>{{$row->A}}</td>
                                                    <td>{{$row->A}}</td>

                                                    <td style="width: 120px;" class="text-center">
                                                        @if(hasAccessAbility('edit_product', $roles))
                                                            <a href="{{ route('admin.product.edit', [$row->PK_NO]) }}" class="btn btn-xs  btn-info" title="EDIT"><i
                                                                    class="la la-edit"></i></a>
                                                        @endif

                                                        @if(hasAccessAbility('view_product', $roles))
                                                            <a href="{{ route('admin.product.view', [$row->PK_NO]) }}" class="btn btn-xs  btn-success text-white"
                                                               title="VIEW"><i class="la la-eye"></i></a>
                                                        @endif

                                                        @if(hasAccessAbility('delete_product', $roles))
                                                            <a href="{{ route('admin.product.delete', [$row->PK_NO]) }}" class="btn btn-xs btn-danger text-white"
                                                               onclick="return confirm('Are you sure you want to delete the product with it\'s variant product ?')"
                                                               title="DELETE"><i class="la la-trash"></i></a>
                                                        @endif

                                                    </td>
                                                </tr>
                                            @endforeach()
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('custom_js')
    <script src="{{ asset('app-assets/js/scripts/tooltip/tooltip.js')}}"></script>
@endpush
