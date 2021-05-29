@extends('layouts.app')
@section('developer-payments','active')
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

?>

@section('content')
    <!--============   dashboard   ============-->
    <div class="dashboard-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-5 d-none d-md-block">
                    @include('common._left_menu')
                </div>
                <div class="col-sm-12 col-md-8">
                    <div class="account-details">
                        <div class="transaction-balance mb-2">
                            <div class="row">
                                <div class="col-8">
                                    <div class="transaction-amount">
                                        <h3>Balance</h3>
                                        <h1>BDT {{ number_format(Auth::user()->UNUSED_TOPUP,2) }}</h1>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="rec-balance">
                                        <a href="{{ route('recharge-balance') }}" class="btn btn-success">Recharge Balance</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                       <div class="transaction-info">
                          <h3>Transaction History</h3>
                       </div>
                       <table id="transactionTable" class="table table-responsive" >
                          <thead>
                              <tr>
                                  <th>Tran. ID</th>
                                  <th>Tran. Type</th>
                                  <th>Date</th>
                                  <th>Amount</th>
                                  <th>Note</th>
                                  <th>Balance</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td>Tiger Nixon</td>
                                  <td>System Architect</td>
                                  <td>Edinburgh</td>
                                  <td>61</td>
                                  <td>2011/04/25</td>
                                  <td>$320,800</td>
                              </tr>
                              <tr>
                                  <td>Garrett Winters</td>
                                  <td>Accountant</td>
                                  <td>Tokyo</td>
                                  <td>63</td>
                                  <td>2011/07/25</td>
                                  <td>$170,750</td>
                              </tr>



                          </tfoot>
                      </table>
                   </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('custom_js')
    <script src="{{asset('/assets/js/forms/validation/jqBootstrapValidation.js')}}"></script>
    <script src="{{asset('/assets/js/forms/validation/form-validation.js')}}"></script>
@endpush
