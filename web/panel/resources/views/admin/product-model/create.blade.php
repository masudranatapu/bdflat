@extends('admin.layout.master')

@section('web_settings','open')
@section('product_model','active')

@section('title') Create Product Model @endsection

@section('page-name') Create Product Model @endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('user_group.breadcrumb_title')</a></li>
<li class="breadcrumb-item active">@lang('user_group.product_model_page_model') </li>
@endsection


<?php 

$brand_combo            = [];
$category_combo         = $data['category'] ?? [];
$subcategory_combo      = array();
$brand_id               = request()->get('brand') ?? null;

?>
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
    <div class="card-content collapse show">
        <div class="card-body">
            {!! Form::open([ 'route' => 'admin.product-model.store', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate']) !!}
            @csrf
            <div class="form-body">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group {!! $errors->has('category') ? 'error' : '' !!}">
                            <label>{{trans('form.category')}}<span class="text-danger">*</span></label>
                            <div class="controls">
                                {!! Form::select('category', $category_combo, null, ['class'=>'form-control mb-1 select2', 'id' => 'category','data-validation-required-message' => 'This field is required', 'placeholder' => 'Select category', 'tabindex' => 2, 'data-url' => URL::to('prod_subcategory')]) !!}
                                {!! $errors->first('category', '<label class="help-block text-danger">:message</label>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {!! $errors->has('sub_category') ? 'error' : '' !!}">
                            <label>{{trans('form.sub_category')}}<span class="text-danger">*</span></label>
                            <div class="controls">
                                {!! Form::select('sub_category', $subcategory_combo, null, ['class'=>'form-control mb-1 select2', 'id' => 'sub_category',  'placeholder' => 'Select subcategory', 'data-validation-required-message' => 'This field is required', 'tabindex' => 1, 'id' => 'sub_category', 'data-url' => URL::to('get_brand')  ]) !!}
                                {!! $errors->first('sub_category', '<label class="help-block text-danger">:message</label>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {!! $errors->has('brand') ? 'error' : '' !!}">
                            <label>{{trans('form.brand')}}<span class="text-danger">*</span></label>
                            <div class="controls">
                                {!! Form::select('brand', $brand_combo, $brand_id, ['class'=>'form-control mb-1 select2', 'id' => 'brand','data-validation-required-message' => 'This field is required', 'placeholder' => 'Select brand', 'tabindex' => 1, 'id' => 'brand_id']) !!}
                                {!! $errors->first('brand', '<label class="help-block text-danger">:message</label>') !!}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group {!! $errors->has('name') ? 'error' : '' !!}">
                            <label>@lang('form.name')<span class="text-danger">*</span></label>
                            <div class="controls">
                                {!! Form::text('name', null, [ 'class' => 'form-control mb-1', 'placeholder' => 'Enter product model name', 'data-validation-required-message' => 'This field is required', 'tabindex' => 2 ]) !!}
                                {!! $errors->first('name', '<label class="help-block text-danger">:message</label>') !!}
                            </div>
                        </div>
                    </div>

                </div>



                <div class="form-actions text-center mt-3">
                    <a href="{{route('admin.product-model')}}">
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
@endsection

@push('custom_js')
<script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>\
<script src="{{ asset('app-assets/js/scripts/forms/select/form-select2.js')}}"></script>
 <script src="{{ asset('app-assets/pages/product.js')}}"></script>
<script type="text/javascript">
    

    /*Brand by subcategory*/
    $(document).on('change','#sub_category', function(){
        var id      = $(this).val();
        var url     = $(this).attr('data-url');
        var pageurl = url+'/'+id;


        $.ajax({
            type:'get',
            url:pageurl,
            async :true,
            beforeSend: function () {
                $("body").css("cursor", "progress");
            },
            success: function (data) {
                if(data != '' ){
                    $('#brand_id').html(data);
                } else {
                    $('#brand_id').html("<option value=''>data not found</option>");
                }
                
            },
            complete: function (data) {
                $("body").css("cursor", "default");

            }
        });

    });
</script>
@endpush
