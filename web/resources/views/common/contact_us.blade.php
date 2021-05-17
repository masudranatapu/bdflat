@extends('layouts.app')
@push('custom_css')
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/forms/validation/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/forms/datepicker/bootstrap-datetimepicker.min.css')}}">
@endpush
@section('content')
    <!--
    ============   page-header    ============
 -->

    <div class="page-heading">
        <!-- container -->
        <div class="container">
            <div class="page-name">
                <ul>
                    <li><a href="index.html">Home <i class="fa fa-angle-double-right"></i></a></li>
                    <li>Contact</li>
                </ul>
                <h1>Contact Us</h1>
            </div>
        </div><!-- container -->
    </div>


    <!--
        ============   contact   ============
    -->
    <div class="contact-sec mb-5">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-lg-4 mb-5">
                    <div class="contact-info">
                        <h3>bdflats info</h3>
                        <ul>
                            <li><strong>Address:</strong>1234 Street Name, City Name, Country</li>
                            <li><strong>Phone:</strong><a href="#">(123) 456-7890</a></li>
                            <li><strong>Email:</strong><a href="#">info@company.com</a></li>
                        </ul>
                        <div class="contact-social">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="contact-form">
                        <h3>Send Us Your Feedback</h3>
                        {{ $errors }}
                        {!! Form::open([ 'route' => 'contact-us', 'method' => 'post', 'novalidate', 'autocomplete' => 'off']) !!}
                        <div class="form-row">
                            <div class="col-sm-6 form-group {!! $errors->has('name') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('name', old('name'), [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Name']) !!}
                                    {!! $errors->first('name', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                            <div class="col-sm-6 form-group {!! $errors->has('email') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('email', old('email'), [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Email']) !!}
                                    {!! $errors->first('email', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                            <div class="col-12 form-group {!! $errors->has('subject') ? 'error' : '' !!}">
                                <div class="controls">
                                    {!! Form::text('subject', old('subject'), [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Subject']) !!}
                                    {!! $errors->first('subject', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                            <div class="col-12 form-group {!! $errors->has('message') ? 'error' : '' !!}">
                                <div class="controls">
                                {!! Form::textarea('message', old('message'), [ 'id'=>'message','class' => 'msg-area form-control','data-validation-required-message' => 'This field is required', 'placeholder' => 'Message']) !!}
                                {!! $errors->first('message', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                            <div class="col-12">
                                {!! Form::submit('Submit Your Message', ['id'=>'submit']) !!}
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
    <script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {--!! Toastr::message() !!--}
    <script>
        function differentProblem() {
            randomNum1 = Math.floor((Math.random() * 10) + 1);
            randomNum2 = Math.floor((Math.random() * 10) + 1);
            $("#random1").empty().append(randomNum1);
            $("#random2").empty().append(randomNum2);
            $("#usernumber").val("");
        }

        function checkInputValCapt(e) {
            humanNumber = $(e).val();
            randomTotal = randomNum1 + randomNum2;
            $("#randtotal").val(randomTotal);
            if (randomTotal == humanNumber) {
                $(e).removeClass('err-input');
            } else {
                $(e).addClass('err-input');
            }
        }

        //Running a first time to get numbers set
        $(document).ready(function () {
            differentProblem();
        });

    </script>
@endpush
