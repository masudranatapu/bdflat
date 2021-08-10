@extends('admin.layout.master')

@section('Property Owner','open')
@section('owner_list','active')

@section('title') Owner | Update @endsection
@section('page-name') Update Owner Password @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Update Owner</li>
@endsection

<!--push from page-->
@push('custom_css')
    <link rel="stylesheet" type="text/css" href="{{asset('/custom/css/custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/selects/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/image_upload/image-uploader.min.css')}}">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
        #scrollable-dropdown-menu2 .tt-menu {
            max-height: 260px;
            overflow-y: auto;
            width: 100%;
            border: 1px solid #333;
            border-radius: 5px;
        }

        .twitter-typeahead {
            display: block !important;
        }

        .tt-hint {
            color: #999 !important;
        }
    </style>
@endpush

@php
    $roles          = userRolePermissionArray();
    $user_type      = Config::get('static_array.user_type');
    $user_status    = Config::get('static_array.user_status');
    $owner          = $data['owner'] ?? [];
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
                {!! Form::open([ 'route' => ['admin.owner.password.update', $data['id']], 'method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate']) !!}
                <div class="row">
                    <div class="col-md-4 mb-2">
                        {!! Form::label('password', 'Password *', false) !!}
                        <div class="controls">
                            {!! Form::password('password', [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Type password', 'placeholder' => 'Password']) !!}
                            {!! $errors->first('password', '<label class="help-block text-danger">:message</label>') !!}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <a href="{{ route('admin.owner.list') }}" class="btn btn-info">Cancel</a>
                        {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@push('custom_js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
    <script type="text/javascript" src="{{ asset('app-assets/pages/country.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/select/form-select2.js')}}"></script>
@endpush
