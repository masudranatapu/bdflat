@extends('admin.layout.master')

@section('vendor','active')
@section('Procurement','open')
@section('title')
    @lang('vendor.list_page_title')
@endsection
@section('page-name')
    @lang('vendor.list_page_sub_title')    
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('vendor.breadcrumb_title')    </a>
    </li>
    <li class="breadcrumb-item active">@lang('vendor.breadcrumb_sub_title')    
    </li>
@endsection
@php
    $roles = userRolePermissionArray()
@endphp
@section('content')
    <div class="content-body">
        <section id="pagination">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            @if(hasAccessAbility('new_role', $roles))
                            <a class="text-white" href="{{route('admin.vendor.new')}}">
                                <button type="button" class="btn btn-round btn-sm btn-primary">
                                    <i class="ft-plus text-white"></i> @lang('vendor.role_create_btn')    
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
                            <div class="card-body card-dashboard">
                                <div class="table-responsive text-center">
                                    <table class="table table-striped table-bordered alt-pagination" id="indextable">
                                        <thead>
                                        <tr>
                                            <th>SL.</th>
                                            <th>Code</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Country</th>
                                            <th>Has Loyalty</th>
                                            <th>@lang('tablehead.tbl_head_action')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($rows as $row)
                                            <tr>
                                                <td>{{$loop->index + 1}}</td>
                                                <td>{{ $row->CODE }}</td>
                                                <td>{{ $row->NAME }}</td>
                                                <td>{{ $row->ADDRESS }}</td>
                                                <td>{{ $row->PHONE }}</td>
                                                <td>{{ $row->COUNTRY }}</td>
                                                <td>
                                                    @if($row->HAS_LOYALITY == 1)
                                                        Yes
                                                    @else
                                                        No
                                                    @endif
                                                </td>
                                                <td>
                                                    @if(hasAccessAbility('edit_vendor', $roles))
                                                    <a href="{{ route('admin.vendor.edit', [$row->PK_NO]) }}">
                                                        <button type="button"
                                                                class="btn btn-sm btn-outline-primary mr-1"><i
                                                                class="la la-edit"></i>
                                                        </button>
                                                    </a>
                                                    @endif
                                                    @if(hasAccessAbility('delete_vendor', $roles))
                                                    <a href="{{ route('admin.vendor.delete', [$row->PK_NO]) }}" onclick="return confirm('Are You Sure?')">
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
@endsection
