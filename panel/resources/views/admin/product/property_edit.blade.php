@extends('admin.layout.master')

@section('product_list','active')
@section('Product Management','open')

@section('title')
    Property Edit
@endsection

@push('custom_css')
    {{--    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/forms/datepicker/bootstrap-datetimepicker.min.css')}}">--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/selects/select2.min.css') }}">
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
    $roles = userRolePermissionArray()
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
                                        <div class="form-title mb-2">
                                            <h3>Basic Information</h3>
                                        </div>
                                        <div class="saleform-header mb-2">
                                            <p>Property ID: 100001</p>
                                            <p>Create Date: July 10, 2020</p>
                                            <p>Modified On: July 17, 2020</p>
                                        </div>
                                        {!! Form::open([ 'method' => 'post', 'files' => true , 'novalidate', 'autocomplete' => 'off']) !!}
                                        <div class="row">
                                            <!-- Type User -->
                                            <div class="col-md-6">
                                                <div class="form-group {!! $errors->has('usertype') ? 'error' : '' !!}">
                                                    <div class="controls">
                                                        <label class="label-title">User Type</label>
                                                        {!! Form::radio('usertype','individual',null /*$row->PROPERTY_FOR=='sell'?true:false*/,[ 'id' => 'individual','data-validation-required-message' => 'This field is required','checked'=>'checked']) !!}
                                                        {{ Form::label('individual','Individual') }}

                                                        {!! Form::radio('usertype','developer',null /*$row->PROPERTY_FOR=='sell'?true:false*/,[ 'id' => 'developer']) !!}
                                                        {{ Form::label('developer','Developer') }}

                                                        {!! Form::radio('usertype','agency',null /*$row->PROPERTY_FOR=='sell'?true:false*/,[ 'id' => 'agency']) !!}
                                                        {{ Form::label('agency','Agency') }}

                                                        {!! Form::radio('usertype','agent',null /*$row->PROPERTY_FOR=='sell'?true:false*/,[ 'id' => 'agent']) !!}
                                                        {{ Form::label('agent','Agent') }}

                                                        {!! $errors->first('usertype', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Advertisment Type -->
                                            <div class="col-md-6">
                                                <div class="form-group {!! $errors->has('alert') ? 'error' : '' !!}">
                                                    <div class="controls">
                                                        <label class="label-title">Advertisement Type <span>*</span></label>
                                                        {!! Form::radio('alert','sell',null /*$row->PROPERTY_FOR=='sell'?true:false*/,[ 'id' => 'sell','data-validation-required-message' => 'This field is required']) !!}
                                                        {{ Form::label('sell','Sell') }}

                                                        {!! Form::radio('alert','rent',null /*$row->PROPERTY_FOR=='sell'?true:false*/,[ 'id' => 'rent','checked'=>'checked']) !!}
                                                        {{ Form::label('rent','Rent') }}

                                                        {!! Form::radio('alert','roommate',null /*$row->PROPERTY_FOR=='sell'?true:false*/,[ 'id' => 'roommate']) !!}
                                                        {{ Form::label('roommate','Roommate') }}

                                                        {!! $errors->first('usertype', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- User Name -->
                                            <div class="col-md-6">
                                                <div class="form-group {!! $errors->has('user_name') ? 'error' : '' !!}">
                                                    <div class="controls">
                                                        {{ Form::label('user_name','User Name',['class' => 'label-title']) }}
                                                        {!! Form::text('user_name', null /*$row->ADDRESS*/, [ 'class' => 'form-control', 'placeholder' => 'User Name']) !!}
                                                        {!! $errors->first('user_name', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Property Type -->
                                            <div class="col-md-6">
                                                <div class="form-group {!! $errors->has('propertyType') ? 'error' : '' !!}">
                                                    <div class="controls">
                                                        {{ Form::label('propertyType','Property Type',['class' => 'label-title']) }}
                                                        {!! Form::select('propertyType', [],null /*$property_conditions,$row->F_PROPERTY_CONDITION*/,array('class'=>'form-control propertyType', 'placeholder'=>'Select Property Type')) !!}
                                                        {!! $errors->first('propertyType', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- City -->
                                            <div class="col-md-6">
                                                <div class="form-group {!! $errors->has('city') ? 'error' : '' !!}">
                                                    <div class="controls">
                                                        {!! Form::label('city','City <span>*</span>', ['class' => 'label-title'], false) !!}
                                                        {!! Form::select('city', [],null /*$property_conditions,$row->F_PROPERTY_CONDITION*/,array('class'=>'form-control city','data-validation-required-message' => 'This field is required', 'placeholder'=>'Select City')) !!}
                                                        {!! $errors->first('city', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Area (Based on city) -->
                                            <div class="col-md-6">
                                                <div class="form-group {!! $errors->has('area') ? 'error' : '' !!}">
                                                    <div class="controls">
                                                        {!! Form::label('area','Area (Based on City) <span>*</span>', ['class' => 'label-title'], false) !!}
                                                        {!! Form::select('area', [],null /*$property_conditions,$row->F_PROPERTY_CONDITION*/,array('class'=>'form-control area','data-validation-required-message' => 'This field is required', 'placeholder'=>'Select Area')) !!}
                                                        {!! $errors->first('area', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Address -->
                                            <div class="col-md-6">
                                                <div class="form-group {!! $errors->has('address') ? 'error' : '' !!}">
                                                    <div class="controls">
                                                        {{ Form::label('address','Address <span>*</span>',['class' => 'label-title'],false) }}
                                                        {!! Form::text('address', null /*$row->ADDRESS*/, [ 'class' => 'form-control address','data-validation-required-message' => 'This field is required', 'placeholder' => 'Address']) !!}
                                                        {!! $errors->first('address', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Condition -->
                                            <div class="col-md-6">
                                                <div class="form-group {!! $errors->has('condition') ? 'error' : '' !!}">
                                                    <div class="controls">
                                                        {!! Form::label('condition','Condition <span>*</span>', ['class' => 'label-title'], false) !!}
                                                        {!! Form::select('condition', [],null /*$property_conditions,$row->F_PROPERTY_CONDITION*/,array('class'=>'form-control condition','data-validation-required-message' => 'This field is required', 'placeholder'=>'Select Condition')) !!}
                                                        {!! $errors->first('condition', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Ad Title -->
                                            <div class="col-md-6">
                                                <div class="form-group {!! $errors->has('ad_title') ? 'error' : '' !!}">
                                                    <div class="controls">
                                                        {{ Form::label('ad_title','Title for your ad <span>*</span>',['class' => 'label-title '],false) }}
                                                        {!! Form::text('ad_title', null /*$row->ADDRESS*/, [ 'class' => 'form-control ad_title','data-validation-required-message' => 'This field is required', 'placeholder' => 'Type here']) !!}
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
                                            <!--  Type A -->
                                            <div class="col-md-6">
                                                {{ Form::label('','Type A',['class' => 'label-title '],false) }}
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group {!! $errors->has('size') ? 'error' : '' !!}">
                                                            <div class="controls">
                                                                {!! Form::number('size', null /*$row->ADDRESS*/, [ 'class' => 'form-control size', 'placeholder' => 'Size in Sft']) !!}
                                                                {!! $errors->first('size', '<label class="help-block text-danger">:message</label>') !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group {!! $errors->has('bedroom') ? 'error' : '' !!}">
                                                            <div class="controls">
                                                                {!! Form::select('bedroom', [],null /*$property_conditions,$row->F_PROPERTY_CONDITION*/,array('class'=>'form-control bedroom','placeholder'=>'Bedroom')) !!}
                                                                {!! $errors->first('bedroom', '<label class="help-block text-danger">:message</label>') !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group {!! $errors->has('bathroom') ? 'error' : '' !!}">
                                                            <div class="controls">
                                                                {!! Form::select('bathroom', [],null /*$property_conditions,$row->F_PROPERTY_CONDITION*/,array('class'=>'form-control bathroom','placeholder'=>'Bathroom')) !!}
                                                                {!! $errors->first('bathroom', '<label class="help-block text-danger">:message</label>') !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group {!! $errors->has('price') ? 'error' : '' !!}">
                                                            <div class="controls">
                                                                {!! Form::number('price', null /*$row->ADDRESS*/, [ 'class' => 'form-control price', 'placeholder' => 'Total Price']) !!}
                                                                {!! $errors->first('price', '<label class="help-block text-danger">:message</label>') !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Type B -->
                                            <div class="col-md-6">
                                                {{ Form::label('','Type B',['class' => 'label-title '],false) }}
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group {!! $errors->has('size') ? 'error' : '' !!}">
                                                            <div class="controls">
                                                                {!! Form::number('size', null /*$row->ADDRESS*/, [ 'class' => 'form-control size', 'placeholder' => 'Size in Sft']) !!}
                                                                {!! $errors->first('size', '<label class="help-block text-danger">:message</label>') !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group {!! $errors->has('price') ? 'error' : '' !!}">
                                                            <div class="controls">
                                                                {!! Form::number('price', null /*$row->ADDRESS*/, [ 'class' => 'form-control price', 'placeholder' => 'Total Price']) !!}
                                                                {!! $errors->first('price', '<label class="help-block text-danger">:message</label>') !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Type c -->
                                            <div class="col-md-6">
                                                <!-- Type C -->
                                                {{ Form::label('','Type C',['class' => 'label-title '],false) }}
                                                <div class="row property-typeC">
                                                    <div class="col-6 col-sm-3">
                                                        <div class="form-group {!! $errors->has('size') ? 'error' : '' !!}">
                                                            <div class="controls">
                                                                {!! Form::number('size', null /*$row->ADDRESS*/, [ 'class' => 'form-control size', 'placeholder' => 'Size in Katha']) !!}
                                                                {!! $errors->first('size', '<label class="help-block text-danger">:message</label>') !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-sm-3">
                                                        <div class="form-group {!! $errors->has('price') ? 'error' : '' !!}">
                                                            <div class="controls">
                                                                {!! Form::number('price', null /*$row->ADDRESS*/, [ 'class' => 'form-control price', 'placeholder' => 'Total Price']) !!}
                                                                {!! $errors->first('price', '<label class="help-block text-danger">:message</label>') !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-sm-3">
                                                        <div class="form-group addSize">
                                                            <a href="javascript:void(0);">
                                                                <i class="fa fa-plus"></i>
                                                                Add New Size
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Property price is -->
                                            <div class="col-md-6">
                                                <div class="controls">
                                                    <label class="label-title">Property price is</label>
                                                    {!! Form::radio('priceChek','fixed',null /*$row->PROPERTY_FOR=='sell'?true:false*/,[ 'id' => 'fixed','checked'=>'checked']) !!}
                                                    {{ Form::label('fixed','Fixed') }}

                                                    {!! Form::radio('priceChek','negotiable',null /*$row->PROPERTY_FOR=='sell'?true:false*/,[ 'id' => 'negotiable']) !!}
                                                    {{ Form::label('negotiable','Negotiable') }}

                                                    {!! $errors->first('priceChek', '<label class="help-block text-danger">:message</label>') !!}
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
                                                        {!! Form::select('floor', [],null /*$property_conditions,$row->F_PROPERTY_CONDITION*/,array('class'=>'form-control floor','placeholder'=>'Select Total Floor')) !!}
                                                        {!! $errors->first('floor', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group {!! $errors->has('floorChek') ? 'error' : '' !!}">
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
                                                        {!! Form::select('facing', [],null /*$property_conditions,$row->F_PROPERTY_CONDITION*/,array('class'=>'form-control facing','placeholder'=>'Select Facing')) !!}
                                                        {!! $errors->first('facing', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    {{ Form::label('datepicker','Handover Date',['class' => 'label-title']) }}
                                                    <div class="controls">
                                                        {!! Form::text('handover_date', null /*date('d-m-Y', strtotime($row2->HANDOVER_DATE))*/, [ 'id'=>'datepicker','class' => 'form-control datetimepicker','placeholder' => 'Handover date','autocomplete' => 'off', 'tabindex' => 1]) !!}
                                                        {!! $errors->first('handover_date', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    {{ Form::label('description','Descriptions',['class' => 'label-title']) }}
                                                    {{--                    <textarea class="form-control" id="description"></textarea>--}}
                                                    <div class="controls">
                                                        {!! Form::textarea('description',null /*$row2->DESCRIPTION*/, [ 'id'=>'description','class' => 'form-control', 'placeholder' => 'Type here']) !!}
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
                                                    <input type="checkbox" value="parking" id="parking">
                                                    <label for="parking">Parking</label>
                                                    <input type="checkbox" checked="" value="gas" id="gas">
                                                    <label for="gas">Gas</label>
                                                    <input type="checkbox" checked="" value="water" id="water">
                                                    <label for="water">Water</label>
                                                    <input type="checkbox" checked="" value="generator" id="generator">
                                                    <label for="generator">Generator</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Facilities within 1km -->
                                                <div class="form-title mb-2 mt-2">
                                                    <h3>Facilities within 1km</h3>
                                                </div>
                                                <div class="form-group">
                                                    <input type="checkbox" value="busStand" id="busStand">
                                                    <label for="busStand">Bus stand</label>
                                                    <input type="checkbox" checked="" value="shop" id="shop">
                                                    <label for="shop">Super shop</label>
                                                    <input type="checkbox" checked="" value="hospital" id="hospital">
                                                    <label for="hospital">Hospital</label>
                                                    <input type="checkbox" checked="" value="school" id="school">
                                                    <label for="school">School</label>
                                                </div>
                                            </div>

                                            <!-- map -->
                                            <div class="col-md-6">
                                                <div class="form-title mb-2 mt-2">
                                                    <h3>Property Location on map</h3>
                                                </div>
                                                <div class="map">
                                                    <iframe
                                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3746841.1426549484!2d88.10013445319406!3d23.49562509219387!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30adaaed80e18ba7%3A0xf2d28e0c4e1fc6b!2sBangladesh!5e0!3m2!1sen!2sbd!4v1622515439402!5m2!1sen!2sbd"
                                                        style="border:0; width:100%; height: 160px;" allowfullscreen="" loading="lazy"></iframe>
                                                </div>
                                            </div>

                                            <!-- Image & video -->
                                            <div class="col-md-6">
                                                <div class="form-title mb-2 mt-2">
                                                    <h3>Image & Video</h3>
                                                </div>
                                                <div class="form-group">
                                                    <label class="label-title">Upload Images <span>*</span></label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="upload-image">
                                                        <label class="custom-file-label">Choose file</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    {{ Form::label('videoURL','Video:',['class' => 'label-title']) }}
                                                    <div class="controls">
                                                        {!! Form::text('videoURL',null /*$row2->VIDEO_CODE*/, [ 'id'=>'videoURL','class' => 'form-control','placeholder'=>'Paste your youtube video URL']) !!}
                                                        {!! $errors->first('videoURL', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Property Owner Details -->
                                            <div class="col-md-6">
                                                <div class="form-title mb-2 mt-2">
                                                    <h3>Property Owner Details</h3>
                                                </div>
                                                <div class="form-group {!! $errors->has('contact_person') ? 'error' : '' !!}">
                                                    {{ Form::label('contact_person','Contact Person',['class' => 'label-title']) }}
                                                    <div class="controls">
                                                        {!! Form::text('contact_person',null /*$row->CONTACT_PERSON1*/, [ 'id'=>'contact_person','class' => 'form-control','placeholder'=>'Auto fill owner name except agent user','data-validation-required-message' => 'This field is required']) !!}
                                                        {!! $errors->first('contact_person', '<label class="help-block text-danger">:message</label>') !!}
                                                    </div>
                                                </div>
                                                <div class="form-group {!! $errors->has('mobile') ? 'error' : '' !!}">
                                                    {{ Form::label('mobile','Mobile',['class' => 'label-title']) }}
                                                    <div class="controls">
                                                        {!! Form::number('mobile', null/*$row->MOBILE1*/, [ 'id'=>'mobile','class' => 'form-control','data-validation-required-message' => 'This field is required']) !!}
                                                        {!! $errors->first('mobile', '<label class="help-block text-danger">:message</label>') !!}
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
                                                    <input type="radio" checked="" name="listingType" value="general" id="general">
                                                    <label for="general">General Listing for 30 days</label>
                                                    <input type="radio" name="listingType" value="features" id="features">
                                                    <label for="features">Feature Listing for 30 days</label>
                                                    <input type="radio" name="listingType" value="generalAuto" id="generalAuto">
                                                    <label for="generalAuto">General Listing with daily auto update for 30 days</label>
                                                    <input type="radio" name="listingType" value="featureAuto" id="featureAuto">
                                                    <label for="featureAuto">Feature Listing with daily auto update for 30 days</label>
                                                </div>
                                            </div>

                                            <!-- Publishing Status -->
                                            <div class="col-md-6">
                                                <div class="form-title mb-2 mt-2">
                                                    <h3>Publishing Status</h3>
                                                </div>
                                                <div class="form-group publishingStatus">
                                                    <input type="radio" checked="" name="publishing" value="pending" id="pending">
                                                    <label for="pending">Pending</label>
                                                    <input type="radio" name="publishing" value="publish" id="publish">
                                                    <label for="publish">Publish</label>
                                                    <input type="radio" name="publishing" value="unpublish" id="unpublish">
                                                    <label for="unpublish">Unpublish</label>
                                                    <input type="radio" name="publishing" value="reject" id="reject">
                                                    <label for="reject">Reject</label>
                                                    <input type="radio" name="publishing" value="expired" id="expired">
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
                                                    <input type="radio" checked="" name="billing" value="pending" id="pending">
                                                    <label for="pending">Pending</label>
                                                    <input type="radio" name="billing" value="paid" id="paid">
                                                    <label for="paid">Paid</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" checked="" class="custom-control-input" id="customSwitch1">
                                                        <label class="custom-control-label" for="customSwitch1">Verified BDF</label>
                                                    </div>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input" id="customSwitch2">
                                                        <label class="custom-control-label" for="customSwitch2">Need payment to view CI</label>
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
    <script type="text/javascript" src="{{ asset('app-assets/pages/customer.js') }}"></script>

    {{--    <script src="{{asset('/assets/js/forms/datepicker/moment.min.js')}}"></script>--}}
    {{--    <script src="{{asset('/assets/js/forms/datepicker/bootstrap-datetimepicker.min.js')}}"></script>--}}
@endpush
