@extends('admin.layout.master')

{{--@section('Earnings','open')--}}
@section('listing_price','active')

@section('title') Property Seeker @endsection
@section('page-name') Property Seeker @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('agent.breadcrumb_title') </a></li>
    <li class="breadcrumb-item active">Property Seeker</li>
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
    $roles = userRolePermissionArray();
@endphp


@section('content')
    <div class="card card-success min-height">
        <div class="card-header">
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
            <div class="card-body">
                {!! Form::open([ 'route' => 'admin.listing_lead_price.update', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate']) !!}
                <div class="form-body">
                    <h2 class="mb-2 mt-2">Buyer Information</h2>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>User Type:</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group {!! $errors->has('apv_sale_price') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::radio('property_for','sell', old('property_for'),[ 'id' => 'sell','data-validation-required-message' => 'This field is required']) !!}
                                    {{ Form::label('sell','Seeker') }}
                                    &emsp;
                                    {!! Form::radio('property_for','rent', old('property_for'),[ 'id' => 'rent']) !!}
                                    {{ Form::label('rent','Owner') }}
                                    &emsp;
                                    {!! Form::radio('property_for','roommate', old('property_for'),[ 'id' => 'roommate']) !!}
                                    {{ Form::label('roommate','Builder') }}
                                    &emsp;
                                    {!! Form::radio('property_for','roommate', old('property_for'),[ 'id' => 'roommate']) !!}
                                    {{ Form::label('roommate','Agency') }}

                                    {!! $errors->first('property_for', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>User ID: <strong>10000001</strong></label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Created Date: <strong>Jul 10, 2020</strong></label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Name:</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group {!! $errors->has('apv_sale_price') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('address', old('address'), [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Address']) !!}
                                    {!! $errors->first('property_for', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Email:</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group {!! $errors->has('apv_sale_price') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('address', old('address'), [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Address']) !!}
                                    {!! $errors->first('property_for', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Country:</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group {!! $errors->has('apv_sale_price') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('address', old('address'), [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Address']) !!}
                                    {!! $errors->first('property_for', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Mobile:</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group {!! $errors->has('apv_sale_price') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('address', old('address'), [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Address']) !!}
                                    {!! $errors->first('property_for', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>


                    <h2 class="mb-2 mt-2">Property Requirements</h2>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>City/Division:</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group {!! $errors->has('apv_sale_price') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::select('area', [],null,array('class'=>'form-control', 'placeholder'=>'Select Area','data-validation-required-message' => 'This field is required')) !!}
                                    {!! $errors->first('property_for', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Area (Based on City):</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group {!! $errors->has('apv_sale_price') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::select('area', [],null,array('class'=>'form-control', 'placeholder'=>'Select Area','data-validation-required-message' => 'This field is required')) !!}
                                    {!! $errors->first('property_for', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Looking Property For:</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group {!! $errors->has('apv_sale_price') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::radio('property_for','sell', old('property_for'),[ 'id' => 'sell','data-validation-required-message' => 'This field is required']) !!}
                                    {{ Form::label('sell','Buy') }}
                                    &emsp;
                                    {!! Form::radio('property_for','roommate', old('property_for'),[ 'id' => 'roommate']) !!}
                                    {{ Form::label('roommate','Rent') }}

                                    {!! $errors->first('property_for', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Property Type:</label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group {!! $errors->has('apv_sale_price') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::radio('property_for','sell', old('property_for'),[ 'id' => 'sell','data-validation-required-message' => 'This field is required']) !!}
                                    {{ Form::label('sell','Apartment') }}

                                    &emsp;
                                    {!! Form::radio('property_for','roommate', old('property_for'),[ 'id' => 'roommate']) !!}
                                    {{ Form::label('roommate','Land') }}

                                    &emsp;
                                    {!! Form::radio('property_for','roommate', old('property_for'),[ 'id' => 'roommate']) !!}
                                    {{ Form::label('roommate','Roommate') }}

                                    &emsp;
                                    {!! Form::radio('property_for','roommate', old('property_for'),[ 'id' => 'roommate']) !!}
                                    {{ Form::label('roommate','Building or House') }}

                                    &emsp;
                                    {!! Form::radio('property_for','roommate', old('property_for'),[ 'id' => 'roommate']) !!}
                                    {{ Form::label('roommate','Office Space') }}

                                    {!! $errors->first('property_for', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group {!! $errors->has('apv_sale_price') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::radio('property_for','sell', old('property_for'),[ 'id' => 'sell','data-validation-required-message' => 'This field is required']) !!}
                                    {{ Form::label('sell','Duplex Home') }}

                                    &emsp;
                                    {!! Form::radio('property_for','roommate', old('property_for'),[ 'id' => 'roommate']) !!}
                                    {{ Form::label('roommate','Room') }}

                                    &emsp;
                                    {!! Form::radio('property_for','roommate', old('property_for'),[ 'id' => 'roommate']) !!}
                                    {{ Form::label('roommate','Industrial Space') }}

                                    &emsp;
                                    {!! Form::radio('property_for','roommate', old('property_for'),[ 'id' => 'roommate']) !!}
                                    {{ Form::label('roommate','Warehouse') }}

                                    &emsp;
                                    {!! Form::radio('property_for','roommate', old('property_for'),[ 'id' => 'roommate']) !!}
                                    {{ Form::label('roommate','Shop') }}

                                    {!! $errors->first('property_for', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Property Size:</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group {!! $errors->has('apv_sale_price') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('address', old('address'), [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Address']) !!}
                                    {!! $errors->first('property_for', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                        To
                        <div class="col-md-3">
                            <div class="form-group {!! $errors->has('apv_sale_price') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('address', old('address'), [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Address']) !!}
                                    {!! $errors->first('property_for', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Property Condition (Only Buy):</label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group {!! $errors->has('apv_sale_price') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::checkbox('features[]',null, old('features'),[ 'id' => 'features','class' =>'form-check-label']) !!}
                                    {{ Form::label('features','Ready',['class' =>'form-check-label']) }}
                                    &emsp;

                                    {!! Form::checkbox('features[]',null, old('features'),[ 'id' => 'features','class' =>'form-check-label']) !!}
                                    {{ Form::label('features','Semi Ready',['class' =>'form-check-label']) }}

                                    &emsp;
                                    {!! Form::checkbox('features[]',null, old('features'),[ 'id' => 'features','class' =>'form-check-label']) !!}
                                    {{ Form::label('features','Ongoing',['class' =>'form-check-label']) }}

                                    &emsp;
                                    {!! Form::checkbox('features[]',null, old('features'),[ 'id' => 'features','class' =>'form-check-label']) !!}
                                    {{ Form::label('features','Used',['class' =>'form-check-label']) }}

                                    {!! $errors->first('property_for', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Requirement Details:</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group {!! $errors->has('apv_sale_price') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::textarea('description', old('description'), [ 'id'=>'description','class' => 'msg-area form-control', 'placeholder' => 'Type here']) !!}
                                    {!! $errors->first('property_for', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Preferred Time to Contact:</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group {!! $errors->has('apv_sale_price') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('address', old('address'), [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Address']) !!}
                                    {!! $errors->first('property_for', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Sharing Permission (Max):</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group {!! $errors->has('apv_sale_price') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('address', old('address'), [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Address']) !!}
                                    {!! $errors->first('property_for', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Email Alert:</label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group {!! $errors->has('apv_sale_price') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::radio('property_for','sell', old('property_for'),[ 'id' => 'sell','data-validation-required-message' => 'This field is required']) !!}
                                    {{ Form::label('sell','Daily') }}

                                    &emsp;
                                    {!! Form::radio('property_for','roommate', old('property_for'),[ 'id' => 'roommate']) !!}
                                    {{ Form::label('roommate','Weekly') }}

                                    &emsp;
                                    {!! Form::radio('property_for','roommate', old('property_for'),[ 'id' => 'roommate']) !!}
                                    {{ Form::label('roommate','Monthly') }}

                                    {!! $errors->first('property_for', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Verification Status:</label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group {!! $errors->has('apv_sale_price') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::radio('property_for','sell', old('property_for'),[ 'id' => 'sell','data-validation-required-message' => 'This field is required']) !!}
                                    {{ Form::label('sell','Pending') }}

                                    &emsp;
                                    {!! Form::radio('property_for','roommate', old('property_for'),[ 'id' => 'roommate']) !!}
                                    {{ Form::label('roommate','Valid') }}

                                    &emsp;
                                    {!! Form::radio('property_for','roommate', old('property_for'),[ 'id' => 'roommate']) !!}
                                    {{ Form::label('roommate','Invalid') }}

                                    {!! $errors->first('property_for', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Verification Status:</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group {!! $errors->has('apv_sale_price') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('handover_date', old('handover_date'), [ 'id'=>'datepicker','class' => 'form-control datetimepicker','placeholder' => 'Handover date','autocomplete' => 'off', 'tabindex' => 1]) !!}
                                    {!! $errors->first('property_for', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Note:</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group {!! $errors->has('apv_sale_price') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::textarea('description', old('description'), [ 'id'=>'description','class' => 'msg-area form-control', 'placeholder' => 'Type here']) !!}
                                    {!! $errors->first('property_for', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Account Status:</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            {{--<div class="form-group {!! $errors->has('apv_sale_price') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::textarea('description', old('description'), [ 'id'=>'description','class' => 'msg-area form-control', 'placeholder' => 'Type here']) !!}
                                    {!! $errors->first('property_for', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>--}}

                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-actions mt-10 mb-3 ml-2 text-left">
                <button type="submit" class="btn btn-primary">
                    <i class="la la-check-square-o"></i> Update
                </button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
