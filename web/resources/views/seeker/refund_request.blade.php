@extends('layouts.app')
@section('contacted-properties','active')
@push('custom_css')
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/forms/validation/form-validation.css')}}">
    <style>
        .help-block{
            text-align: left !important;
            display: block !important;
            font-size: 12px !important;
            font-family: 'Montserrat-Medium' !important;
        }
    </style>
@endpush

<?php
$product_list_details = $data['product_list_details'] ?? [];
$refund_reason = $data['refund_reason'] ?? [];
?>

@section('content')
    <!--
     ============   dashboard   ============
 -->
    <!--
         ============   dashboard   ============
     -->
    <div class="dashboard-sec">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <div class="col-md-3 mb-5 d-none d-md-block">
                    @include('common._left_menu')
                </div>

                <div class="col-sm-12 col-md-9">
                    <div class="refund-wrap text-center">
                        <h1>Hi, you are claiming amount for<br/> Property ID {{$product_list_details->CODE}}</h1>
                        {!! Form::open([ 'route' => 'refund-request.store', 'method' => 'post', 'novalidate', 'autocomplete' => 'off']) !!}
                        {!! Form::hidden('f_listing_no',$product_list_details->PK_NO,['id' => 'f_listing_no']) !!}
                        {!! Form::hidden('request_amount',$data['lead_payment']->AMOUNT,['id' => 'request_amount']) !!}
                        <div class="row d-flex justify-content-center">
                            <div class="col-sm-7 col-md-6">
                                <div class="form-group {!! $errors->has('claiming') ? 'error' : '' !!}">
                                    <div class="controls">
                                        {!! Form::label('claiming','Claiming Reason <span class="required">*</span>:', ['class' => 'advertis-label'], false) !!}
                                        {!! Form::select('claiming', $refund_reason, old('claiming'), array('class'=>'form-control', 'placeholder'=>'Select Reason','data-validation-required-message' => 'This field is required')) !!}
                                        {!! $errors->first('claiming', '<label class="help-block text-danger text-left">:message</label>') !!}
                                    </div>
                                </div>
                                <div class="form-group {!! $errors->has('comment') ? 'error' : '' !!}">
                                    {{ Form::label('comment','Your Comments <span class="required">*</span>',['class' => 'advertis-label'],false) }}
                                    <div class="controls">
                                        {!! Form::textarea('comment', old('comment'), [ 'id'=>'comment','class' => 'msg-area form-control', 'placeholder' => 'Type your comments','data-validation-required-message' => 'This field is required']) !!}
                                        {!! $errors->first('comment', '<label class="help-block text-danger text-left">:message</label>') !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3>Claiming Amount</h3>
                        <h2>BDT {{number_format($data['lead_payment']->AMOUNT,2)}}</h2>
{{--                        <a href="#">Submit</a>--}}
                        <div class="advertisment-btn mt-3">
                            {!! Form::submit('submit', ['id'=>'submit']) !!}
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
@endpush
