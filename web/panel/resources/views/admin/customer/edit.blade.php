@extends('admin.layout.master')

@section('Customer Management','open')
@section('customer_list','active')

@section('title') @lang('customer.add_new_customer') @endsection
@section('page-name') @lang('customer.add_new_customer') @endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">@lang('admin_role.breadcrumb_title')  </a></li>
<li class="breadcrumb-item active">@lang('customer.breadcrumb_sub_title')    </li>
@endsection

<?php

$roles = userRolePermissionArray();
$method_name = request()->route()->getActionMethod();
$row = $data['row'];
$city_combo = $data['city'] ?? array();
$division_combo = $data['division'] ?? array();

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
                            {!! Form::open([ 'route' => ['admin.customer.update', $row->id], 'method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate', 'autocomplete' => 'off']) !!}
                            @csrf
                            <input type="hidden" name="location_type" value="" id="location_type" />
                            <input type="hidden" name="pk_no" value="{{$row->id}}" />



                                                           
                            <h5><label>{{trans('form.email')}} : <strong>{{$row->email}}</strong></label></h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group {!! $errors->has('name') ? 'error' : '' !!}">
                                        <label>{{trans('form.name')}}<span class="text-danger">*</span></label>
                                        <div class="controls">
                                            {!! Form::text('name',  $row->name, ['class'=>'form-control mb-1', 'id' => 'name', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter Name', 'tabindex' => 1, 'autocomplete' => 'off'  ]) !!}
                                            {!! $errors->first('name', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group {!! $errors->has('location') ? 'error' : '' !!}">
                                        <label>{{trans('form.location')}}</label>
                                        <div class="controls">
                                            <select id="location" class="form-control mb-1" name="location" >

                                                <option value="">Location</option>
                                                @if($city_combo)
                                                <optgroup label="City">
                                                @foreach($city_combo as $key => $city)
                                                <option value="{{$city->pk_no}}" data-type="city" data-url="{{route('get-area-by-location',['city',$city->pk_no])}}">{{$city->name}}</option>
                                                @endforeach
                                                </optgroup>
                                                @endif
                                                @if($division_combo)
                                                <optgroup label="Division">
                                                @foreach($division_combo as $key => $divis)
                                                <option value="{{$divis->pk_no}}" data-type="division" data-url="{{route('get-area-by-location',['division',$city->pk_no])}}">{{$divis->name}}</option>
                                                @endforeach
                                                 </optgroup>
                                                @endif

                                            </select>
                                            
                                            {!! $errors->first('location', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group {!! $errors->has('area') ? 'error' : '' !!}">
                                        <label>{{trans('form.area')}}</label>
                                        <div class="controls">
                                            <select class="form-control mb-1" name="area" id="area">
                                                <option value="">Area</option>
                                            </select>
                                            
                                            
                                            {!! $errors->first('area', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group {!! $errors->has('password') ? 'error' : '' !!}">
                                        <label>{{trans('form.password')}}<span class="text-danger">*</span></label>
                                        <div class="controls">
                                            {!! Form::text('password', null, [ 'class' => 'form-control mb-1', 'minlength' => '6', 'data-validation-minlength-message' => 'Minimum 6 characters', 'placeholder' => 'Enter password', 'tabindex' => 2, 'autocomplete' => 'off']) !!}
                                            {!! $errors->first('password', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-4 offset-md-4">
                                <br>
                                <br>
                                 <button type="submit" class="btn btn-primary">
                                    <i class="la la-check-square-o"></i>@lang('form.update_basic_info')
                                </button>
                                <br>
                            </div>


                              {!! Form::close() !!}

                            <hr>
                            <br>
                            <br>

                            
                            <div class="form-actions text-center mt-3">

                                <a href="{{ route('admin.customer.list') }}">
                                    <button type="button" class="btn btn-warning mr-1">
                                        <i class="ft-x"></i>@lang('form.btn_cancle')
                                    </button>
                                </a>
                               
                                

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

<script type="text/javascript">
  
</script>
@endpush('custom_js')
