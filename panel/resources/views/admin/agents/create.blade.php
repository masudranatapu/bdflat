@extends('admin.layout.master')

@section('Sales Agent','open')
@section('agent_list','active')

@section('title') Agents | Create @endsection
@section('page-name') Create Agents @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Create Agents</li>
@endsection

<!--push from page-->
@push('custom_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/selects/select2.min.css') }}">
@endpush

@php($tabIndex = 0)

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
                {!! Form::open([ 'route' => 'admin.agents.store', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate']) !!}
                @csrf
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group {!! $errors->has('name') ? 'error' : '' !!}">
                                <label>Agent Name<span class="text-danger">*</span></label>
                                <div class="controls">
                                    {!! Form::text('name', null,[ 'class' => 'form-control mb-1', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter Agent Name', 'tabIndex' => ++$tabIndex ]) !!}
                                    {!! $errors->first('name', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group {!! $errors->has('phone') ? 'error' : '' !!}">
                                <label>Agent Mobile Number<span class="text-danger">*</span></label>
                                <div class="controls">
                                    {!! Form::text('phone', null,[ 'class' => 'form-control mb-1', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Agent Mobile Number', 'tabIndex' => ++$tabIndex ]) !!}
                                    {!! $errors->first('phone', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group {!! $errors->has('email') ? 'error' : '' !!}">
                                <label>Agent Email Address</label>
                                <div class="controls">
                                    {!! Form::text('email', null,[ 'class' => 'form-control mb-1', 'placeholder' => 'Agent Email Address', 'tabIndex' => ++$tabIndex ]) !!}
                                    {!! $errors->first('email', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group {!! $errors->has('payment_details') ? 'error' : '' !!}">
                                <label>Payment Method Details</label>
                                <div class="controls">
                                    {!! Form::text('payment_details', null,[ 'class' => 'form-control mb-1', 'placeholder' => 'Payment Method Details', 'tabIndex' => ++$tabIndex ]) !!}
                                    {!! $errors->first('payment_details', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group {!! $errors->has('pass') ? 'error' : '' !!}">
                                <label>@lang('agent.password')<span class="text-danger">*</span></label>
                                <div class="controls">
                                    {!! Form::password('pass',[ 'class' => 'form-control mb-1', 'placeholder' => 'Enter Password', 'tabIndex' => ++$tabIndex ]) !!}
                                    {!! $errors->first('pass', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-actions mt-10 text-center">
                <a href="{{ route('admin.agents.list')}}">
                    <button type="button" class="btn btn-warning mr-1">
                        <i class="ft-x"></i> Cancel
                    </button>
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="la la-check-square-o"></i> Save
                </button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    </div>
@endsection

<!--push from page-->
@push('custom_js')
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/select/form-select2.js')}}"></script>
@endpush('custom_js')
