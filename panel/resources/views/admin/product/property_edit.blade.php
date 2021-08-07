@extends('admin.layout.master')

@section('product_list','active')
@section('Product Management','open')

@section('title')
    Property Edit
@endsection

@push('custom_css')
    {{--    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/forms/datepicker/bootstrap-datetimepicker.min.css')}}">--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/selects/select2.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/forms/validation/form-validation.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('/assets/css/forms/datepicker/bootstrap-datetimepicker.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/image_upload/image-uploader.min.css')}}">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link
        href="https://fonts.googleapis.com/css?family=Lato:300,700|Montserrat:300,400,500,600,700|Source+Code+Pro&display=swap"
        rel="stylesheet">

    <style>
        .show_img {
            height: 82px;
            width: 82px;
            object-fit: cover;
        }

        .del_img {
            background: #bbbbbb;
            padding: 2px 7px;
            border-radius: 77px;
            font-weight: bold;
            color: black;
            position: absolute;
            top: 5px;
            right: 20px;
        }

        .del_btn {
            border-radius: 75%;
            height: 26px;
            width: 26px;
            position: absolute;
            right: -8px;
            top: 8px;
        }
    </style>
@endpush

@section('page-name')
    Property Edit
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">@lang('admin_action.breadcrumb_title')</a>
    </li>
    <li class="breadcrumb-item active">Property Edit
    </li>
@endsection
@php
    $roles                      = userRolePermissionArray();
    $data                       = $data ?? [];
    $product                    = $product ?? [];
    $property_types             = $data['property_type'] ?? [];
    $cities                     = $data['city'] ?? [];
    $area                       = $data['area'] ?? [];
    $property_conditions        = $data['property_condition'] ?? [];
    $listing_variants           = $data['listing_variants'] ?? [];
    $floor_lists                = $data['floor_list'] ?? [];
    $property_facing            = $data['property_facing'] ?? [];
    $property_additional_info   = $data['property_additional_info'] ?? [];
    $listing_features           = $data['listing_feature'] ?? [];
    $nearby                     = $data['near_by']  ?? [];
    $property_listing_types     = $data['property_listing_type']  ?? [];
    $property_listing_images    = $data['property_listing_images']  ?? [];
    $features                   = json_decode($property_additional_info->F_FEATURE_NOS) ?? [];
    $near                       = json_decode($property_additional_info->F_NEARBY_NOS) ?? [];
    //dd($area)
    $bed_room = Config::get('static_array.bed_room') ?? [];
    $bath_room = Config::get('static_array.bath_room') ?? [];
@endphp

@section('content')
    <div class="content-body min-height">
        <section id="pagination">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-sm card-success">
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
                                <div class="saleform-wrapper mt-2">
                                    <div class="container">
                                        {{ $errors }}
                                        <div class="form-title mb-2">
                                            <h3>Basic Information</h3>
                                        </div>
                                        <div class="saleform-header mb-2">
                                            <p>Property ID: {{$product->CODE}}</p>
                                            <p>Create Date: {{date('M d, Y', strtotime($product->CREATED_AT))}}</p>
                                            <p>Modified On: {{date('M d, Y', strtotime($product->MODIFIED_AT))}}</p>
                                        </div>
                                        {!! Form::open([ 'route' => ['admin.product.update', $product->PK_NO], 'method' => 'post', 'files' => true , 'novalidate', 'autocomplete' => 'off']) !!}
                                        <div class="row">
                                            <!-- Type User -->
                                            <div class="col-md-6">
                                                <div class="form-group {!! $errors->has('usertype') ? 'error' : '' !!}">
                                                    <div class="controls">
                                                        <label class="label-title">User Type</label>
                                                        {!! Form::radio('usertype','individual', $product->USER_TYPE==2?true:false,[ 'id' => 'individual','data-validation-required-message' => 'This field is required','checked'=>'checked']) !!}
                                                        {{ Form::label('individual','Individual') }}

                                                        {!! Form::radio('usertype','developer', $product->USER_TYPE==3?true:false,[ 'id' => 'developer']) !!}
                                                        {{ Form::label('developer','Developer') }}

                                                        {!! Form::radio('usertype','agency',$product->USER_TYPE==4?true:false,[ 'id' => 'agency']) !!}
                                                        {{ Form::label('agency','Agency') }}

                                                        {!! Form::radio('usertype','agent',$product->USER_TYPE==0?true:false,[ 'id' => 'agent']) !!}
                                                        {{ Form::label('agent','Agent') }}

                                                        {!! $errors->first('usertype', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Advertisment Type -->
                                            <div class="col-md-6">
                                                <div class="form-group {!! $errors->has('alert') ? 'error' : '' !!}">
                                                    <div class="controls">
                                                        <label class="label-title">Advertisement Type
                                                            <span>*</span></label>
                                                        {!! Form::radio('property_for','sell',$product->PROPERTY_FOR=='sell'?true:false,[ 'id' => 'sell','data-validation-required-message' => 'This field is required']) !!}
                                                        {{ Form::label('sell','Sell') }}

                                                        {!! Form::radio('property_for','rent',$product->PROPERTY_FOR=='rent'?true:false,[ 'id' => 'rent']) !!}
                                                        {{ Form::label('rent','Rent') }}

                                                        {!! Form::radio('property_for','roommate',$product->PROPERTY_FOR=='roommate'?true:false,[ 'id' => 'roommate']) !!}
                                                        {{ Form::label('roommate','Roommate') }}

                                                        {!! $errors->first('property_for', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- User Name -->
                                            <div class="col-md-6">
                                                <div
                                                    class="form-group {!! $errors->has('user_name') ? 'error' : '' !!}">
                                                    <div class="controls">
                                                        {{ Form::label('user_name','User Name',['class' => 'label-title']) }}
                                                        {!! Form::text('user_name', $product->getUser->NAME, [ 'class' => 'form-control', 'placeholder' => 'User Name']) !!}
                                                        {!! $errors->first('user_name', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Property Type -->
                                            <div class="col-md-6">
                                                <div
                                                    class="form-group {!! $errors->has('propertyType') ? 'error' : '' !!}">
                                                    <div class="controls">
                                                        {{ Form::label('propertyType','Property Type',['class' => 'label-title']) }}
                                                        {!! Form::select('propertyType',$property_types,$product->F_PROPERTY_TYPE_NO,array('id' => 'propertyType', 'class'=>'form-control propertyType', 'placeholder'=>'Select Property Type')) !!}
                                                        {!! $errors->first('propertyType', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- City -->
                                            <div class="col-md-6">
                                                <div class="form-group {!! $errors->has('city') ? 'error' : '' !!}">
                                                    <div class="controls">
                                                        {!! Form::label('city','City <span>*</span>', ['class' => 'label-title'], false) !!}
                                                        {!! Form::select('city', $cities,$product->F_CITY_NO,array('class'=>'form-control city','data-validation-required-message' => 'This field is required', 'placeholder'=>'Select City')) !!}
                                                        {!! $errors->first('city', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Area (Based on city) -->
                                            <div class="col-md-6">
                                                <div class="form-group {!! $errors->has('area') ? 'error' : '' !!}">
                                                    <div class="controls">
                                                        {!! Form::label('area','Area (Based on City) <span>*</span>', ['class' => 'label-title'], false) !!}
                                                        {!! Form::select('area', $area, $product->F_AREA_NO,array('class'=>'form-control area','data-validation-required-message' => 'This field is required', 'placeholder'=>'Select Area')) !!}
                                                        {!! $errors->first('area', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Address -->
                                            <div class="col-md-6">
                                                <div class="form-group {!! $errors->has('address') ? 'error' : '' !!}">
                                                    <div class="controls">
                                                        {{ Form::label('address','Address <span>*</span>',['class' => 'label-title'],false) }}
                                                        {!! Form::text('address', $product->ADDRESS, [ 'class' => 'form-control address','data-validation-required-message' => 'This field is required', 'placeholder' => 'Address']) !!}
                                                        {!! $errors->first('address', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Condition -->
                                            <div class="col-md-6">
                                                <div
                                                    class="form-group {!! $errors->has('condition') ? 'error' : '' !!}">
                                                    <div class="controls">
                                                        {!! Form::label('condition','Condition <span>*</span>', ['class' => 'label-title'], false) !!}
                                                        {!! Form::select('condition', $property_conditions,$product->F_PROPERTY_CONDITION,array('class'=>'form-control condition','data-validation-required-message' => 'This field is required', 'placeholder'=>'Select Condition')) !!}
                                                        {!! $errors->first('condition', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Ad Title -->
                                            <div class="col-md-6">
                                                <div class="form-group {!! $errors->has('ad_title') ? 'error' : '' !!}">
                                                    <div class="controls">
                                                        {{ Form::label('ad_title','Title for your ad <span>*</span>',['class' => 'label-title '],false) }}
                                                        {!! Form::text('ad_title', $product->TITLE, [ 'class' => 'form-control ad_title','data-validation-required-message' => 'This field is required', 'placeholder' => 'Type here']) !!}
                                                        {!! $errors->first('ad_title', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Property Size & Price -->
                                        <div class="form-title mb-2 mt-2">
                                            <h3>Property Size & Price</h3>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="size_parent">
                                                    @foreach($data['listing_variants'] as $key => $item)
                                                        <div class="row no-gutters form-group size_child"
                                                             style="position: relative">
                                                            <div class="col-6 col-md-3">
                                                                <div
                                                                    class="form-group {!! $errors->has('size') ? 'error' : '' !!}">
                                                                    <div class="controls">
                                                                        {!! Form::number('size[]', $item->PROPERTY_SIZE, [ 'class' => 'form-control',  'placeholder' => 'Size in sft','data-validation-required-message' => 'This field is required']) !!}
                                                                        {!! $errors->first('size', '<label class="help-block text-danger">:message</label>') !!}
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-6 col-md-3 bedroom_div">
                                                                <div
                                                                    class="form-group {!! $errors->has('bedroom') ? 'error' : '' !!}">
                                                                    <div class="controls">
                                                                        {!! Form::select('bedroom[]', $bed_room ?? [], $item->BEDROOM, array('class'=>'form-control', 'placeholder'=>'Bedroom')) !!}
                                                                        {!! $errors->first('bedroom', '<label class="help-block text-danger">:message</label>') !!}
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-6 col-md-3 bathroom_div">
                                                                <div
                                                                    class="form-group {!! $errors->has('bathroom') ? 'error' : '' !!}">
                                                                    <div class="controls">
                                                                        {!! Form::select('bathroom[]', $bath_room ?? [], $item->BATHROOM, array('class'=>'form-control', 'placeholder'=>'Bathroom')) !!}
                                                                        {!! $errors->first('bathroom', '<label class="help-block text-danger">:message</label>') !!}
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-6 col-md-3">
                                                                <div
                                                                    class="form-group {!! $errors->has('price') ? 'error' : '' !!}">
                                                                    <div class="controls">
                                                                        {!! Form::number('price[]', $item->TOTAL_PRICE, ['class' => 'form-control',  'placeholder' => 'Price','data-validation-required-message' => 'This field is required']) !!}
                                                                        {!! $errors->first('price', '<label class="help-block text-danger">:message</label>') !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @if($key!=0)
                                                                <button class="del_btn btn btn-danger btn-xs">✕</button>
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="col-6 col-sm-3"
                                                     style="margin-top: -26px;margin-left: -15px">
                                                    <div class="form-group addSize">
                                                        <a href="javascript:void(0);" id="add_btn">
                                                            <i class="fa fa-plus"></i>
                                                            Add New Size
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="controls">
                                                    <label class="label-title">Property property price is</label>
                                                    {!! Form::radio('property_priceChek','1', $product->PRICE_TYPE==1,[ 'id' => 'fixed','checked'=>'checked']) !!}
                                                    {{ Form::label('fixed','Fixed') }}

                                                    {!! Form::radio('property_priceChek','2', $product->PRICE_TYPE==2,[ 'id' => 'negotiable']) !!}
                                                    {{ Form::label('negotiable','Negotiable') }}

                                                    {!! $errors->first('property_priceChek', '<label class="help-block text-danger">:message</label>') !!}
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-title mb-2 mt-2">
                                            <h3>Additional information</h3>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group {!! $errors->has('floor') ? 'error' : '' !!}">
                                                    <div class="controls">
                                                        {{ Form::label('floor','Total Number of Floor',['class' => 'label-title '],false) }}
                                                        {!! Form::select('floor', $floor_lists,$product->TOTAL_FLOORS,array('class'=>'form-control floor','placeholder'=>'Select Total Floor')) !!}
                                                        {!! $errors->first('floor', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div
                                                    class="form-group {!! $errors->has('floorChek') ? 'error' : '' !!}">
                                                    <div class="controls">
                                                        <label class="label-title">Floor available</label>
                                                        {!! Form::radio('floorChek','ground',null /*$row->PROPERTY_FOR=='sell'?true:false*/,[ 'id' => 'ground','checked'=>'checked']) !!}
                                                        {{ Form::label('ground','Ground Floor') }}

                                                        {!! Form::radio('floorChek','1arFloor',null /*$row->PROPERTY_FOR=='sell'?true:false*/,[ 'id' => '1arFloor']) !!}
                                                        {{ Form::label('1arFloor','1st Floor') }}

                                                        {!! $errors->first('floorChek', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group {!! $errors->has('floor') ? 'error' : '' !!}">
                                                    <div class="controls">
                                                        {{ Form::label('facing','Facing',['class' => 'label-title '],false) }}
                                                        {!! Form::select('facing',$property_facing,$property_additional_info->FACING,array('class'=>'form-control facing','placeholder'=>'Select Facing')) !!}
                                                        {!! $errors->first('facing', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    {{ Form::label('datepicker','Handover Date',['class' => 'label-title']) }}
                                                    <div class="controls">
                                                        {!! Form::text('handover_date', date('d-m-Y', strtotime($property_additional_info->HANDOVER_DATE)), [ 'id'=>'datepicker','class' => 'form-control datetimepicker','placeholder' => 'Handover date','autocomplete' => 'off', 'tabindex' => 1]) !!}
                                                        {!! $errors->first('handover_date', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    {{ Form::label('description','Descriptions',['class' => 'label-title']) }}
                                                    {{--                    <textarea class="form-control" id="description"></textarea>--}}
                                                    <div class="controls">
                                                        {!! Form::textarea('description',$property_additional_info->DESCRIPTION, [ 'id'=>'description','class' => 'form-control', 'placeholder' => 'Type here']) !!}
                                                        {!! $errors->first('description', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Features -->
                                                <div class="form-title mb-2 mt-2">
                                                    <h3>Features</h3>
                                                </div>
                                                <div class="form-group">
                                                    @foreach($listing_features as $key => $listing_feature)
                                                        <div
                                                            class="form-check form-check-inline {!! $errors->has('features') ? 'error' : '' !!}">
                                                            <div class="controls">
                                                                {!! Form::checkbox('features[]',$key, in_array($key,$features),[ 'id' => 'features'.$key]) !!}
                                                                {{ Form::label('features'.$key,$listing_feature) }}
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    {!! $errors->first('features', '<label class="help-block text-danger">:message</label>') !!}
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Facilities within 1km -->
                                                <div class="form-title mb-2 mt-2">
                                                    <h3>Facilities within 1km</h3>
                                                </div>
                                                <div class="form-group">
                                                    @foreach($nearby as $key => $item)
                                                        <div
                                                            class="form-check form-check-inline {!! $errors->has('nearby') ? 'error' : '' !!}">
                                                            <div class="controls">
                                                                {!! Form::checkbox('nearby[]',$key, in_array($key,$near),[ 'id' => 'nearby'.$key]) !!}
                                                                {{ Form::label('nearby'.$key,$item) }}
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    {!! $errors->first('nearby', '<label class="help-block text-danger">:message</label>') !!}
                                                </div>
                                            </div>

                                            <!-- map -->
                                            <div class="col-md-6">
                                                <div class="form-title mb-2 mt-2">
                                                    <h3>Property Location on map</h3>
                                                </div>
                                                <div class="controls">
                                                    {!! Form::text('map_url', $property_additional_info->LOCATION_MAP, [ 'class' => 'form-control',  'placeholder' => 'Paste Your Location Map URL']) !!}
                                                    {!! $errors->first('map_url', '<label class="help-block text-danger">:message</label>') !!}
                                                </div>
                                                <div class="map">
                                                    <iframe
                                                        src="{{$property_additional_info->LOCATION_MAP}}"
                                                        style="border:0; width:100%; height: 250px;" allowfullscreen="" loading="lazy"></iframe>
                                                </div>
                                            </div>

                                            <!-- Image & video -->
                                            <div class="col-md-6">
                                                <div class="form-title mb-2 mt-2">
                                                    <h3>Image & Video</h3>
                                                </div>
                                                <div
                                                    class="row form-group {!! $errors->has('image') ? 'error' : '' !!}">
                                                    <div class="col-sm-8">
                                                        <div class="row">
                                                            @foreach($property_listing_images as $key => $item)
                                                                <div class="col-3 mb-1 remove_img{{$item->PK_NO}}">
                                                                    <a href="javascript:void(0)" class="del_img"
                                                                       data-id="{{$item->PK_NO}}">
                                                                        ✕
                                                                    </a>
                                                                    <img class="show_img"
                                                                         src="{{asset('/')}}{{$item->IMAGE_PATH}}"
                                                                         alt="">
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="controls">
                                                            <div id="imageFile" style="padding-top: .5rem;"></div>
                                                        </div>
                                                        {!! $errors->first('image', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    {{ Form::label('videoURL','Video:',['class' => 'label-title']) }}
                                                    <div class="controls">
                                                        {!! Form::text('videoURL',$property_additional_info->VIDEO_CODE, [ 'id'=>'videoURL','class' => 'form-control','placeholder'=>'Paste your youtube video URL']) !!}
                                                        {!! $errors->first('videoURL', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Property Owner Details -->
                                            <div class="col-md-6">
                                                <div class="form-title mb-2 mt-2">
                                                    <h3>Property Owner Details</h3>
                                                </div>
                                                <div
                                                    class="form-group {!! $errors->has('contact_person') ? 'error' : '' !!}">
                                                    {{ Form::label('contact_person','Contact Person',['class' => 'label-title']) }}
                                                    <div class="controls">
                                                        {!! Form::text('contact_person',$product->CONTACT_PERSON1, [ 'id'=>'contact_person','class' => 'form-control','placeholder'=>'Auto fill owner name except agent user','data-validation-required-message' => 'This field is required']) !!}
                                                        {!! $errors->first('contact_person', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                                <div class="form-group {!! $errors->has('mobile') ? 'error' : '' !!}">
                                                    {{ Form::label('mobile','Mobile',['class' => 'label-title']) }}
                                                    <div class="controls">
                                                        {!! Form::number('mobile',$product->MOBILE1, [ 'id'=>'mobile','class' => 'form-control','data-validation-required-message' => 'This field is required']) !!}
                                                        {!! $errors->first('mobile', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    {{ Form::label('contact_person_2','Second Contact Person:',['class' => 'label-title']) }}

                                                    <div
                                                        class="form-group {!! $errors->has('contact_person_2') ? 'error' : '' !!}">
                                                        <div class="controls">
                                                            {!! Form::text('contact_person_2', old('contact_person_2', $product->CONTACT_PERSON2), [ 'id'=>'contact_person_2','class' => 'form-control','placeholder'=>'Contact person name','data-validation-required-message' => 'This field is required']) !!}
                                                            {!! $errors->first('contact_person_2', '<label class="help-block text-danger">:message</label>') !!}
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    {{ Form::label('mobile_2','Mobile:',['class' => 'label-title']) }}
                                                    <div
                                                        class="form-group {!! $errors->has('mobile_2') ? 'error' : '' !!}">
                                                        <div class="controls">
                                                            {!! Form::number('mobile_2', old('mobile_2', $product->MOBILE2), [ 'id'=>'mobile_2','class' => 'form-control','placeholder'=>'Contact person mobile number','data-validation-required-message' => 'This field is required']) !!}
                                                            {!! $errors->first('mobile_2', '<label class="help-block text-danger">:message</label>') !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- SEO -->
                                            <div class="col-md-6">
                                                <div class="form-title mb-2 mt-2">
                                                    <h3>SEO</h3>
                                                </div>
                                                <div class="form-group">
                                                    <label class="label-title">Title</label>
                                                    <input type="text" class="form-control seoTitle" id="seoTitle">
                                                </div>
                                                <div class="form-group">
                                                    <label class="label-title">Meta descriptions</label>
                                                    <textarea class="form-control" id="metaDescr"></textarea>
                                                </div>
                                            </div>

                                            <!-- Site.com -->
                                            <div class="col-md-6">
                                                <div class="form-title mb-2 mt-2">
                                                    <h3>Site.com/</h3>
                                                </div>
                                                <div class="form-group">
                                                    <input type="url" class="form-control site" id="site">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- Listing Type -->
                                            <div class="col-md-6">
                                                <div class="form-title mb-2 mt-2">
                                                    <h3>Listing Type</h3>
                                                </div>
                                                <div class="form-group listingType">
                                                    <div class="controls">
                                                        @foreach($property_listing_types as $key => $item)
                                                            {!! Form::radio('listing_type',$key, $product->F_LISTING_TYPE==$key?true:false,[ 'id' => 'listing_type'.$key,'data-validation-required-message' => 'This field is required']) !!}
                                                            {{ Form::label('listing_type'.$key,$item) }}
                                                        @endforeach
                                                        {!! $errors->first('listing_type', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Publishing Status -->
                                            <div class="col-md-6">
                                                <div class="form-title mb-2 mt-2">
                                                    <h3>Publishing Status</h3>
                                                </div>
                                                <div class="form-group publishingStatus">
                                                    <input type="radio" {{ $product->STATUS == 0 ? 'checked' : '' }} name="status" value="0"
                                                           id="pending">
                                                    <label for="pending">Pending</label>
                                                    <input type="radio" {{ $product->STATUS == 1 ? 'checked' : '' }} name="status" value="1" id="publish">
                                                    <label for="publish">Published</label>
                                                    <input type="radio" {{ $product->STATUS == 2 ? 'checked' : '' }} name="status" value="2" id="reject">
                                                    <label for="reject">Reject</label>
                                                    <input type="radio" {{ $product->STATUS == 3 ? 'checked' : '' }} name="status" value="3" id="expired">
                                                    <label for="expired">Expired</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- Biling -->
                                            <div class="col-12">
                                                <div class="form-title mb-2 mt-2">
                                                    <h3>Billing information</h3>
                                                </div>
                                                <div class="form-group">
                                                    <div class="billing-amounot">
                                                        <h5>Billin amount: 25 tk</h5>
                                                    </div>
                                                    <input type="radio" checked="" name="billing" value="pending"
                                                           id="pending">
                                                    <label for="pending">Pending</label>
                                                    <input type="radio" name="billing" value="paid" id="paid">
                                                    <label for="paid">Paid</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" checked="" class="custom-control-input"
                                                               id="customSwitch1">
                                                        <label class="custom-control-label" for="customSwitch1">Verified
                                                            BDF</label>
                                                    </div>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="customSwitch2">
                                                        <label class="custom-control-label" for="customSwitch2">Need
                                                            payment to view CI</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mt-2">
                                                <div class="submit-btn">
                                                    <input type="submit" value="Submit">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--  Additional informamtion -->
                                    <input type="hidden" value="{{URL::to('/')}}" id="base_path">
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


@endsection
@push('custom_js')
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/select/form-select2.js')}}"></script>


    <script src="{{asset('/assets/js/forms/datepicker/moment.min.js')}}"></script>
    <script src="{{asset('/assets/js/forms/datepicker/bootstrap-datetimepicker.min.js')}}"></script>

    <script src="{{asset('/assets/css/image_upload/image-uploader.min.js')}}"></script>
    <script>

        $('#imageFile').imageUploader();

        $('.datetimepicker').datetimepicker({
            icons:
                {
                    next: 'fa fa-angle-right',
                    previous: 'fa fa-angle-left'
                },
            format: 'DD-MM-YYYY'
        });

        var basepath = $('#base_path').val();

        $(document).on('change', '#city', function () {
            var id = $(this).val();
            if (id == '') {
                return false;
            }
            $("#area").empty();
            $.ajax({
                type: 'get',
                url: basepath + '/ajax-get-area/' + id,
                async: true,
                dataType: 'json',
                beforeSend: function () {
                    $("body").css("cursor", "progress");
                },
                success: function (response) {
                    $.each(response.area, function (key, value) {
                        var option = new Option(value, key);
                        $("#area").append(option);
                    });
                },
                complete: function (data) {
                    $("body").css("cursor", "default");

                }
            });
        });

        $(document).on('click', '#add_btn', function () {
            $.ajax({
                type: 'get',
                data: {property_type: $('#propertyType').val()},
                url: '{{ route('admin.product.ajax.get.variant') }}',
                async: true,
                dataType: 'json',
                beforeSend: function () {
                    $("body").css("cursor", "progress");
                },
                success: function (response) {
                    $("#size_parent").append(response.html);
                },
                complete: function (data) {
                    $("body").css("cursor", "default");

                }
            });
        });


        $(document).on("click", ".del_btn", function () {
            $(this).closest(".size_child").remove();
        });


        $(document).ready(function () {
            $(".floor_available_select").select2({
                placeholder: "Select Floors",
            });
            changePropertySizePrice($('#propertyType').val());
        });

        $(".floor_select").on('change', function () {
            $.ajax({
                url: basepath + "/ajax-get-available-floor",
                type: 'GET',
                success: function (data) {
                    $(".floor_available_select").empty();
                    $.each(data, function (value, key) {
                        $(".floor_available_select").append($("<option></option>").attr("value", value).text(key));
                        return value < $(".floor_select").val();
                    });
                    $(".floor_available_select").select2(
                        {
                            placeholder: "Select Floors",
                        }
                    );
                }
            });
        });

        $(".del_img").on('click', function () {
            var remove_img = '.remove_img' + $(this).data('id');
            $.ajax({
                url: basepath + "/ajax-listings-delete_img/" + $(this).data('id'),
                type: 'GET',
                success: function (data) {
                    if (data.success) {
                        $(remove_img).remove();
                        toastr.success(data.success);
                    } else {
                        toastr.success(data.error);
                    }
                }
            });
        });

        $("#propertyType").on('change', function () {
            console.log($(this).val())
            changePropertySizePrice($(this).val());
        });

        function changePropertySizePrice(property_type) {
            $.ajax({
                url: basepath + "/property/ajax-property-type/" + property_type,
                type: 'GET',
                success: function (data) {
                    if (data == 'A') {
                        $("#p_type").val(data);
                        $(".size_placeholder").text('(Apartment)');
                        $(".bathroom_div").css('display', 'block');
                        $(".bedroom_div").css('display', 'block');
                        $(".floor_div").css('display', 'flex');
                        $(".floor_available_div").css('display', 'flex');
                        $("#size").attr('placeholder', 'Size In sft');
                    } else if (data == 'B') {
                        $("#p_type").val(data);
                        $(".size_placeholder").text('(Office/Shop/Warehouse/Industrial Space/Garage)');
                        $(".bathroom_div").css('display', 'none');
                        $(".bedroom_div").css('display', 'none');
                        $(".floor_div").css('display', 'flex');
                        $(".floor_available_div").css('display', 'flex');
                        $("#size").attr('placeholder', 'Size In sft');
                    } else if (data == 'C') {
                        $("#p_type").val(data);
                        $(".size_placeholder").text('(Land)');
                        $(".bathroom_div").css('display', 'none');
                        $(".bedroom_div").css('display', 'none');
                        $(".floor_div").css('display', 'none');
                        $(".floor_available_div").css('display', 'none');
                        $("#size").attr('placeholder', 'Size In Katha');
                    }
                }
            });
        }
    </script>

    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>

@endpush
