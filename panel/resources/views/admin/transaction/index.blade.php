@extends('admin.layout.master')

@section('Payment','open')
@section('transaction_list','active')

@section('title') Transaction @endsection
@section('page-name') Transaction @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('agent.breadcrumb_title') </a></li>
    <li class="breadcrumb-item active">Transaction</li>
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
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-2 offset-10 text-right">
                                            <a href="{{route('admin.transaction.create')}}"
                                               class="text-warning font-weight-bold"><i class="fa fa-plus"></i> Add New</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="row form-group">
                                        <div class="col-md-2">
                                            {!! Form::label('transaction_type', 'Transaction Type', ['class' => 'lable-title']) !!}
                                        </div>
                                        <div class="col-md-10">
                                            <div class="controls">
                                                {!! Form::radio('transaction_type','all', old('transaction_type', true) == 'all',[ 'id' => 'all']) !!}
                                                {{ Form::label('all','All') }}
                                                &emsp;
                                                {!! Form::radio('transaction_type','listing_ad', old('transaction_type') == 'listing_ad',[ 'id' => 'listing_ad']) !!}
                                                {{ Form::label('listing_ad','Listing Ad') }}
                                                &emsp;
                                                {!! Form::radio('transaction_type','lead_purchase', old('transaction_type') == 'lead_purchase',[ 'id' => 'lead_purchase']) !!}
                                                {{ Form::label('lead_purchase','Lead Purchase') }}
                                                &emsp;
                                                {!! Form::radio('transaction_type','contact_view', old('transaction_type') == 'contact_view',[ 'id' => 'contact_view']) !!}
                                                {{ Form::label('contact_view','Contact View') }}
                                                &emsp;
                                                {!! Form::radio('transaction_type','recharge', old('transaction_type') == 'recharge',[ 'id' => 'recharge']) !!}
                                                {{ Form::label('recharge','Recharge') }}
                                                &emsp;
                                                {!! Form::radio('transaction_type','commission', old('transaction_type') == 'commission',[ 'id' => 'commission']) !!}
                                                {{ Form::label('commission','Commission') }}
                                                &emsp;
                                                {!! Form::radio('transaction_type','refund', old('transaction_type') == 'refund',[ 'id' => 'refund']) !!}
                                                {{ Form::label('refund','Refund') }}

                                                {!! $errors->first('transaction_type', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group" style="align-items: center">
                                        <div class="col-md-2">Search by Date: </div>
                                        <div class="col-md-10">
                                            <div class="row" style="align-items: center">
                                                <div class="col-md-3">
                                                    {!! Form::date('from_date', null, ['class' => 'form-control']) !!}
                                                </div>
                                                <div class="col-md-1 text-center">
                                                    <p>To</p>
                                                </div>
                                                <div class="col-md-3">
                                                    {!! Form::date('to_date', null, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group" style="align-items: center">
                                        <div class="col-md-6">
                                            {!! Form::text('search', null, ['class' => 'form-control', 'style' => 'border-radius: 40px !important', 'placeholder' => 'Search by User ID']) !!}
                                        </div>
                                        <div class="col-md-6">
                                            {!! Form::submit('Search', ['class' => 'btn btn-success']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <table class="table table-striped table-bordered text-center">
                                        <thead>
                                        <tr>
                                            <th>User ID</th>
                                            <th>TID</th>
                                            <th>Date</th>
                                            <th>Transaction Type</th>
                                            <th>Note</th>
                                            <th>Amount</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>10001</td>
                                            <td>10001</td>
                                            <td>Oct 12, 2020</td>
                                            <td>Listing Ad</td>
                                            <td>Paid for AD PACK NAME for PROPERTY ID</td>
                                            <td>100</td>
                                            <td>
                                                <a href="#">Edit</a> |
                                                <a href="#">Delete</a>
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
@endsection
