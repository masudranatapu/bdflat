@extends('layouts.app')
@section('developer-buy-leads','active')
@push('custom_css')

@endpush
<?php
$listings = $data['listing'] ?? [];
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
                <div class="col-md-3 mb-5 d-none d-md-block">
                    @include('common._left_menu')
                </div>
                <div class="col-sm-12 col-md-9">
                    <div class="account-details">
                        <!-- properties -->
                        <div class="property-wrapper">
                            <div class="new-property">
                                <div class="property-heading">
                                    <h3><a href="{{ route('owner-listings') }}"><i class="fa fa-long-arrow-left"></i>My Properties</a> <a
                                            href="{{ route('listings.create') }}" style="float: right;">Add new</a></h3>
                                </div>

                                <!-- product -->
                                <table class="table table-striped text-center" style="font-family: 'Montserrat-Medium';font-size: 14px">
                                    <thead>
                                    <tr>
                                        <th>PID</th>
                                        <th>Name</th>
                                        <th>Property Type</th>
                                        <th>Looking For</th>
                                        <th>Location</th>
                                        <th>Matched</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <tr>
                                        <td>10001</td>
                                        <td>Seeker Name</td>
                                        <td>Apartment</td>
                                        <td>Buy</td>
                                        <td>Area, City</td>
                                        <td>100%</td>
                                        <td width="25%">
                                            <a href="#" class="text-info">Details</a>|
                                            <a href="#" class="text-info">Buy Now</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- row -->
        </div><!-- container -->
    </div>


@endsection

@push('custom_js')

@endpush
