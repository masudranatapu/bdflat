@extends('admin.layout.master')

@section('Payment','open')
@section('refund_request','active')

@section('title') Refund Request @endsection
@section('page-name') Refund Request @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('agent.breadcrumb_title') </a></li>
    <li class="breadcrumb-item active">Refund Request</li>
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
                                    <div class="d-block mb-1">
                                        <div class="controls">
                                            {!! Form::radio('type','all', old('type', true) == 'all',[ 'id' => 'all']) !!}
                                            {{ Form::label('all','All') }}
                                            &emsp;
                                            {!! Form::radio('type','pending', old('type') == 'pending',[ 'id' => 'pending']) !!}
                                            {{ Form::label('pending','Pending') }}
                                            &emsp;
                                            {!! Form::radio('type','approved', old('type') == 'approved',[ 'id' => 'approved']) !!}
                                            {{ Form::label('approved','Approved') }}
                                            &emsp;
                                            {!! Form::radio('type','rejected', old('type') == 'rejected',[ 'id' => 'rejected']) !!}
                                            {{ Form::label('rejected','Rejected') }}
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
                                            <th>SL</th>
                                            <th>USER ID</th>
                                            <th>Refund ID</th>
                                            <th>PID/LID</th>
                                            <th>Date</th>
                                            <th>Property owner/seeker Name</th>
                                            <th>Property owner/seeker No.</th>
                                            <th>Reason</th>
                                            <th>Comment</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @if(isset($data['rows']) && count($data['rows']) > 0 )
                                            @foreach($data['rows'] as $key => $item)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $item->USER_CODE }}</td>
                                            <td>10001</td>
                                            <td>PID 10001</td>
                                            <td>Oct 12, 2020</td>
                                            <td>Owner name</td>
                                            <td>Mobile NO</td>
                                            <td>selected reason</td>
                                            <td>comment</td>
                                            <td>100</td>
                                            <td class="text-success">Approved</td>
                                            <td>
                                                <a href="#">Action</a> |
                                                <a href="#">Edit Property</a> |
                                                <a href="#">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="12">Data not found</td>
                                        </tr>
                                        @endif
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
