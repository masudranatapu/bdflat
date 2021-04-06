@extends('admin.layout.master')
@section('web_settings','open')
@section('product_brand','action')

@section('title') Update Product Brand @endsection

@section('page-name') Update Product Brand @endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('admin_role.breadcrumb_title')  </a></li>
<li class="breadcrumb-item active">@lang('brand.breadcrumb_sub_title')    </li>
@endsection

<?php 
$category_combo     = $data['category'] ?? array();
$subcategory_combo  = $data['subcategory'] ?? array();
$row                = $data['row'];

?>

@push('custom_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/selects/select2.min.css') }}">
@endpush

@section('content')

<section id="basic-form-layouts">
    <div class="row match-height">
        <div class="col-md-12">
            <div class="card">
                <div class="card-content collapse show">
                    <div class="card-body">
                        <?php vError($errors) ?>
                        {!! Form::open([ 'route' => ['admin.brand.update', $row->pk_no], 'method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate']) !!}

                        <div class="row">
                            
                            <div class="col-md-4 offset-4">
                                <div class="form-group {!! $errors->has('category') ? 'error' : '' !!}">
                                    <label>{{trans('form.category')}}<span class="text-danger">*</span></label>
                                    <div class="controls">
                                        {!! Form::select('category', $category_combo, $row->cat_pk_no, ['class'=>'form-control mb-1 select2', 'id' => 'category','data-validation-required-message' => 'This field is required', 'placeholder' => 'Select category', 'tabindex' => 2, 'data-url' => URL::to('prod_subcategory')]) !!}
                                        {!! $errors->first('category', '<label class="help-block text-danger">:message</label>') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 offset-4">
                                <div class="form-group {!! $errors->has('sub_category') ? 'error' : '' !!}">
                                    <label>{{trans('form.sub_category')}}<span class="text-danger">*</span></label>
                                    <div class="controls">
                                        {!! Form::select('sub_category', $subcategory_combo, $row->scat_pk_no, ['class'=>'form-control mb-1 select2', 'id' => 'sub_category', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Select sub category', 'data-url' => URL::to('get_hscode_by_scat'), 'tabindex' => 2] ) !!}
                                        {!! $errors->first('sub_category', '<label class="help-block text-danger">:message</label>') !!}
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4 offset-4">
                                <div class="form-group {!! $errors->has('name') ? 'error' : '' !!}">
                                    <label>@lang('form.brand_name')<span class="text-danger">*</span></label>
                                    <div class="controls">
                                        {!! Form::text('name', $row->name, [ 'class' => 'form-control mb-1', 'placeholder' => 'Enter product name', 'data-validation-required-message' => 'This field is required', 'tabindex' => 1 ]) !!}
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
                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('custom_js')
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/select/form-select2.js')}}"></script>
    <script src="{{ asset('app-assets/pages/product.js')}}"></script>
@endpush
