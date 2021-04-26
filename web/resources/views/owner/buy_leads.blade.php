@extends('layouts.app')
@section('owner-leads','active')
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
                                <h3><a href="{{ route('buy-leads') }}"><i class="fa fa-long-arrow-left"></i>Buy Leads</a> <a href="{{ route('owner-leads') }}" class="link" style="float: right">Leads</a></h3>
                            </div>
                         <!-- leads -->
                          <div class="leads-wrapper mb-2">
                                <div class="row no-gutters position-relative">
                                     <div class="col-3">
                                         <div class="leads-bx text-center">
                                             <a href="details.html"><img src="{{ asset('assets/img/seeker/1.jpg') }}" alt="image"></a>
                                         </div>
                                     </div>
                                     <div class="col-9 position-static">
                                         <div class="leads-info">
                                             <h5 class="mt-0">Seeker Name <span class="float-right">100%<br/>Mached</span></h5>
                                             <h4>Area Lead <span>LID 01299233</span></h4>
                                             <h6>January 10, 2021 <span><a href="#" class="float-right"><i class="fa fa-eye"></i>Details</a></span></h6>
                                         </div>
                                     </div>
                                 </div>
                           </div>
                           <!-- leads -->
                          <div class="leads-wrapper mb-2">
                                <div class="row no-gutters position-relative">
                                     <div class="col-3">
                                         <div class="leads-bx text-center">
                                             <a href="details.html"><img src="{{ asset('assets/img/seeker/1.jpg') }}" alt="image"></a>
                                         </div>
                                     </div>
                                     <div class="col-9 position-static">
                                         <div class="leads-info">
                                             <h5 class="mt-0">Seeker Name <span class="float-right">100%<br/>Mached</span></h5>
                                             <h4>Area Lead <span>LID 01299233</span></h4>
                                             <h6>January 10, 2021 <span><a href="#" class="float-right"><i class="fa fa-eye"></i>Details</a></span></h6>
                                         </div>
                                     </div>
                                 </div>
                           </div>
                           <!-- leads -->
                          <div class="leads-wrapper mb-2">
                                <div class="row no-gutters position-relative">
                                     <div class="col-3">
                                         <div class="leads-bx text-center">
                                             <a href="details.html"><img src="{{ asset('assets/img/seeker/1.jpg') }}" alt="image"></a>
                                         </div>
                                     </div>
                                     <div class="col-9 position-static">
                                         <div class="leads-info">
                                             <h5 class="mt-0">Seeker Name <span class="float-right">100%<br/>Mached</span></h5>
                                             <h4>Area Lead <span>LID 01299233</span></h4>
                                             <h6>January 10, 2021 <span><a href="#" class="float-right"><i class="fa fa-eye"></i>Details</a></span></h6>
                                         </div>
                                     </div>
                                 </div>
                           </div>
                           <!-- leads -->
                          <div class="leads-wrapper mb-2">
                                <div class="row no-gutters position-relative">
                                     <div class="col-3">
                                         <div class="leads-bx text-center">
                                             <a href="details.html"><img src="{{ asset('assets/img/seeker/1.jpg') }}" alt="image"></a>
                                         </div>
                                     </div>
                                     <div class="col-9 position-static">
                                         <div class="leads-info">
                                             <h5 class="mt-0">Seeker Name <span class="float-right">100%<br/>Mached</span></h5>
                                             <h4>Area Lead <span>LID 01299233</span></h4>
                                             <h6>January 10, 2021 <span><a href="#" class="float-right"><i class="fa fa-eye"></i>Details</a></span></h6>
                                         </div>
                                     </div>
                                 </div>
                           </div>
                           <!-- leads -->
                          <div class="leads-wrapper mb-5">
                                <div class="row no-gutters position-relative">
                                     <div class="col-3">
                                         <div class="leads-bx text-center">
                                             <a href="details.html"><img src="{{ asset('assets/img/seeker/1.jpg') }}" alt="image"></a>
                                         </div>
                                     </div>
                                     <div class="col-9 position-static">
                                         <div class="leads-info">
                                             <h5 class="mt-0">Seeker Name <span class="float-right">100%<br/>Mached</span></h5>
                                             <h4>Area Lead <span>LID 01299233</span></h4>
                                             <h6>January 10, 2021 <span><a href="#" class="float-right"><i class="fa fa-eye"></i>Details</a></span></h6>
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
