@extends('admin.layout.master')

@section('Web Setting','open')
@section('faq','active') 

@section('title') @lang('web_setting.faq_view') @endsection
@section('page-name') @lang('web_setting.faq_view') @endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('admin_role.breadcrumb_title')  </a></li>
<li class="breadcrumb-item active">@lang('web_setting.faq_view')    </li>
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
                        <input type="hidden" name="pk_no" value="{{$row->pk_no}}" />
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group {!! $errors->has('name') ? 'error' : '' !!}">
                                        <label>Question</label>
                                        <input type="text" readonly="" name="" class="form-control" value="{{$row->question}}">
                                     </div>
                                  </div>
                                <div class="col-12">
                                    <div class="form-group {!! $errors->has('answer') ? 'error' : '' !!}">
                                        <label>Answer</label>
                                        <textarea rows="5" readonly="" class="form-control">{{$row->answer}}</textarea>
                                    </div>
                                </div>
                                </div>
                                </div>
                                <div class="form-actions text-center mt-3 mb-3">
                                    <a href="{{ route('admin.faq.list') }}">
                                        <button type="button" class="btn btn-warning mr-1">
                                            <i class="ft-x"></i>Back
                                        </button>
                                    </a>
                                </div> 
                            
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
