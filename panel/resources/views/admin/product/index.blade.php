@extends('admin.layout.master')

@section('Product Management','open')
@section('product_list','active')

@section('title') Properties @endsection
@section('page-name') Properties @endsection

@push('custom_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-tooltip.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">

    <style>
        .t-pub{color:#6aa586}
        .t-unpub{color:#a54b82}
        .t-pen{color:#726ba5}
        .t-del{color:#e37b7f}
        .key_search{position:relative}
        .key_search i{position:absolute;top:20%;left:10%}
        .key_search input{border-radius:25px!important;padding-left:30px;font-size:12px}
        .br{border-radius:5px!important}
    </style>
@endpush



@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('product.breadcrumb_title')    </a>
    </li>
    <li class="breadcrumb-item active">Properties
    </li>
@endsection

@php
    $roles = userRolePermissionArray();
    $rows = $data['listings'] ?? null;
    $user_type_combo = $data['user_type'] ?? [];
    $property_for_combo = Config::get('static_array.property_for');
@endphp

@section('content')
    <div class="content-body min-height">
        <section id="pagination">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-sm card-success">                     

                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <form action="" class="my-2">
                                    <div class="row mb-1">
                                        <div class="col key_search">
                                            <input type="text" class="form-control " id="" name="" placeholder="Keyword Search">
                                            <i class="fa fa-search"></i>
                                        </div>

                                        <div class="col">
                                           <div class="form-group {!! $errors->has('user_type') ? 'error' : '' !!}"> 
                                                <div class="controls">
                                                   {!! Form::select('user_type', $user_type_combo, null, ['class'=>'form-control mb-1 ', 'placeholder' => 'Select user type', 'tabindex' => 6]) !!}
                                                   {!! $errors->first('user_type', '<label class="help-block text-danger">:message</label>') !!}
                                               </div>
                                           </div>

                                        </div>

                                        <div class="col">
                                            <div class="form-group {!! $errors->has('property_for') ? 'error' : '' !!}"> 
                                                <div class="controls">
                                                   {!! Form::select('property_for', $property_for_combo, null, ['class'=>'form-control mb-1 ', 'placeholder' => 'Select property for', 'tabindex' => 6]) !!}
                                                   {!! $errors->first('property_for', '<label class="help-block text-danger">:message</label>') !!}
                                               </div>
                                           </div>
                                        </div>

                                        <div class="col">
                                            <select name="" id="" class="form-control">
                                                <option value="">AD Type</option>
                                            </select>
                                        </div>

                                        <div class="col">
                                            <select name="" id="" class="form-control">
                                                <option value="">Payment</option>
                                            </select>
                                        </div>

                                        <div class="col">
                                            <select name="" id="" class="form-control">
                                                <option value="">Status</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <input type="button" class="btn btn-info btn-sm px-2" value="Search" style="border-radius: 5px">
                                            @if(hasAccessAbility('new_product', $roles))
                                            <a class="btn btn-sm btn-primary text-white" href="{{url('product/new')}}" title="ADD NEW LISTING" style="color: #FC611F;margin-left: 10px;" >+ Add New</a>
                                            @endif                                            
                                        </div>
                                    </div>
                                </form>

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
                                            <th style="width: 135px;">Action</th>
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
                                                    <td>

                                                        @if($row->STATUS == 'published')
                                                            <span class="t-pub">Published</span>
                                                        @endif

                                                        @if($row->STATUS == 'unpublished')
                                                            <span class="t-unpub">Unpublished</span>
                                                        @endif

                                                        @if($row->STATUS == 'pending')
                                                            <span class="t-pen">Pending</span>
                                                        @endif

                                                        @if($row->STATUS == 'rejected')
                                                            <span class="t-del">Rejected</span>
                                                        @endif

                                                        @if($row->STATUS == 'expired')
                                                            <span class="t-del">Expired</span>
                                                        @endif

                                                        @if($row->STATUS == 'deleted')
                                                            <span class="t-del">Deleted</span>
                                                        @endif
                                                        
                                                    </td>
                                                    <td>{{$row->A}}</td>
                                                    <td>{{$row->A}}</td>

                                                    <td style="width: 135px;" class="text-center">
                                                        @if(hasAccessAbility('view_product', $roles))
                                                            <a href="{{ route('admin.product.view', [$row->PK_NO]) }}"
                                                               title="VIEW">Activities</a>
                                                        @endif
                                                        |
                                                        @if(hasAccessAbility('edit_product', $roles))
                                                            <a href="{{ route('admin.product.edit', [$row->PK_NO]) }}" title="EDIT">Edit</a>
                                                        @endif
                                                        |
                                                        @if(hasAccessAbility('delete_product', $roles))
                                                            <a href="{{ route('admin.product.delete', [$row->PK_NO]) }}"
                                                               onclick="return confirm('Are you sure you want to delete the properties ?')"
                                                               title="DELETE">Delete</a>
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
    <!-- BEGIN: Data Table-->
    <script src="{{asset('/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('/app-assets/js/scripts/tables/datatables/datatable-basic.js')}}"></script>
    <!-- END: Data Table-->
@endpush
