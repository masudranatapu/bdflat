@extends('admin.layout.master')

@section('Web Setting','open')
@section('faq','active')

@section('title') @lang('web_setting.faq_title') @endsection
@section('page-name') @lang('web_setting.faq_title') @endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">@lang('admin_role.breadcrumb_title')  </a></li>
<li class="breadcrumb-item active">@lang('web_setting.faq_title')    </li>
@endsection

<!--push from page-->
@push('custom_css')
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
@endpush('custom_css')

@php
$roles = userRolePermissionArray();
$rows  = $data['data'];
@endphp

@section('content')

<div class="content-body">
    <section id="pagination">
        <div class="row">
            <div class="col-md-12">
                    <div class="card card-sm">
                        <div class="card-header">
                            <a class="btn btn-round btn-sm btn-primary text-white" href="{{route('admin.faq.create')}}" title="ADD NEW PACKAGE"><i class="ft-plus text-white"></i>Add Faq</a>
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
                                            <th class="text-center">Question</th>
                                            <th>Answer</th>
                                            <th style="width: 120px;">@lang('package.action')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($rows as $row)
                                             <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $row->question }}</td>
                                                <td>{{$row->answer}}</td>
                                                <td>
                                                    <a href="{{ route('admin.faq.view',[$row->pk_no]) }}" class="btn btn-xs btn-outline-primary mr-1" title="VIEW"><i class="la la-eye"></i></a>

                                                      <a href="{{ route('admin.faq.edit',[$row->pk_no]) }}" title="EDIT" class="btn btn-xs btn-outline-primary mr-1"><i class="la la-edit"></i></a>

                                                      <a href="{{ route('admin.faq.delete',[$row->pk_no]) }}" class="btn btn-xs btn-outline-danger mr-1" onclick="return confirm('Are you sure you want to delete the product with it\'s variant product ?')" title="DELETE"><i class="la la-trash"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
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
<!--push from page-->
@push('custom_js')
<script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{ asset('app-assets/js/scripts/forms/select/form-select2.js')}}"></script>
<script type="text/javascript" src="{{ asset('app-assets/pages/customer.js')}}"></script>
@endpush('custom_js')
