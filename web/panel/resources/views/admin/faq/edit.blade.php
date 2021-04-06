@extends('admin.layout.master')

@section('Web Setting','open')
@section('faq','active') 

@section('title') @lang('web_setting.faq_edit') @endsection
@section('page-name') @lang('web_setting.faq_edit') @endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('admin_role.breadcrumb_title')  </a></li>
<li class="breadcrumb-item active">@lang('web_setting.faq_edit')    </li>
@endsection

<?php 
$parent_cat_combo = $data['parent_category_combo'] ?? array();
$row = $data['data'];


?>

@section('content')
<section id="basic-form-layouts">
    <div class="row match-height">
        <div class="col-md-6">
            <div class="card">
                <div class="card-content collapse show">
                    <div class="card-body">
                        {!! Form::open([ 'route' => ['admin.faq.update', $row->pk_no], 'method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate']) !!}
                        <input type="hidden" name="pk_no" value="{{$row->pk_no}}" />
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group {!! $errors->has('name') ? 'error' : '' !!}">
                                        <label>Question<span class="text-danger">*</span></label>
                                        <div class="controls">
                                            {!! Form::text('question', $row->question, [ 'class' => 'form-control mb-1', 'placeholder' => 'Enter question', 'data-validation-required-message' => 'This field is required', 'tabindex' => 2 ]) !!}
                                            {!! $errors->first('question', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group {!! $errors->has('answer') ? 'error' : '' !!}">
                                        <label>@lang('form.faq_answer')<span class="text-danger">*</span></label>
                                        <div class="controls">
                                            {!! Form::textarea('answer', $row->answer, [ 'class' => 'form-control mb-1', 'placeholder' => 'Enter answer', 'data-validation-required-message' => 'This field is required', 'tabindex' => 1 ]) !!}
                                            {!! $errors->first('answer', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="form-actions text-center mt-3">
                                    <a href="{{ route('admin.area.list') }}">
                                        <button type="button" class="btn btn-warning mr-1">
                                            <i class="ft-x"></i>@lang('form.btn_cancle')
                                        </button>
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="la la-check-square-o"></i>Update
                                    </button>
                                </div> 
                            
                           
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
