@extends('admin.layout.master')
@section('Web Info','active')
@section('title')
    General Web Info
@endsection
@section('page-name')
    General Web Info
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('payment.breadcrumb_title')  </a></li>
    <li class="breadcrumb-item active">@lang('general.general_sub_title')</li>
@endsection
@push('custom_css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/fileupload/bootstrap-fileupload.css') }}">
@endpush('custom_css')
@php
    $webinfo = $data['webinfo'];
@endphp
@section('content')
<section id="basic-form-layouts" class="min-height">
    <div class="row match-height">
        <div class="col-md-8">
         <div class="card card-success min-height">
            <div class="card-content collapse show">
               <div class="card-body">
                  {!! Form::open([ 'route' => 'admin.web.info', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate']) !!}
                  <div class="row">
                    <div class="col-md-12">
                        <div class="form-group {!! $errors->has('meta_title') ? 'error' : '' !!}">
                           <label>META TITLE</label>
                           <div class="controls">
                              {!! Form::text('meta_title', $webinfo->META_TITLE, [ 'class' => 'form-control mb-1', 'placeholder' => 'Enter meta title', 'tabindex' => 5]) !!}
                              {!! $errors->first('meta_title', '<label class="help-block text-danger">:message</label>') !!}
                           </div>
                        </div>
                     </div>
                    <div class="col-md-12">
                        <div class="form-group {!! $errors->has('meta_keywords') ? 'error' : '' !!}">
                           <label>META KEYWORDS</label>
                           <div class="controls">
                              {!! Form::textarea('meta_keywords', $webinfo->META_KEYWORDS, [ 'class' => 'form-control mb-1', 'placeholder' => 'Enter meta keywords', 'tabindex' => 6,'rows'=>'4','cols'=>'10' ]) !!}
                              {!! $errors->first('meta_keywords', '<label class="help-block text-danger">:message</label>') !!}
                           </div>
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group {!! $errors->has('meta_description') ? 'error' : '' !!}">
                           <label>META DESCRIPTION</label>
                           <div class="controls">
                              {!! Form::textarea('meta_description', $webinfo->META_DESC, [ 'class' => 'form-control mb-1', 'placeholder' => 'Enter meta description', 'tabindex' => 7,'rows'=>'4','cols'=>'10' ]) !!}
                              {!! $errors->first('meta_description', '<label class="help-block text-danger">:message</label>') !!}
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-4">
                        <div class="form-group {!! $errors->has('is_active') ? 'error' : '' !!}">
                           <label class="active">Upload Favicon</label>
                           <div class="controls">
                              <div class="fileupload @if(!empty($webinfo->FAV_PATH))  {{'fileupload-exists'}} @else {{'fileupload-new'}} @endif " data-provides="fileupload" >
                                 <span class="fileupload-preview fileupload-exists thumbnail" style="max-width: 150px; max-height: 120px;">
                                 @if(!empty($webinfo->FAV_PATH))
                                 <img src="{{asset($webinfo->FAV_PATH)}}" alt="Photo" class="img-fluid" height="150px" width="120px"/>
                                 @endif
                                 </span>
                                 <span>
                                 <label class="btn btn-primary btn-rounded btn-file btn-sm">
                                 <span class="fileupload-new">
                                 <i class="la la-file-image-o"></i> Select Image
                                 </span>
                                 <span class="fileupload-exists">
                                 <i class="la la-reply"></i> Change
                                 </span>
                                 {!! Form::file('fav_icon', Null,[ 'class' => 'form-control mb-1', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'IS ACTIVE', 'tabindex' => 8]) !!}
                                 </label>
                                 <a href="#" class="btn fileupload-exists btn-default btn-rounded  btn-sm" data-dismiss="fileupload" id="remove-thumbnail">
                                 <i class="la la-times"></i> Remove
                                 </a>
                                 </span>
                                 <br>
                                 <span class="MainToUpload edit-3-color" style="font-size: 12px; color: #bf4c4c;">File types jpg, png.</span>
                              </div>
                              {!! $errors->first('fav_icon', '<label class="help-block text-danger">:message</label>') !!}
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group {!! $errors->has('is_active') ? 'error' : '' !!}">
                           <label class="active">Upload Logo</label>
                           <div class="controls">
                              <div class="fileupload @if(!empty($webinfo->LOGO_PATH))  {{'fileupload-exists'}} @else {{'fileupload-new'}} @endif " data-provides="fileupload" >
                                 <span class="fileupload-preview fileupload-exists thumbnail" style="max-width: 150px; max-height: 120px;">
                                 @if(!empty($webinfo->LOGO_PATH))
                                 <img src="{{asset($webinfo->LOGO_PATH)}}" alt="Photo" class="img-fluid" height="150px" width="120px"/>
                                 @endif
                                 </span>
                                 <span>
                                 <label class="btn btn-primary btn-rounded btn-file btn-sm">
                                 <span class="fileupload-new">
                                 <i class="la la-file-image-o"></i> Select Image
                                 </span>
                                 <span class="fileupload-exists">
                                 <i class="la la-reply"></i> Change
                                 </span>
                                 {!! Form::file('site_logo', Null,[ 'class' => 'form-control mb-1', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'IS ACTIVE', 'tabindex' => 9]) !!}
                                 </label>
                                 <a href="#" class="btn fileupload-exists btn-default btn-rounded  btn-sm" data-dismiss="fileupload" id="remove-thumbnail">
                                 <i class="la la-times"></i> Remove
                                 </a>
                                 </span>
                                 <br>
                                 <span class="MainToUpload edit-3-color" style="font-size: 12px; color: #bf4c4c;">File types jpg, png.</span>
                              </div>
                              {!! $errors->first('site_logo', '<label class="help-block text-danger">:message</label>') !!}
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="form-actions text-center mt-3">
                     <a href="{{ route('product.category.list') }}">
                     <button type="button" class="btn btn-warning mr-1" title="Cancel">
                     <i class="ft-x"></i> @lang('form.btn_cancle')
                     </button>
                     </a>
                     <button type="submit" class="btn btn-primary" title="Save">
                     <i class="la la-check-square-o"></i> @lang('form.btn_save')
                     </button>
                  </div>
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
<script type="text/javascript" src="{{ asset('app-assets/vendors/fileupload/bootstrap-fileupload.min.js') }}"></script>
@endpush('custom_js')
