@extends('layouts.app')
@section('developer-leads','active')
@push('custom_css')
@endpush

@php
    $listings = $data['listing'] ?? [];
@endphp

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
                                    <h3>
                                        <a href="{{ route('developer-leads') }}"><i class="fa fa-long-arrow-left"></i>Leads</a>
                                        <a href="{{ route('buy-leads') }}"class="link" style="float: right">Buy Leads</a>
                                    </h3>
                                </div>

                                <table class="table table-striped text-center" style="font-family: 'Montserrat-Medium';font-size: 14px">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>LID</th>
                                        <th>Name</th>
                                        <th>Received Date</th>
                                        <th>Lead Type</th>
                                        {{-- <th>Status</th> --}}
                                        <th>Actions</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @php($i=1)
                                    @if($listings->count()>0)
                                        @foreach($listings as $item)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$item->getRequirements->getUser->CODE}}</td>
                                                <td>{{$item->getRequirements->getUser->NAME}}</td>
                                                <td>{{date('d M, Y',strtotime($item->CREATED_AT))}}</td>
                                                <td>
                                                    @if($item->LEAD_TYPE == 0)
                                                        <span class="text-success">100% Matched</span>
                                                    @else
                                                        <span class="text-danger">Force Lead</span>
                                                    @endif
                                                </td>
                                                {{-- <td>
                                                    @if($item->STATUS == 0)
                                                        <span class="text-danger">Pending</span>
                                                    @elseif($item->STATUS == 1)
                                                        <span class="text-success">Purchased</span>
                                                    @elseif($item->STATUS == 2)
                                                        <span class="text-danger">Denied By  Developer</span>
                                                    @endif
                                                </td> --}}
                                                <td width="20%">
                                                    <a href="{{route('developer-leads-details',$item->PK_NO)}}" class="text-info">Details</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <div class="row no-gutters">
                                            <div class="col-12">
                                                <h6 class="font-weight-bold text-danger text-center">No Data Found!</h6>
                                            </div>
                                        </div>
                                    @endif
                                    </tbody>
                                </table>
{{ $listings->links() }}
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
