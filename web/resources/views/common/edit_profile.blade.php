@extends('layouts.app')
@section('my-account','active')
@push('custom_css')
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/forms/validation/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/forms/datepicker/bootstrap-datetimepicker.min.css')}}">
    <style>
        .profile_photo{width: 35px;height: 35px; position: absolute;top: 8px;border-radius: 5px;object-fit: cover;margin-left: 5px;}
    </style>
@endpush

<?php
$user_data = $data['user_data'] ?? [];
?>

@section('content')
    <!--
     ============   dashboard   ============
 -->
    <div class="dashboard-sec">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-4 mb-5 d-none d-md-block">
                    @include('common._left_menu')
                </div>
                <div class="col-sm-12 col-md-8">
                    <div class="profile-details">
                        <div class="profile-heading">
                            <h3>Update Profile</h3>
                        </div>
                        {!! Form::open([ 'route' => 'profile.store_or_update', 'id' => 'profileForm', 'method' => 'post', 'class' => 'form-horizontal','files' => true , 'novalidate', 'autocomplete' => 'off']) !!}
                        <table>
                            <tr>
                                <td class="label">Name:</td>
                                <td>
                                    <div class="form-group mb-0 {!! $errors->has('name') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::text('name', old('name')?? $user_data->NAME, [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Name']) !!}
                                            {!! $errors->first('name', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="label">Email:</td>
                                <td>
                                    <div class="form-group mb-0 {!! $errors->has('email') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::text('email', $user_data->EMAIL, [ 'class' => 'form-control', 'readonly', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Email']) !!}
                                            {!! $errors->first('email', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="label">Mobile:</td>
                                <td>
                                    <div class="form-group mb-0 {!! $errors->has('mobile') ? 'error' : '' !!}">
                                        <div class="controls">
                                            {!! Form::text('mobile', old('mobile') ?? $user_data->MOBILE_NO, [ 'class' => 'form-control', 'pattern' => '^(01)[0-9]{9}$', 'data-validation-pattern-message' => 'Incorrect mobile number format', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Mobile']) !!}
                                            {!! $errors->first('mobile', '<label class="help-block text-danger">:message</label>') !!}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="label">Photo:</td>
                                <td>
                                    <div class="form-group {!! $errors->has('image') ? 'error' : '' !!}">
                                        <div class="controls">
                                            <label class="upload-image" for="upload-image-one">
                                                {!! Form::file('image', [ 'id' => 'upload-image-one']) !!}
                                                {!! $errors->first('image', '<label class="help-block text-danger">:message</label>') !!}
                                            </label>
                                        </div>
                                    </div>
                                </td>
                                <td style="position: relative">
                                    <a target="_blank" href="{{asset($user_data->PROFILE_PIC_URL)}}">
                                    <img class="profile_photo" width="50" src="{{asset($user_data->PROFILE_PIC_URL)}}" alt="{{ $user_data->NAME ?? '' }}"></a>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <div class="advertisment-btn">
                                        {!! Form::submit('update', ['id' => 'submit']) !!}
                                    </div>
                                </td>
                            </tr>
                        </table>
                        {!! Form::close() !!}
                        <hr/>

                        <div class="profile-heading">
                            <h3>Change Password</h3>
                        </div>
                        {!! Form::open([ 'route' => 'profile.password_update', 'method' => 'post', 'class' => 'form-horizontal', 'novalidate', 'autocomplete' => 'off']) !!}
                        <div class="form-group mb-0 {!! $errors->has('password') ? 'error' : '' !!}">
                            <div class="form-group">
                                <label for="password">New Password:</label>
                                <div class="controls" style="display: inline">
                                    {!! Form::password('password', ['id'=>'password', 'min' => 6, 'data-validation-required-message' => 'Minimum length of password is 6', 'placeholder' => 'Type Password']) !!}
                                    <input type="submit" name="submit" id="submit" value="Change">
                                </div>
                                {!! $errors->first('password', '<label class="help-block text-danger">:message</label>') !!}
                            </div>


                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div><!-- row -->
        </div><!-- container -->
    </div>

@endsection

@push('custom_js')
    <script src="{{asset('/assets/js/forms/validation/jqBootstrapValidation.js')}}"></script>
    <script src="{{asset('/assets/js/forms/validation/form-validation.js')}}"></script>
    <script>
    </script>
@endpush
