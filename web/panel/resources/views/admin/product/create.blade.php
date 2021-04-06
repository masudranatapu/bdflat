@extends('admin.layout.master')
<!--push from page-->
@push('custom_css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/selects/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('app-assets/file_upload/image-uploader.min.css')}}">
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
@endpush('custom_css')

@section('Product Management','open')
@section('add_product','active')

@section('title') @lang('product.add_new_product') @endsection

@section('page-name') @lang('product.add_new_product') @endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('admin_role.breadcrumb_title')  </a></li>
<li class="breadcrumb-item active">@lang('admin_role.breadcrumb_sub_title')    </li>
@endsection
<?php
$categories_combo = $data['category_combo'] ?? [];
$vat_class_combo = $data['vat_class_combo'] ?? [];
$brand_combo = $data['brand_combo'] ?? [];

$roles = userRolePermissionArray();
$active_tab = request('tab') ?? 1;
$variant_id = request('variant_id') ?? null;
$type = request('type') ?? null;
$method_name = request()->route()->getActionMethod();



$shipping_method_combo = [
 'AIR' => 'AIR',
 'SEA' => 'SEA'
];

?>
@section('content')
<div class="content-body">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-sm" >
                <!--?php vError($errors) ?-->
                <div class="card-content">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-top-border no-hover-bg nav-justified no-border">
                            <li class="nav-item">
                                <a class="nav-link active" id="productBasic-tab1" data-toggle="tab" href="#productBasic" aria-controls="productBasic" aria-expanded="true">@lang('product.product_info')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="linkIcon1-tab1" @if($method_name == 'getEdit') data-toggle="tab" href="#linkIcon1" aria-controls="linkIcon1" aria-expanded="false" @endif >@lang('product.product_variant')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="linkIconOpt1-tab1" data-toggle="tab" href="#linkIconOpt1" aria-controls="linkIconOpt1">@lang('product.stock_info')</a>
                            </li>
                        </ul>
                        <div class="tab-content border-tab-content">
                            <div role="tabpanel" class="tab-pane active" id="productBasic" aria-labelledby="productBasic-tab1" aria-expanded="true">
                                {!! Form::open([ 'route' => 'admin.product.store', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate']) !!}
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group {!! $errors->has('category') ? 'error' : '' !!}">
                                            <label>{{trans('form.category')}}<span class="text-danger">*</span></label>
                                            <div class="controls">
                                                {!! Form::select('category', $categories_combo, null, ['class'=>'form-control mb-1 select2', 'id' => 'category', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Select category', 'tabindex' => 1, 'data-url' => URL::to('prod_subcategory') ]) !!}
                                                {!! $errors->first('category', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group {!! $errors->has('sub_category') ? 'error' : '' !!}">
                                            <label>{{trans('form.sub_category')}}<span class="text-danger">*</span></label>
                                            <div class="controls">
                                                {!! Form::select('sub_category', array(), null, ['class'=>'form-control mb-1 select2', 'id' => 'sub_category', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Select sub category', 'data-url' => URL::to('get_hscode_by_scat'), 'tabindex' => 2] ) !!}
                                                {!! $errors->first('sub_category', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group {!! $errors->has('brand') ? 'error' : '' !!}">
                                            <label>{{trans('form.brand')}}<span class="text-danger">*</span></label>
                                            <div class="controls">
                                                {!! Form::select('brand', $brand_combo, null, ['class'=>'form-control mb-1 select2', 'id' => 'brand','data-validation-required-message' => 'This field is required', 'placeholder' => 'Select brand', 'tabindex' => 3, 'data-url' => URL::to('prod_model')]) !!}
                                                {!! $errors->first('brand', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group {!! $errors->has('prod_model') ? 'error' : '' !!}">
                                            <label>{{trans('form.model')}}<span class="text-danger">*</span></label>
                                            <div class="controls">
                                                {!! Form::select('prod_model', array(), null, ['class'=>'form-control mb-1 select2 prod_model_add', 'id' => 'prod_model','data-validation-required-message' => 'This field is required', 'placeholder' => 'Select model', 'tabindex' => 4]) !!}
                                                {!! $errors->first('prod_model', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group {!! $errors->has('name') ? 'error' : '' !!}">
                                            <label>{{trans('form.generic_name')}}<span class="text-danger">*</span></label>
                                            <div class="controls">
                                                {!! Form::text('name', null, [ 'class' => 'form-control mb-1', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter product name', 'tabindex' => 5]) !!}
                                                {!! $errors->first('name', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-3">
                                        <div class="form-group {!! $errors->has('customs_name') ? 'error' : '' !!}">
                                            <label>{{trans('form.customs_name')}}</label>
                                            <div class="controls">
                                                {!! Form::text('customs_name', null, [ 'class' => 'form-control mb-1', 'placeholder' => 'Enter product customs name', 'tabindex' => 6 ]) !!}
                                                {!! $errors->first('customs_name', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="col-md-3">
                                        <div class="form-group {!! $errors->has('mkt_code') ? 'error' : '' !!}">
                                            <label>{{trans('form.mkt_code')}}<span class="text-danger">*</span></label>
                                            <div class="controls">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text ig_prefix_add" id="basic-addon1" style="height: 34px; line-height: 0;">ig prefix</span>
                                                        </div>
                                                        {!! Form::text('mkt_code', null, [ 'class' => 'form-control mb-1', 'placeholder' => 'Enter product ig code', 'tabindex' => 6, 'aria-describedby' => 'basic-addon1', 'data-validation-required-message' => 'This field is required', 'maxlength' => '8', 'data-validation-maxlength-message' => 'Max length 8 characters']) !!}
                                                         {!! $errors->first('mkt_code', '<label class="help-block text-danger">:message</label>') !!}

                                                </div>

                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-md-3">
                                        <div class="form-group {!! $errors->has('vat_class') ? 'error' : '' !!}">
                                            <label>{{trans('form.vat_class')}}</label>
                                            <div class="controls">
                                                {!! Form::select('vat_class', $vat_class_combo, null, ['class'=>'form-control mb-1 ', 'placeholder' => 'Select vat class', 'tabindex' => 7]) !!}
                                                {!! $errors->first('vat_class', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group {!! $errors->has('hs_code') ? 'error' : '' !!}">
                                            <label>{{trans('form.default_hs_code')}}</label>
                                            <div class="controls">
                                                {!! Form::select('hs_code', array(), null, [ 'class' => 'form-control mb-1', 'placeholder' => 'Enter product HS code', 'tabindex' => 8, 'id' => 'hs_code']) !!}
                                                {!! $errors->first('hs_code', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-3">
                                        <div class="form-group {!! $errors->has('def_shipping_method') ? 'error' : '' !!}">
                                            <label>{{trans('form.default_shipping_method')}}</label>
                                            <div class="controls">
                                                {!! Form::select('def_shipping_method', $shipping_method_combo, 'AIR', ['class'=>'form-control mb-1', 'placeholder' => 'Select def_shipping_method', 'tabindex' => 9]) !!}
                                                {!! $errors->first('def_shipping_method', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>--}}
                                    {{--<div class="col-md-3">
                                        <div class="form-group {!! $errors->has('def_air_freight') ? 'error' : '' !!}">
                                            <label>{{trans('form.default_air_freight')}}</label>
                                            <div class="controls">
                                                {!! Form::number('def_air_freight', null, [ 'class' => 'form-control mb-1', 'placeholder' => 'Enter air freight cost', 'tabindex' => 10,'step' => '0.01', 'data-validation-number-message' => 'Please enter max 2 decimal point' ]) !!}
                                                {!! $errors->first('def_air_freight', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>--}}
                                    {{--<div class="col-md-3">
                                        <div class="form-group {!! $errors->has('def_sea_freight') ? 'error' : '' !!}">
                                            <label>{{trans('form.default_sea_freight')}}</label>
                                            <div class="controls">
                                                {!! Form::number('def_sea_freight', null, [ 'class' => 'form-control mb-1', 'placeholder' => 'Enter sea freight cost', 'tabindex' => 11,'step' => '0.01', 'data-validation-number-message' => 'Please enter max 2 decimal point' ]) !!}
                                                {!! $errors->first('def_sea_freight', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div> --}}



                                    {{--<div class="col-md-3">
                                        <div class="form-group  {!! $errors->has('price') ? 'error' : '' !!}">
                                            <label>{{trans('form.default_price')}}</label>
                                            <div class="controls">
                                                {!! Form::number('def_price', null, [ 'class' => 'form-control mb-1', 'placeholder' => 'Enter price for fixed', 'tabindex' => 12, 'step' => '0.01', 'data-validation-number-message' => 'Please enter max 2 decimal point' ]) !!}
                                                {!! $errors->first('def_price', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>--}}
                                    {{--<div class="col-md-3">
                                        <div class="form-group {!! $errors->has('price_ins') ? 'error' : '' !!}">
                                            <label>{{trans('form.default_price_ins')}}</label>
                                            <div class="controls">
                                                {!! Form::number('def_price_ins', null, ['class' => 'form-control mb-1', 'placeholder' => 'Enter price for installment', 'tabindex' => 13, 'step' => '0.01', 'data-validation-number-message' => 'Please enter max 2 decimal point']) !!}
                                                {!! $errors->first('def_price_ins', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>--}}
                                    {{--<div class="col-md-3">
                                        <div class="form-group {!! $errors->has('def_local_postage') ? 'error' : '' !!}">
                                            <label>{{trans('form.default_local_postage')}}</label>
                                            <div class="controls">
                                                {!! Form::number('def_local_postage', null, [ 'class' => 'form-control mb-1', 'placeholder' => 'Enter postage cost for local', 'tabindex' => 14, 'step' => '0.01', 'data-validation-number-message' => 'Please enter max 2 decimal point']) !!}
                                                {!! $errors->first('def_local_postage', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>--}}
                                    {{--<div class="col-md-3">
                                        <div class="form-group {!! $errors->has('def_local_postage') ? 'error' : '' !!}">
                                            <label>{{trans('form.default_interdistric_postage')}}</label>
                                            <div class="controls">
                                                {!! Form::number('def_int_postage', null, [ 'class' => 'form-control mb-1', 'placeholder' => 'Enter postage cost for interdistrict', 'tabindex' => 15, 'step' => '0.01', 'data-validation-number-message' => 'Please enter max 2 decimal point']) !!}
                                                {!! $errors->first('def_int_postage', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>--}}

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <br>
                                            <div class="controls">
                                                <label><input type="checkbox" name="is_barcode_by_mfg" checked="true"> <small>{{ trans('form.is_barcode_by_manufacturer') }} </small></label>
                                                {!! $errors->first('is_barcode_by_mfg', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group {!! $errors->has('def_narration') ? 'error' : '' !!}">
                                            <label>{{trans('form.default_description')}}</label>
                                            <div class="controls">
                                                {!! Form::textarea('def_narration', null, [ 'class' => 'form-control mb-1', 'placeholder' => 'Enter short description about the product', 'tabindex' => 16, 'rows' => 3 ]) !!}
                                                {!! $errors->first('def_narration', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="input-field">
                                                <label class="active">{{trans('form.default_product_photos')}}</label>
                                                <div class="prod_def_photo_upload" style="padding-top: .5rem;" title="Click for photo upload"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-actions text-center">
                                            <a href="{{route('admin.product.list')}}" class="btn btn-warning mr-1"><i class="ft-x"></i> {{ trans('form.btn_cancle') }}</a>
                                            <button type="submit" class="btn bg-primary bg-darken-1 text-white">
                                             <i class="la la-check-square-o"></i> {{ trans('form.btn_save') }} </button>
                                         </div>
                                     </div>
                                 </div>
                                 {!! Form::close() !!}
                             </div>
                             <div class="tab-pane" id="linkIcon1" role="tabpanel" aria-labelledby="linkIcon1-tab1" aria-expanded="false">
                                <p>Chocolate bar gummies sesame snaps. Liquorice cake sesame snaps cotton candy cake sweet brownie.
                                    Cotton candy candy canes brownie. Biscuit pudding sesame snaps pudding pudding sesame snaps biscuit
                                    tiramisu.
                                </p>
                            </div>
                            <div class="tab-pane" id="linkIconOpt1" role="tabpanel" aria-labelledby="linkIconOpt1-tab1" aria-expanded="false">
                                <p>Cookie icing tootsie roll cupcake jelly-o sesame snaps. Gummies cookie dragée cake jelly marzipan
                                    donut pie macaroon. Gingerbread powder chocolate cake icing. Cheesecake gummi bears ice cream
                                    marzipan.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Recent Transactions -->
</div>
@endsection
<!--push from page-->
@push('custom_js')
<script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{ asset('app-assets/js/scripts/forms/select/form-select2.js')}}"></script>
<script type="text/javascript" src="{{ asset('app-assets/file_upload/image-uploader.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('app-assets/pages/product.js')}}"></script>

<script>
   $(function () {

     $('.prod_def_photo_upload').imageUploader();


     });

 </script>

 @endpush('custom_js')
