@extends('layouts.app')
@section('contacted-properties','active')
@push('custom_css')


@endpush

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

          <div class="col-md-4 mb-5 d-none d-md-block">
            @include('seeker._left_menu')
          </div>

          <div class="col-sm-12 col-md-8">
            <div class="refund-wrap text-center">
               <h1>Hi, you are claiming amount for<br/> Property ID 100002</h1>
               <form action="#">
                   <div class="row d-flex justify-content-center">
                       <div class="col-sm-7 col-md-6">
                           <div class="form-group">
                               <label for="claiming">Claiming Reason</label>
                               <select class="form-control" id="claiming">
                                   <option>Claiming Reason</option>
                                   <option>Claiming Reason</option>
                                   <option>Claiming Reason</option>
                                   <option>Claiming Reason</option>
                                   <option>Claiming Reason</option>
                               </select>
                           </div>
                           <div class="form-group">
                               <label for="claiming">Your Comments</label>
                               <textarea class="form-control" id="msg" rows="5" placeholder="Type your comments"></textarea>
                           </div>
                       </div>
                   </div>
               </form>
               <h3>Claiming Reason</h3>
               <h2>BDT 75.00</h2>
               <a href="#">Submit</a>
           </div>
       </div>

      </div><!-- row -->
  </div><!-- container -->
</div>


@endsection

@push('custom_js')

@endpush
