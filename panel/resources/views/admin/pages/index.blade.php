@extends('admin.layout.master')

@section('pages','active')

@section('title') Pages @endsection
@section('page-name') Pages @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('agent.breadcrumb_title') </a></li>
    <li class="breadcrumb-item active">Pages</li>
@endsection

@push('custom_css')
    <link rel="stylesheet" type="text/css" href="{{asset('/custom/css/custom.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
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
                            <div class="row  mb-2">
                                <div class="col-12">
                                    <div class="row mb-1">
                                        <div class="col-2">
                                            <form action="">
                                                <div style="position: relative">
                                                    <i class="fa fa-search"
                                                       style="position: absolute;top: 9px;left: 10px"></i>
                                                    <input type="text" class="form-control" name="search"
                                                           placeholder="Search"
                                                           style="border-radius: 25px !important;padding-left: 28px;">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-2 offset-8 text-right" style="padding-top: 10px">
                                            <a href="{{ route('admin.pages.create') }}"
                                               class="text-warning font-weight-bold"><i class="fa fa-plus"></i> Add New</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-sm table-bordered">
                                            <thead>
                                            <tr>
                                                <th class="text-center">ID</th>
                                                <th>Page Title</th>
                                                <th>Page URL</th>
                                                <th>Order</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td class="text-center">1</td>
                                                <td>Ready Flat for Sale in Dhaka</td>
                                                <td>site.com/pages/ready-flat-sale-dhaka</td>
                                                <td class="text-center font-weight-bold text-primary">1</td>
                                                <td class="text-center text-success">Active</td>
                                                <td class="text-center">
                                                    @if(hasAccessAbility('view_pages', $roles))
                                                        <a href="{{ route('admin.pages.edit', 1) }}"
                                                           class="btn btn-sm btn-info">
                                                            <i class="la la-eye"></i>
                                                        </a>
                                                    @endif
                                                    @if(hasAccessAbility('edit_pages', $roles))
                                                        <a href="{{ route('admin.pages.edit', 1) }}"
                                                           class="btn btn-sm btn-warning">
                                                            <i class="la la-pencil"></i>
                                                        </a>
                                                    @endif
                                                    @if(hasAccessAbility('delete_pages', $roles))
                                                        <a href="{{ route('admin.pages.edit', 1) }}"
                                                           class="btn btn-sm btn-danger">
                                                            <i class="la la-trash"></i>
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">1</td>
                                                <td>Ready Flat for Sale in Dhaka</td>
                                                <td>site.com/pages/ready-flat-sale-dhaka</td>
                                                <td class="text-center text-primary">1</td>
                                                <td class="text-center text-danger">In active</td>
                                                <td class="text-center">
                                                    @if(hasAccessAbility('view_pages', $roles))
                                                        <a href="{{ route('admin.pages.edit', 1) }}"
                                                           class="btn btn-sm btn-info">
                                                            <i class="la la-eye"></i>
                                                        </a>
                                                    @endif
                                                    @if(hasAccessAbility('edit_pages', $roles))
                                                        <a href="{{ route('admin.pages.edit', 1) }}"
                                                           class="btn btn-sm btn-warning">
                                                            <i class="la la-pencil"></i>
                                                        </a>
                                                    @endif
                                                    @if(hasAccessAbility('delete_pages', $roles))
                                                        <a href="{{ route('admin.pages.edit', 1) }}"
                                                           class="btn btn-sm btn-danger">
                                                            <i class="la la-trash"></i>
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
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
