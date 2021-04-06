@extends('admin.layout.master')

@section('web_settings','open')
@section('faq','active')

@section('title') @lang('web_setting.faq_create') @endsection
@section('page-name') @lang('web_setting.faq_create') @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard')  </a></li>
    <li class="breadcrumb-item active">@lang('web_setting.faq_create') </li>
@endsection
<?php 
$parent_cat_combo = $data['parent_category_combo'] ?? array();
?>

@section('content')

<section id="basic-form-layouts">
    <div class="row match-height">
        <div class="col-md-6">
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
                            {!! Form::open([ 'route' => 'admin.faq.store', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate']) !!}
                                <div class="row">
                                 <div class="col-12">
                                    <div class="form-group {!! $errors->has('question') ? 'error' : '' !!}">
                                        <label>@lang('form.faq_question')<span class="text-danger">*</span></label>
                                        <div class="controls">
                                            {!! Form::text('question', null, [ 'class' => 'form-control mb-1', 'placeholder' => 'Enter question', 'data-validation-required-message' => 'This field is required', 'tabindex' => 1 ]) !!}
                                            {!! $errors->first('question', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-12">
                                    <div class="form-group {!! $errors->has('answer') ? 'error' : '' !!}">
                                        <label>@lang('form.faq_answer')<span class="text-danger">*</span></label>
                                        <div class="controls">
                                            {!! Form::textarea('answer', null, [ 'class' => 'form-control mb-1', 'placeholder' => 'Enter answer', 'data-validation-required-message' => 'This field is required', 'tabindex' => 1 ]) !!}
                                            {!! $errors->first('answer', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-actions text-center mt-3">
                            <a href="{{ route('admin.faq.list') }}">
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
