@extends('layouts.app')
@section('owner-properties','active')
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
          <div class="col-md-4 mb-5 d-none d-md-block">
            @include('owner._left_menu')
          </div>
          <div class="col-sm-12 col-md-8">
            <div class="account-details">
                 <!-- properties -->
                 <div class="property-wrapper">
                     <div class="new-property">
                          <div class="property-heading">
                             <h3><a href="{{ route('owner-listings') }}"><i class="fa fa-long-arrow-left"></i>My Properties</a> <a href="{{ route('listings.create') }}" style="float: right;">Add new</a></h3>
                         </div>

                         <!-- product -->
                         <div class="property-product mb-2">
                             <div class="row no-gutters position-relative">
                                 <div class="col-3">
                                     <div class="property-bx">
                                         <a href="details.html"><img src="{{ asset('/assets/img/product/6.jpg') }}" class="w-100" alt="image"></a>
                                     </div>
                                     <div class="featured">
                                         <div class="feature-text">
                                             <span>Featured</span>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-9 position-static">
                                     <h5 class="mt-0"><a href="details.html">Apple MacBook Pro with Retina Display</a></h5>
                                     <a href="#" class="location"><i class="fa fa-map-marker"></i>Gulshan, Dhaka</a>
                                     <div class="owner-info">
                                         <ul>
                                             <li><i class="fa fa-edit"></i><a href="#">Edit</a></li>
                                             <li><i class="fa fa-times"></i><a href="#">Delete</a></li>
                                             <li class="float-right"><i class="fa fa-check"></i></li>
                                         </ul>
                                     </div>
                                 </div>
                             </div>
                         </div>

                          <!-- product -->
                         <div class="property-product">
                             <div class="row no-gutters position-relative">
                                 <div class="col-3">
                                     <div class="property-bx">
                                         <a href="details.html"><img src="{{ asset('/assets/img/product/6.jpg') }}" class="w-100" alt="image"></a>
                                     </div>
                                 </div>
                                 <div class="col-9 position-static">
                                     <h5 class="mt-0"><a href="details.html">Apple MacBook Pro with Retina Display</a></h5>
                                     <a href="#" class="location"><i class="fa fa-map-marker"></i>Gulshan, Dhaka</a>
                                     <div class="owner-info">
                                         <ul>
                                             <li><i class="fa fa-edit"></i><a href="#">Edit</a></li>
                                             <li><i class="fa fa-times"></i><a href="#">Delete</a></li>
                                             <li class="float-right"><i class="fa fa-check"></i></li>
                                         </ul>
                                     </div>
                                 </div>
                             </div>
                         </div>

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
