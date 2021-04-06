@extends('admin.layout.master')

@section('web_settings','open')
@section('cities','active')

@section('title') Create City @endsection
@section('page-name') Create City @endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('admin_role.breadcrumb_title')  </a></li>
<li class="breadcrumb-item active"> City </li>
@endsection

<?php 
$country_combo = $data['country_combo'] ?? array();

?>


@section('content')
<section id="basic-form-layouts">
    <div class="row match-height">
        <div class="col-md-12">
            <div class="card">
                <div class="card-content collapse show">
                    <div class="card-body">
                        {!! Form::open([ 'route' => 'admin.city.store', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate']) !!}

                        <div class="row">
                            <div class="col-md-4 offset-4">
                                <div class="form-group {!! $errors->has('country') ? 'error' : '' !!}">
                                    <label>{{trans('form.country')}}<span class="text-danger">*</span></label>
                                    <div class="controls">
                                        {!! Form::select('country', $country_combo, null, ['class'=>'form-control mb-1 select2', 'id' => 'country',  'placeholder' => 'Select country', 'data-validation-required-message' => 'This field is required', 'tabindex' => 2 ]) !!}
                                        {!! $errors->first('country', '<label class="help-block text-danger">:message</label>') !!}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 offset-4">
                                <div class="form-group {!! $errors->has('name') ? 'error' : '' !!}">
                                    <label>@lang('form.name')<span class="text-danger">*</span></label>
                                    <div class="controls">
                                        {!! Form::text('name', null, [ 'class' => 'form-control mb-1', 'placeholder' => 'Enter city name', 'data-validation-required-message' => 'This field is required', 'tabindex' => 1 ]) !!}
                                        {!! $errors->first('name', '<label class="help-block text-danger">:message</label>') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions text-center mt-3">
                            <a href="{{ route('admin.brand.list') }}">
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
@endsection
