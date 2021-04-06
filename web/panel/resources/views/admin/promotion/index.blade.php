@extends('admin.layout.master')
@push('custom_css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-tooltip.css')}}">
@endpush

@section('Promotion','open')
@section('promotion_list','active')


@section('title')
    @lang('promotion.promotion_title')
@endsection

@section('page-name')
    @lang('promotion.promotion_title')
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">@lang('promotion.dashboard')</a>
    </li>
    <li class="breadcrumb-item active">@lang('promotion.promotion_sub_title')
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
                            @if(hasAccessAbility('new_role', $roles))
                            <a class="btn btn-round btn-sm btn-primary text-white" href="javascript::void(0)" title="ADD NEW PACKAGE"><i class="ft-plus text-white"></i> @lang('promotion.add_promotion')</a>
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
                                    <table class="table table-striped table-bordered alt-pagination table-sm" id="indextable">
                                        <thead>
                                        <tr>
                                            <th class="text-center">@lang('promotion.sl')</th>
                                            <th>@lang('promotion.name')</th>
                                            <th>@lang('promotion.price')</th>
                                            <th>@lang('promotion.duration')</th>
                                            <th style="width: 120px;" class="text-center">@lang('promotion.action')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @if(isset($data['rows']) && count($data['rows']) > 0 )
                                            @foreach($data['rows'] as $key => $row)
                                            <tr>
                                                <td>01</td>
                                                <td>{{ $row->promotion->name ?? '' }}</td>
                                                <td>BDT {{ number_format($row->price, 2) }} </td>
                                                <td>{{ $row->day_limit }} Day</td>
                                                <td class="text-center">
                                                    {{-- <a href="{{ route('admin.promotion.view',1) }}" class="btn btn-xs btn-outline-primary mr-1" title="VIEW"><i class="la la-eye"></i></a>--}}

                                                    <a href="{{ route('admin.promotion.edit',1) }}" title="EDIT" class="btn btn-xs btn-outline-primary mr-1"><i class="la la-edit"></i></a>

                                                    {{-- <a href="" class="btn btn-xs btn-outline-danger mr-1" onclick="return confirm('Are you sure you want to delete the product with it\'s variant product ?')" title="DELETE"><i class="la la-trash"></i></a> --}}
                                                </td>
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
        </section>
    </div>
@endsection

@push('custom_js')
<script src="{{ asset('app-assets/js/scripts/tooltip/tooltip.js')}}"></script>
@endpush
