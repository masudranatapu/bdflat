@extends('layouts.app')
@section('agency-leads','active')
@push('custom_css')

@endpush

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
                             <h3><a href="{{ route('agency-leads') }}"><i class="fa fa-long-arrow-left"></i>Leads</a> <a href="{{ route('agency-buy-leads') }}" class="link" style="float: right">Buy Leads</a></h3>
                         </div>

                         <table class="table table-striped text-center" style="font-family: 'Montserrat-Medium';font-size: 14px">
                             <thead>
                             <tr>
                                 <th>LID</th>
                                 <th>Name</th>
                                 <th>Received Date</th>
                                 <th>Lead Type</th>
                                 <th>Status</th>
                                 <th>Actions</th>
                             </tr>
                             </thead>

                             <tbody>
{{--                             @if($listings->count()>0)--}}
{{--                                 @foreach($listings as $listing)--}}
                                     <tr>
                                         <td>10001</td>
                                         <td>Seeker Name</td>
                                         <td>May 29, 2021</td>
                                         <td>Project</td>
                                         <td>Positive</td>
                                         <td width="20%">
                                             <a href="#" class="text-info">Details</a>
                                         </td>
                                     </tr>
                                {{-- @endforeach
                             @else
                                 <div class="row no-gutters">
                                     <div class="col-12">
                                         <h6 class="font-weight-bold text-danger text-center">No Data Found!</h6>
                                     </div>
                                 </div>
                             @endif--}}
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
