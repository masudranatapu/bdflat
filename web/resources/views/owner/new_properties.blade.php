@extends('layouts.app')
@section('owner-properties','active')
@push('custom_css')
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/forms/validation/form-validation.css')}}">
@endpush
<?php
$property_types = $data['property_type'] ?? [];
$cities = $data['city'] ?? [];
$property_conditions = $data['property_condition'] ?? [];
$property_facing = $data['property_facing'] ?? [];

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
                    {!! Form::open([ /*'route' => '',*/ 'method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate', 'autocomplete' => 'off']) !!}
                    <div class="advertisment-wrap">
                        <div class="advertis-seller d-lg-flex {!! $errors->has('signup') ? 'error' : '' !!}">
                            <h5>Advertisement Type:&nbsp; </h5>
                            <div class="controls">
                                {!! Form::radio('signup','sell', old('signup'),[ 'id' => 'sell']) !!}
                                {{ Form::label('sell','Sell') }}

                                {!! Form::radio('signup','rent', old('signup'),[ 'id' => 'rent']) !!}
                                {{ Form::label('rent','Rent') }}

                                {!! Form::radio('signup','roommate', old('signup'),[ 'id' => 'roommate']) !!}
                                {{ Form::label('roommate','Roommate') }}

                                {!! $errors->first('signup', '<label class="help-block text-danger">:message</label>') !!}
                            </div>
                        </div>
                        <div class="advertisment-form">
                            <!-- property type  -->
                            <div class="row form-group">
                                {{ Form::label('property','Property Type:',['class' => 'col-sm-4 advertis-label']) }}
                                <div class="col-sm-8">
                                    <div class="form-group {!! $errors->has('property') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::select('property', $property_types,null,['class'=>'form-control', 'placeholder'=>'Select property type','data-validation-required-message' => 'This field is required']) !!}
                                            {!! $errors->first('property', '<label class="help-block text-danger">:message</label>') !!}
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
                                            {!! Form::select('city', $cities ,null,array('class'=>'form-control', 'placeholder'=>'Select City','data-validation-required-message' => 'This field is required')) !!}
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
                                            {!! Form::text('address', old('address'), [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Address','autocomplete' => 'off', 'tabindex' => 1]) !!}
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
                                            {!! Form::select('condition', $property_conditions,null,array('class'=>'form-control', 'placeholder'=>'Select Condition','data-validation-required-message' => 'This field is required')) !!}
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
                                                {!! Form::number('size', old('size'), [ 'class' => 'form-control',  'placeholder' => 'Size in sft']) !!}
                                                {!! $errors->first('condition', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <div class="form-group {!! $errors->has('bedroom') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::select('bedroom', ['1','2','3'],null,array('class'=>'form-control', 'placeholder'=>'Bedroom')) !!}
                                                {!! $errors->first('bedroom', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <div class="form-group {!! $errors->has('bathroom') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::select('bathroom', ['1','2','3'],null,array('class'=>'form-control', 'placeholder'=>'Bathroom')) !!}
                                                {!! $errors->first('bathroom', '<label class="help-block text-danger">:message</label>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <div class="form-group {!! $errors->has('price') ? 'error' : '' !!}">
                                            <div class="controls">
                                                {!! Form::number('price', old('price'), [ 'class' => 'form-control',  'placeholder' => 'Price']) !!}
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
                                            {!! Form::radio('property_price','fixed', old('property_price'),[ 'id' => 'fixed']) !!}
                                            {{ Form::label('fixed','Fixed') }}
                                            {!! Form::radio('property_price','nagotiable', old('property_price'),[ 'id' => 'nagotiable']) !!}
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
                                            {!! Form::select('floor', ['1 Floor','2 Floor','3 Floor'],null,array('class'=>'form-control', 'placeholder'=>'Ground Floor')) !!}
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
                                            {!! Form::radio('floor_available','ground', old('floor_available'),[ 'id' => 'ground']) !!}
                                            {{ Form::label('ground','Ground Floor') }}
                                            {!! Form::radio('floor_available','1stfloor', old('floor_available'),[ 'id' => '1stfloor']) !!}
                                            {{ Form::label('1stfloor','1st Floor') }}

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
                                            {!! Form::select('facing', $property_facing,null,array('class'=>'form-control', 'placeholder'=>'Select facing')) !!}
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
                                            {!! Form::text('handover_date', old('handover_date'), [ 'id'=>'datepicker','class' => 'form-control','placeholder' => 'Address','autocomplete' => 'off', 'tabindex' => 1]) !!}
                                            {!! $errors->first('handover_date', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                {{ Form::label('msg-form','Descriptions:',['class' => 'col-sm-4 advertis-label']) }}
                                <div class="col-sm-8">
                                    <div class="form-group {!! $errors->has('msg-form') ? 'error' : '' !!}">

                                        <div class="controls">
                                            {!! Form::textarea('msg-form', old('msg-form'), [ 'id'=>'msg-form','class' => 'msg-area form-control', 'placeholder' => 'Type here']) !!}
                                            {!! $errors->first('msg-form', '<label class="help-block text-danger">:message</label>') !!}
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
                                    <div class="form-group {!! $errors->has('features') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::radio('features','parking', old('features'),[ 'id' => 'parking']) !!}
                                            {{ Form::label('parking','Parking') }}

                                            {!! Form::radio('features','gas', old('features'),[ 'id' => 'gas']) !!}
                                            {{ Form::label('gas','Gas') }}

                                            {!! Form::radio('features','water', old('features'),[ 'id' => 'water']) !!}
                                            {{ Form::label('water','Water') }}

                                            {!! Form::radio('features','generator', old('features'),[ 'id' => 'generator']) !!}
                                            {{ Form::label('generator','Generator') }}

                                            {!! $errors->first('features', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--  facilities   -->
                            <div class="advertisment-title">
                                <h3>Facilities Within 1km</h3>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-12">
                                    <div class="form-group {!! $errors->has('facilities_within_1km') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::radio('facilities_within_1km','busstand', old('facilities_within_1km'),[ 'id' => 'busstand']) !!}
                                            {{ Form::label('busstand','Bus stand') }}

                                            {!! Form::radio('facilities_within_1km','supershop', old('facilities_within_1km'),[ 'id' => 'supershop']) !!}
                                            {{ Form::label('supershop','Super Shop') }}

                                            {!! Form::radio('facilities_within_1km','hospital', old('facilities_within_1km'),[ 'id' => 'hospital']) !!}
                                            {{ Form::label('hospital','Hospital') }}

                                            {!! Form::radio('facilities_within_1km','school', old('facilities_within_1km'),[ 'id' => 'school']) !!}
                                            {{ Form::label('school','School') }}

                                            {!! $errors->first('facilities_within_1km', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--  map   -->
                            <div class="advertisment-title">
                                <h3>Property Location on Map</h3>
                            </div>
                            <div class="property-map mb-3">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d233667.8223964362!2d90.27923941726908!3d23.780887453986505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2sDhaka!5e0!3m2!1sen!2sbd!4v1618505395009!5m2!1sen!2sbd"
                                    style="border:0; width:100%; height:200px;" allowfullscreen="" loading="lazy"></iframe>
                            </div>

                            <!--  image & video   -->
                            <div class="advertisment-title">
                                <h3>Image & Videos</h3>
                            </div>
                            <div class="row form-group mb-5 {!! $errors->has('image') ? 'error' : '' !!}">
                                {{ Form::label(null,'Image',['class' => 'col-sm-4 advertis-label']) }}
                                <div class="col-sm-8">
                                    {{ Form::label('imageFile',null,['class' => 'et_pb_contact_form_label']) }}
                                    <div class="controls">
                                        {!! Form::file('image', [ 'id'=>'imageFile','class' => 'file-upload']) !!}
                                        {!! $errors->first('image', '<label class="help-block text-danger">:message</label>') !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group video-tag">
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
                                            {!! Form::text('contactPerson', old('contactPerson'), [ 'id'=>'contactPerson','class' => 'form-control','placeholder'=>'Auto fill owner name except agent user']) !!}
                                            {!! $errors->first('contactPerson', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                {{ Form::label('mobileNum','Mobile:',['class' => 'col-sm-4 advertis-label']) }}
                                <div class="col-sm-8">
                                    <div class="form-group {!! $errors->has('mobileNum') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::number('mobileNum', old('mobileNum'), [ 'id'=>'mobileNum','class' => 'form-control','placeholder'=>'Property Owner Number']) !!}
                                            {!! $errors->first('mobileNum', '<label class="help-block text-danger">:message</label>') !!}
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
                                    {!! Form::radio('listing_type','geralListing', old('listing_type'),[ 'id' => 'geralListing']) !!}
                                    {{ Form::label('geralListing','General Listing for 30 days') }}

                                    {!! Form::radio('listing_type','feturListing', old('listing_type'),[ 'id' => 'feturListing']) !!}
                                    {{ Form::label('feturListing','Feature LIsting for 30 days') }}

                                    {!! Form::radio('listing_type','dailyGeral', old('listing_type'),[ 'id' => 'dailyGeral']) !!}
                                    {{ Form::label('dailyGeral','General Listing with daily auto update for 30 days') }}

                                    {!! Form::radio('listing_type','dailyFea', old('listing_type'),[ 'id' => 'dailyFea']) !!}
                                    {{ Form::label('dailyFea','Feature Listing with daily auto update for 30 days') }}

                                    {!! $errors->first('listing_type', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>

                            <!--  submit button  -->
                            <div class="advertisment-btn">
                                {{--                                <input type="submit" name="submit" id="submit" value="Submit">--}}
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

    <script>
        $('#city').change(function () {
            $("#area").empty();
            var id = $(this).val();
            $.ajax({
                url: 'get_area/' + id,
                type: 'get',
                dataType: 'json',
                success: function (response) {
                    $.each(response.area, function (key, value) {
                        var option = new Option(value, key);
                        // $(option).html(value);
                        $("#area").append(option);
                    });
                }
            });
        });

        $('#add_btn').click(function () {
            $.ajax({
                url: '{{route('add_size')}}',
                type: 'post',
                data: {_token: '{{csrf_token()}}'},
                success: function (response) {
                    console.log(response.html);
                    $("#size_parent").append(response.html);
                }
            });
        });

        $(document).on("click", ".del_btn", function () {
            $(this).closest(".size_child").remove();
        });
    </script>
@endpush
