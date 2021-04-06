@extends('admin.layout.master')
@section('permission','active')
@section('Role Management','open')
@section('title')
    @lang('admin_action.list_page_title')
@endsection
@section('page-name')
    @lang('admin_action.list_page_sub_title')
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ url('dashboard') }}">@lang('admin_action.breadcrumb_title')</a>
    </li>
    <li class="breadcrumb-item active">
        @lang('admin_action.breadcrumb_sub_title')
    </li>
@endsection
@php
        $roles = userRolePermissionArray()
@endphp
@section('content')
    <!-- Alternative pagination table -->
    <div class="content-body">
        <section id="pagination">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            @if(hasAccessAbility('new_action', $roles))
                            <a class="text-white" href="{{url('permission/new')}}">
                                <button type="button" class="btn btn-round btn-sm btn-primary">
                                    <i class="ft-plus text-white"></i> @lang('admin_action.action_create_btn')
                                </button>
                            </a>
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
                            <div class="card-body card-dashboard text-center">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered alt-pagination" id="indextable">
                                        <thead>
                                        <tr>
                                            <th>@lang('tablehead.tbl_head_sl')</th>
                                            <th>@lang('tablehead.tbl_head_name')</th>
                                            <th>@lang('tablehead.tbl_head_action_string')</th>
                                            <th>@lang('tablehead.tbl_head_menu_name')</th>
                                            <th>@lang('tablehead.tbl_head_created_at')</th>
                                            <th>@lang('tablehead.tbl_head_action')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($rows as $row)
                                            <tr>
                                                <td>{{$loop->index + 1}}</td>
                                                <td>{{$row->display_name}}</td>
                                                <td>{{$row->name}}</td>
                                                <td>{{$row->group->group_name}}</td>
                                                <td>{{$row->created_at}}</td>
                                                <td>
                                                    @if(hasAccessAbility('edit_action', $roles))
                                                    <a class="text-white"
                                                       href="{{ route('admin.permission.edit', array($row->id)) }}">
                                                        <button type="button"
                                                                class="btn btn-sm btn-outline-primary mr-1"><i
                                                                class="la la-edit"></i>
                                                        </button>
                                                    </a>
                                                    @endif
                                                    @if(hasAccessAbility('delete_action', $roles))
                                                    <a class="text-white"
                                                       href="{{ route('admin.permission.delete', array($row->id)) }}"  onclick="return confirm('Are you sure?')">
                                                        <button type="button"
                                                                class="btn btn-sm btn-outline-danger mr-1"><i
                                                                class="la la-trash"></i>
                                                        </button>
                                                    </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach()
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

    <!--/ Alternative pagination table -->
@endsection
