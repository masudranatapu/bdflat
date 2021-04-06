@extends('admin.layout.master')

@section('web_settings','open')
@section('product_type','active')

@section('title') Product Type @endsection
@section('page-name') Product Type @endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('color.breadcrumb_title')  </a></li>
<li class="breadcrumb-item active">Product Type</li>
@endsection

@php
    $category_combo     = $data['category'] ?? [];
    $sub_category_combo = $data['sub_category'] ?? [];
    $row = $data['row'] ?? null;

@endphp

@push('custom_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/selects/select2.min.css') }}">
@endpush

@section('content')
        <div class="card" style="height: 588.5px;">
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
            @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif  
            <div class="card-content collapse show">
                <div class="card-body">
                    {!! Form::open([ 'route' => ['admin.product_type.update', $row->pk_no], 'method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate']) !!}
                        @csrf
                        <div class="form-body">
                                    <div class="row">
                                        

                                
                                 <div class="col-md-6 offset-3">
                                    <div class="form-group {!! $errors->has('category') ? 'error' : '' !!}">
                                        <label>{{trans('form.category')}}<span class="text-danger">*</span></label>
                                        <div class="controls">
                                            {!! Form::select('category', $category_combo, $row->cat_pk_no, ['class'=>'form-control mb-1 select2', 'id' => 'category','data-validation-required-message' => 'This field is required', 'placeholder' => 'Select category', 'tabindex' => 2, 'data-url' => URL::to('prod_subcategory')]) !!}
                                            {!! $errors->first('category', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 offset-3">
                                    <div class="form-group {!! $errors->has('sub_category') ? 'error' : '' !!}">
                                        <label>{{trans('form.sub_category')}}<span class="text-danger">*</span></label>
                                        <div class="controls">
                                            {!! Form::select('sub_category', $sub_category_combo, $row->scat_pk_no, ['class'=>'form-control mb-1 select2', 'id' => 'sub_category', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Select sub category', 'data-url' => URL::to('get_hscode_by_scat'), 'tabindex' => 2] ) !!}
                                            {!! $errors->first('sub_category', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 offset-3">
                                    <div class="form-group {!! $errors->has('name') ? 'error' : '' !!}">
                                        <label>@lang('form.type')<span class="text-danger">*</span></label>
                                        <div class="controls">
                                            {!! Form::text('name', $row->name, [ 'class' => 'form-control mb-1', 'placeholder' => 'Enter product type', 'tabindex' => 2 ]) !!}
                                            {!! $errors->first('name', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="form-actions text-center">


                                <a type="button" href="{{ route('admin.product_type.list')}}" class="btn btn-warning mr-1">
                                    <i class="ft-x"></i>@lang('form.btn_cancle')
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
@endsection

@push('custom_js')
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>\
    <script src="{{ asset('app-assets/js/scripts/forms/select/form-select2.js')}}"></script>
    <script src="{{ asset('app-assets/pages/product.js')}}"></script>
@endpush
