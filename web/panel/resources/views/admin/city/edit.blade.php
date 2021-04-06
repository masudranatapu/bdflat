@extends('admin.layout.master')
@section('Brand','active')
@section('title')
    Update Product Brand
@endsection
@section('page-name')
    Update Product Brand
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('admin_role.breadcrumb_title')  </a></li>
    <li class="breadcrumb-item active">@lang('brand.breadcrumb_sub_title')    </li>
@endsection

@section('content')

<section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-content collapse show">
                                    <div class="card-body">

                                        {!! Form::open([ 'route' => ['product.brand.update', $brand->PK_NO], 'method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate']) !!}
                                        @csrf

                                            <div class="col-md-4 offset-4">
                                                <div class="form-group">
                                                    <label for="code">@lang('form.name')<span class="text-danger">*</span></label>
                                                    <div class="controls">
                                                    {!! Form::text('name', $brand->NAME,[ 'class' => 'form-control mb-1', 'placeholder' => 'Enter name', 'data-validation-required-message' => 'This field is required', 'tabindex' => 1 ]) !!}
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 offset-4">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="bname">@lang('form.code')<span class="text-danger">*</span></label>
                                                        {!! Form::text('code', $brand->CODE,[ 'class' => 'form-control mb-1', 'placeholder' => 'Enter name',  'data-validation-required-message' => 'This field is required', 'tabindex' => 2 ]) !!}
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions text-center mt-3">

                                                    <a href="{{route('product.brand.list')}}"  type="button" class="btn btn-warning mr-1">
                                                        <i class="ft-x"></i>@lang('form.btn_cancle')
                                                    </a>

                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i>@lang('form.btn_update')
                                                </button>
                                        {!! Form::close() !!}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
@endsection
