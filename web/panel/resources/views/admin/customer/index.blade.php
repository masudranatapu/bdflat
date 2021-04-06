@extends('admin.layout.master')
@push('custom_css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-tooltip.css')}}">
@endpush

@section('Customer Management','open')
@section('customer_list','active')


@section('title')
    @lang('customer.list_page_title')
@endsection

@section('page-name')
    @lang('customer.list_page_sub_title')
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">@lang('customer.breadcrumb_title')    </a>
    </li>
    <li class="breadcrumb-item active">@lang('customer.breadcrumb_sub_title')
    </li>
@endsection

@php
    $roles = userRolePermissionArray()
@endphp

@section('content')
    <div class="content-body">
        <section id="pagination">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-sm">
                        <div class="card-header">
                            <a class="btn btn-round btn-sm btn-primary text-white" href="#" title="CUSTOMER LIST">Customer List</a>
                            

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
                                    <table class="table table-striped table-bordered alt-pagination table-sm" id="indextable">
                                        <thead>
                                        <tr>
                                            <th class="text-center">SL</th>
                                            <th>@lang('tablehead.name')</th>
                                            <th>@lang('tablehead.email')</th>
                                            <th>@lang('tablehead.phone')</th>
                                            <th>@lang('tablehead.type')</th>
                                            <th>@lang('tablehead.total_ad')</th>
                                            <th>@lang('tablehead.location')</th>
                                            <th>@lang('tablehead.entry_date')</th>
                                            <th style="width: 120px;" class="text-center">@lang('tablehead.action')</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($rows as $row)

                                            <tr class="{{$row->is_active == 2 ? 'text-warning' : '' }}" title="{{$row->is_active == 2 ? 'Inactive user' : '' }}">
                                                <td class="text-center">{{$loop->index + 1}}</td>
                                                <td>
                                                    <span class="text-upper">{{ $row->name }}</span></td>
                                                <td>{{ $row->email }}</td>
                                                <td>
                                                    <p>{{ $row->mobile1 }}</p>
                                                    <p>{{ $row->mobile2 }}</p>
                                                </td>
                                                <td>
                                                    @if($row->package)
                                                    {{ $row->package->title ?? '' }}
                                                    @if($row->package->pk_no > 1 )
                                                    <div>Start : {{ date('d-m-y',strtotime($row->package_start_date)) }}</div>
                                                    <div>End : {{ date('d-m-y',strtotime($row->package_end_date)) }}</div>
                                                    @endif
                                                    @endif
                                                </td>
                                                <td>{{ $row->total_post }}</td>
                                                <td>{{ $row->address }}</td>
                                                <td>
                                                    {{ date('d-m-y',strtotime($row->created_at)) }} 
                                                </td>

                                                <td style="width: 120px;" class="text-center">
                                                    @if(hasAccessAbility('edit_vendor', $roles))
                                                   @if($row->is_active == 2 )
                                                   <a href="{{ route('admin.customer.active', [$row->id]) }}" class="btn btn-xs btn-outline-warning mr-1" onclick="return confirm('Are you sure you want to active the customer ?')" title="ACTIVE"><i class="la la-unlock"></i></a>
                                                   @else
                                                   <a href="{{ route('admin.customer.delete', [$row->id]) }}" class="btn btn-xs btn-outline-warning mr-1" onclick="return confirm('Are you sure you want to inactive the customer ?')" title="INACTIVE"><i class="la la-lock"></i></a>

                                                   @endif

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

@push('custom_js')
<script src="{{ asset('app-assets/js/scripts/tooltip/tooltip.js')}}"></script>
@endpush
