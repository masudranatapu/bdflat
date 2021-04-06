@extends('admin.layout.master')

@section('Sales Agent','open')
@section('add_customer','active')

@section('title') @lang('customer.add_new_customer') @endsection
@section('page-name') @lang('customer.add_new_customer') @endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">@lang('admin_role.breadcrumb_title')  </a></li>
<li class="breadcrumb-item active">@lang('customer.breadcrumb_sub_title')    </li>
@endsection

<?php

$roles = userRolePermissionArray();
$method_name = request()->route()->getActionMethod();


?>

<!--push from page-->
@push('custom_css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/selects/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('app-assets/file_upload/image-uploader.min.css')}}">
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
@endpush('custom_css')

@section('content')

<div class="content-body">
    <section id="pagination">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-sm">
                    <div class="card-header">

                        @if(hasAccessAbility('new_role', $roles))
                        <a class="btn btn-round btn-sm btn-primary text-white" href="{{route('admin.customer.create')}}" title="ADD NEW PRODUCT CUSTOMER"><i class="ft-plus text-white"></i> @lang('customer.customer_create_btn')</a>
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
                            {!! Form::open([ 'route' => 'admin.customer.store', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate', 'autocomplete' => 'off']) !!}
                          
                                                           

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group {!! $errors->has('name') ? 'error' : '' !!}">
                                        <label>{{trans('form.name')}}<span class="text-danger">*</span></label>
                                        <div class="controls">
                                            {!! Form::text('name',  null, ['class'=>'form-control mb-1', 'id' => 'name', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter Name', 'tabindex' => 1, 'autocomplete' => 'off'  ]) !!}
                                            {!! $errors->first('name', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {!! $errors->has('email') ? 'error' : '' !!}">
                                        <label>{{trans('form.email')}}</label>
                                        <div class="controls">
                                            {!! Form::email('email',  null, ['class'=>'form-control mb-1', 'id' => 'email', 'data-validation-required-message' => 'This field is required',  'placeholder' => 'Enter Email', 'tabindex' => 4, 'autocomplete' => 'off' ]) !!}
                                            {!! $errors->first('email', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group {!! $errors->has('password') ? 'error' : '' !!}">
                                        <label>{{trans('form.password')}}<span class="text-danger">*</span></label>
                                        <div class="controls">
                                            {!! Form::text('password', null, [ 'class' => 'form-control mb-1', 'minlength' => '6', 'data-validation-required-message' => 'This field is required', 'data-validation-minlength-message' => 'Minimum 6 characters', 'placeholder' => 'Enter password', 'tabindex' => 2, 'autocomplete' => 'off']) !!}
                                            {!! $errors->first('password', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group {!! $errors->has('password_confirmation') ? 'error' : '' !!}">
                                        <label>{{trans('form.password_confirmation')}}<span class="text-danger">*</span></label>
                                        <div class="controls">
                                            {!! Form::text('passwordAgain', null, [ 'class' => 'form-control mb-1', 'minlength' => '6', 'data-validation-matches-match' => 'password', 'data-validation-matches-message' => 'Must match with password', 'data-validation-minlength-message' => 'Minimum 6 characters', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter password', 'tabindex' => 2, 'autocomplete' => 'off']) !!}
                                            {!! $errors->first('password_confirmation', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="form-actions text-center mt-3">
                                <a href="{{ route('admin.customer.list') }}">
                                    <button type="button" class="btn btn-warning mr-1">
                                        <i class="ft-x"></i>@lang('form.btn_cancle')
                                    </button>
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="la la-check-square-o"></i>@lang('form.btn_save')
                                </button>
                                

                            </div>
                            {!! Form::close() !!}
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
