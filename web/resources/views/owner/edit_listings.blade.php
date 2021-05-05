@extends('layouts.app')
@section('owner-listings','active')

@push('custom_css')
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/forms/validation/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/forms/datepicker/bootstrap-datetimepicker.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/image_upload/image-uploader.min.css')}}">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,700|Montserrat:300,400,500,600,700|Source+Code+Pro&display=swap"
          rel="stylesheet">
@endpush
<?php
$data = $data['data'] ?? [];
?>

@section('content')
    <!--
     ============  advertisment    ============
 -->

    <div class="advertisment-sec">
        <!-- container -->
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-5 d-none d-md-block">
                    @include('owner._left_menu')
                </div>
                <div class="col-sm-12 col-md-8">
                    {{ $errors }}
                    {!! Form::open([ 'route' => 'listings.store', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate', 'autocomplete' => 'off']) !!}
                    <div class="advertisment-wrap">
                        <div class="advertis-seller d-lg-flex form-group {!! $errors->has('property_for') ? 'error' : '' !!}">
                            <h5>Advertisement Type:&nbsp; </h5>
                            <div class="controls">
                                {!! Form::radio('property_for','sell', old('property_for'),[ 'id' => 'sell','data-validation-required-message' => 'This field is required']) !!}
                                {{ Form::label('sell','Sell') }}

                                {!! Form::radio('property_for','rent', old('property_for'),[ 'id' => 'rent']) !!}
                                {{ Form::label('rent','Rent') }}

                                {!! Form::radio('property_for','roommate', old('property_for'),[ 'id' => 'roommate']) !!}
                                {{ Form::label('roommate','Roommate') }}

                                {!! $errors->first('property_for', '<label class="help-block text-danger">:message</label>') !!}
                            </div>
                        </div>
                        <div class="advertisment-form">
                            <!-- property type  -->
                            <div class="row form-group">
                                {{ Form::label('property_type','Property Type:',['class' => 'col-sm-4 advertis-label']) }}
                                <div class="col-sm-8">
                                    <div class="form-group {!! $errors->has('property_type') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::select('property_type', [],null,['class'=>'form-control', 'placeholder'=>'Select property type','data-validation-required-message' => 'This field is required']) !!}
                                            {!! $errors->first('property_type', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- city  -->
                            <div class="row form-group">
                                {!! Form::label('city','City <span class="required">*</span>:', ['class' => 'col-sm-4 advertis-label'], false) !!}
                                <div class="col-sm-8">
                                    <div class="form-group {!! $errors->has('city') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::select('city', [] ,null,array('class'=>'form-control', 'placeholder'=>'Select City','data-validation-required-message' => 'This field is required')) !!}
                                            {!! $errors->first('city', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--  area  -->
                            <div class="row form-group">
                                {!! Form::label('area','Area(based on city) <span class="required">*</span>:', ['class' => 'col-sm-4 advertis-label'], false) !!}
                                <div class="col-sm-8">
                                    <div class="form-group {!! $errors->has('area') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::select('area', [],null,array('class'=>'form-control', 'placeholder'=>'Select Area','data-validation-required-message' => 'This field is required')) !!}
                                            {!! $errors->first('area', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--  address  -->
                            <div class="row form-group">
                                {!! Form::label('address','Address <span class="required">*</span>:', ['class' => 'col-sm-4 advertis-label'], false) !!}
                                <div class="col-sm-8">
                                    <div class="form-group {!! $errors->has('address') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::text('address', old('address'), [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Address']) !!}
                                            {!! $errors->first('address', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--  condition  -->
                            <div class="row form-group {!! $errors->has('condition') ? 'error' : '' !!}">
                                {!! Form::label('condition','Condition <span class="required">*</span>:', ['class' => 'col-sm-4 advertis-label'], false) !!}
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <div class="controls">
                                            {!! Form::select('condition', [],null,array('class'=>'form-control', 'placeholder'=>'Select Condition','data-validation-required-message' => 'This field is required')) !!}
                                            {!! $errors->first('condition', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--  Property Size & Price  -->
                            <div class="advertisment-title">
                                <h3>Property Size & Price
                                    <button type="button" class="btn btn-xs btn-danger" id="add_btn">+ Add new size</button>
                                </h3>
                            </div>

                            <div id="size_parent">
                                <div class="row no-gutters form-group size_child">
                                    <div class="col-6 col-md-3">
                                        <div class="form-group {!! $errors->has('size') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::number('size[]', old('size[]'), [ 'class' => 'form-control',  'placeholder' => 'Size in sft','data-validation-required-message' => 'This field is required']) !!}
                                                {!! $errors->first('size', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <div class="form-group {!! $errors->has('bedroom') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::select('bedroom[]', [], old('bedroom[]') ?? null, array('class'=>'form-control', 'placeholder'=>'Bedroom','data-validation-required-message' => 'This field is required')) !!}
                                                {!! $errors->first('bedroom', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <div class="form-group {!! $errors->has('bathroom') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::select('bathroom[]', [], old('bathroom[]'), array('class'=>'form-control', 'placeholder'=>'Bathroom','data-validation-required-message' => 'This field is required')) !!}
                                                {!! $errors->first('bathroom', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <div class="form-group {!! $errors->has('price') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::number('price[]', old('price[]'), ['class' => 'form-control',  'placeholder' => 'Price','data-validation-required-message' => 'This field is required']) !!}
                                                {!! $errors->first('price', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--  property price   -->
                            <div class="row form-group">
                                {{ Form::label('','Property price is:',['class' => 'col-sm-4 advertis-label']) }}
                                <div class="col-sm-8">
                                    <div class="form-group {!! $errors->has('property_price') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::radio('property_price','1', old('property_price'),[ 'id' => 'fixed','data-validation-required-message' => 'This field is required']) !!}
                                            {{ Form::label('fixed','Fixed') }}
                                            {!! Form::radio('property_price','2', old('property_price'),[ 'id' => 'nagotiable']) !!}
                                            {{ Form::label('nagotiable','Nagotiable') }}
                                            {!! $errors->first('property_price', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--  Additional Infomation  -->
                            <div class="advertisment-title">
                                <h3>Additional Infomation</h3>
                            </div>
                            <div class="row form-group">
                                {{ Form::label('floor','Total Number Of Floor:',['class' => 'col-sm-4 advertis-label']) }}
                                <div class="col-sm-8">
                                    <div class="form-group {!! $errors->has('floor') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::select('floor', [],null,array('class'=>'form-control floor_select')) !!}
                                            {!! $errors->first('floor', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                {{ Form::label('','Floor Available:',['class' => 'col-sm-4 advertis-label']) }}
                                <div class="col-sm-8">
                                    <div class="form-group {!! $errors->has('floor_available') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::select('floor_available[]', [] ,null,array('multiple'=>'multiple','class'=>'form-control floor_available_select')) !!}
                                            {!! $errors->first('floor_available', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group">
                                {{ Form::label('facing','Facing:',['class' => 'col-sm-4 advertis-label']) }}
                                <div class="col-sm-8">
                                    <div class="form-group {!! $errors->has('facing') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::select('facing', [],null,array('class'=>'form-control', 'placeholder'=>'Select facing')) !!}
                                            {!! $errors->first('facing', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                {{ Form::label('datepicker','Handover Date:',['class' => 'col-sm-4 advertis-label']) }}
                                <div class="col-sm-8">
                                    <div class="form-group {!! $errors->has('handover_date') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::text('handover_date', old('handover_date'), [ 'id'=>'datepicker','class' => 'form-control datetimepicker','placeholder' => 'Handover date','autocomplete' => 'off', 'tabindex' => 1]) !!}
                                            {!! $errors->first('handover_date', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                {{ Form::label('description','Descriptions:',['class' => 'col-sm-4 advertis-label']) }}
                                <div class="col-sm-8">
                                    <div class="form-group {!! $errors->has('description') ? 'error' : '' !!}">

                                        <div class="controls">
                                            {!! Form::textarea('description', old('description'), [ 'id'=>'description','class' => 'msg-area form-control', 'placeholder' => 'Type here']) !!}
                                            {!! $errors->first('description', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--  features  -->
                            <div class="advertisment-title">
                                <h3>Features</h3>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-12">
{{--                                    @foreach($listing_features as $key => $listing_feature)--}}
{{--                                        <div class="form-check form-check-inline {!! $errors->has('features') ? 'error' : '' !!}">--}}
{{--                                            <div class="controls">--}}
{{--                                                {!! Form::checkbox('features[]',$key, old('features'),[ 'id' => 'features'.$key,'class' =>'form-check-input']) !!}--}}
{{--                                                {{ Form::label('features'.$key,$listing_feature,['class' =>'form-check-label']) }}--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    @endforeach--}}
                                    {!! $errors->first('features', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                            <!--  facilities   -->
                            <div class="advertisment-title">
                                <h3>Facilities Within 1km</h3>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-12">
{{--                                    @foreach($nearby as $key => $item)--}}
{{--                                        <div class="form-check form-check-inline {!! $errors->has('nearby') ? 'error' : '' !!}">--}}
{{--                                            <div class="controls">--}}
{{--                                                {!! Form::checkbox('nearby[]',$key, old('nearby'),[ 'id' => 'nearby'.$key]) !!}--}}
{{--                                                {{ Form::label('nearby'.$key,$item) }}--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    @endforeach--}}
                                    {!! $errors->first('nearby', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                            <!--  map   -->
                            <div class="advertisment-title">
                                <h3>Property Location on Map</h3>
                            </div>
                            <div class="property-map">
                                <div class="row no-gutters form-group">
                                    <div class="col-12">
                                        <div class="form-group {!! $errors->has('map_url') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::text('map_url', old('map_url'), [ 'class' => 'form-control',  'placeholder' => 'Paste Your Location Map URL']) !!}
                                                {!! $errors->first('map_url', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--  image & video   -->
                            <div class="advertisment-title">
                                <h3>Image & Videos</h3>
                            </div>
                            <div class="row form-group {!! $errors->has('image') ? 'error' : '' !!}">
                                {{ Form::label(null,'Image',['class' => 'col-sm-4 advertis-label']) }}
                                <div class="col-sm-8">
                                    <div class="controls">
                                        <div id="imageFile" style="padding-top: .5rem;"></div>
                                    </div>
                                    {!! $errors->first('image', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>

                            <div class="row form-group {{--video-tag--}}">
                                {{ Form::label('videoURL','Video:',['class' => 'col-sm-4 advertis-label']) }}
                                <div class="col-sm-8">
                                    <div class="form-group {!! $errors->has('videoURL') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::text('videoURL', old('videoURL'), [ 'id'=>'videoURL','class' => 'form-control','placeholder'=>'Paste your youtube video URL']) !!}
                                            {!! $errors->first('videoURL', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!--   property owner   -->
                            <div class="advertisment-title">
                                <h3>Property Owner Details</h3>
                            </div>
                            <div class="row form-group">
                                {{ Form::label('contactPerson','Contact Person:',['class' => 'col-sm-4 advertis-label']) }}
                                <div class="col-sm-8">
                                    <div class="form-group {!! $errors->has('contactPerson') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::text('contactPerson', old('contactPerson'), [ 'id'=>'contactPerson','class' => 'form-control','placeholder'=>'Auto fill owner name except agent user','data-validation-required-message' => 'This field is required']) !!}
                                            {!! $errors->first('contactPerson', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                {{ Form::label('mobile','Mobile:',['class' => 'col-sm-4 advertis-label']) }}
                                <div class="col-sm-8">
                                    <div class="form-group {!! $errors->has('mobile') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::number('mobile', old('mobile'), [ 'id'=>'mobile','class' => 'form-control','placeholder'=>'Property Owner Number','data-validation-required-message' => 'This field is required']) !!}
                                            {!! $errors->first('mobile', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--  listing  type -->
                            <div class="advertisment-title">
                                <h3>Listing Type</h3>
                            </div>
                            <div class="listing-list mb-3 {!! $errors->has('listing_type') ? 'error' : '' !!}">
                                <div class="controls">
{{--                                    @foreach($property_listing_types as $key => $item)--}}
{{--                                        {!! Form::radio('listing_type',$key, old('listing_type'),[ 'id' => 'listing_type'.$key,'data-validation-required-message' => 'This field is required']) !!}--}}
{{--                                        {{ Form::label('listing_type'.$key,$item) }}--}}
{{--                                    @endforeach--}}
                                    {!! $errors->first('listing_type', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>

                            <!--  submit button  -->
                            <div class="advertisment-btn">
                                {!! Form::submit('submit', ['id'=>'submit']) !!}

                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div><!-- container -->
        </div>
    </div>
@endsection

@push('custom_js')
    <script src="{{asset('/assets/js/forms/validation/jqBootstrapValidation.js')}}"></script>
    <script src="{{asset('/assets/js/forms/validation/form-validation.js')}}"></script>
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

        var basepath = $('#base_url').val();

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
                url: basepath + '/ajax-add-listing-variant',
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
    </script>
@endpush
