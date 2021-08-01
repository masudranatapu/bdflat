@extends('admin.layout.master')

@section('Sales Agent','open')
@section('agent_list','active')

@section('title') @lang('agent.list_page_title') @endsection
@section('page-name') @lang('agent.list_page_sub_title') @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('agent.breadcrumb_title') </a></li>
    <li class="breadcrumb-item active">@lang('agent.breadcrumb_sub_title')</li>
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
                                            <a href="{{route('admin.agents.create')}}" class="text-warning font-weight-bold"><i class="fa fa-plus"></i> Add New</a>
                                        </div>
                                    </div>
                                    <div class="table-responsive ">
                                        <table class="table table-striped table-bordered table-sm text-center" {{--id="process_data_table"--}}>
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Agent Name</th>
                                                <th>Properties</th>
                                                <th>Earning</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <span>10001</span>
                                                </td>
                                                <td>
                                                    <span>Eusuf</span>
                                                </td>
                                                <td>
                                                    <span class="text-info">100</span>
                                                </td>
                                                <td>
                                                    <span class="text-info">100</span>
                                                </td>
                                                <td>
                                                    <span class="text-success">Active</span>
                                                </td>
                                                <td>

                                                    <a href="#" title="EDIT">Edit</a>
                                                    |
                                                    <a href="#"
                                                       onclick="return confirm('Are you sure you want to delete the properties ?')"
                                                       title="DELETE">Delete</a>
                                                    |
                                                    <a href="#"
                                                       title="CP">CP</a>

                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <span>10003</span>
                                                </td>
                                                <td>
                                                    <span>Arif</span>
                                                </td>
                                                <td>
                                                    <span class="text-info">360</span>
                                                </td>
                                                <td>
                                                    <span class="text-info">360</span>
                                                </td>
                                                <td>
                                                    <span class="text-danger">Inactive</span>
                                                </td>
                                                <td>

                                                    <a href="#" title="EDIT">Edit</a>
                                                    |
                                                    <a href="#"
                                                       onclick="return confirm('Are you sure you want to delete the properties ?')"
                                                       title="DELETE">Delete</a>
                                                    |
                                                    <a href="#"
                                                       title="CP">CP</a>

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
