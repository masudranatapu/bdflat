@extends('layouts.app')

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
              <div class="dashboard-wrapper">
                   @include('users._user_dashboard_menu')
              </div>
          </div>

          <div class="col-sm-12 col-md-8">
               <div class="requirement">
                     <div class="property-title mb-4">
                        <h3>Property Requirements</h3>
                     </div>
                     <form action="#" method="post">
                        <!-- city & location -->
                          <div class="select-city" data-toggle="modal" data-target="#exampleModal">
                              <h4>
                                  <i class="fa fa-map-marker"></i>Select location / City<br/>
                                  <i class="fa fa-angle-right float-right"></i>
                              </h4>
                          </div>
                          <!-- city &  locations -->
                          <div class="city-location">    
                              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                          <div class="modal-content">
                                                <div class="modal-header">
                                                       <h5 class="modal-title" id="exampleModalLabel">
                                                           Select City or Division | <a href="#">All of Bangladesh</a>
                                                       </h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                      </button>
                                                </div>
                                                <div class="modal-body">
                                                   <div class="row">
                                                        <div class="col-12">
                                                          <div class="nav modalcategory flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                                                            <div class="city_title">
                                                                  <h3><i class="fa fa-tags"></i>Cities</h3>
                                                            </div>
                                                            <a class="nav-link" id="v-pills-dhaka-tab" data-toggle="pill" href="#v-pills-dhaka" role="tab" aria-controls="v-pills-dhaka" aria-selected="true">Dhaka <i class="fa fa-angle-right float-right"></i></a>

                                                            <a class="nav-link" id="v-pills-chattogram-tab" data-toggle="pill" href="#v-pills-chattogram" role="tab" aria-controls="v-pills-chattogram" aria-selected="false">Chattogram<i class="fa fa-angle-right float-right"></i></a>

                                                            <a class="nav-link" id="v-pills-sylhet-tab" data-toggle="pill" href="#v-pills-sylhet" role="tab" aria-controls="v-pills-sylhet" aria-selected="false">Messages<i class="fa fa-angle-right float-right"></i></a>

                                                            <a class="nav-link" id="v-pills-khulna-tab" data-toggle="pill" href="#v-pills-khulna" role="tab" aria-controls="v-pills-khulna" aria-selected="false">Khulna<i class="fa fa-angle-right float-right"></i></a>
                                                          </div>
                                                        </div>

                                                        <div class="col-12">
                                                          <div class="tab-content modalsubcategory" id="v-pills-tabContent">
                                                              <div class="backcategory">
                                                                   <h4><i class="fa fa-long-arrow-left"></i>Back</h4>
                                                              </div>
                                                                <div class="tab-pane fade show" id="v-pills-dhaka" role="tabpanel" aria-labelledby="v-pills-dhaka-tab">
                                                                     <div class="city-wrap">
                                                                          <div class="city-list">
                                                                              <h3><i class="fa fa-map-marker"></i>Dhaka</h3>
                                                                              <ul>
                                                                                  <li><a href="#">Mohammadpur</a></li>
                                                                                  <li><a href="#">Mogbazar</a></li>
                                                                                  <li><a href="#">Banglamotor</a></li>
                                                                                  <li><a href="#">Uttara</a></li>
                                                                                  <li><a href="#">Elephant Road</a></li>
                                                                                  <li><a href="#">Savar</a></li>
                                                                              </ul>
                                                                          </div>
                                                                     </div>
                                                                </div>

                                                                <div class="tab-pane fade" id="v-pills-chattogram" role="tabpanel" aria-labelledby="v-pills-chattogram-tab">
                                                                    <div class="city-wrap">
                                                                          <div class="city-list">
                                                                              <h3><i class="fa fa-map-marker"></i>Chattogram</h3>
                                                                              <ul>
                                                                                  <li><a href="#">Mohammadpur</a></li>
                                                                                  <li><a href="#">Mogbazar</a></li>
                                                                                  <li><a href="#">Banglamotor</a></li>
                                                                                  <li><a href="#">Uttara</a></li>
                                                                                  <li><a href="#">Elephant Road</a></li>
                                                                                  <li><a href="#">Savar</a></li>
                                                                              </ul>
                                                                          </div>
                                                                     </div>
                                                                </div>

                                                                <div class="tab-pane fade" id="v-pills-sylhet" role="tabpanel" aria-labelledby="v-pills-sylhet-tab">
                                                                     <div class="city-wrap">
                                                                          <div class="city-list">
                                                                              <h3><i class="fa fa-map-marker"></i>Sylhet</h3>
                                                                              <ul>
                                                                                  <li><a href="#">Mohammadpur</a></li>
                                                                                  <li><a href="#">Mogbazar</a></li>
                                                                                  <li><a href="#">Banglamotor</a></li>
                                                                                  <li><a href="#">Uttara</a></li>
                                                                                  <li><a href="#">Elephant Road</a></li>
                                                                                  <li><a href="#">Savar</a></li>
                                                                              </ul>
                                                                          </div>
                                                                     </div>
                                                                </div>

                                                                <div class="tab-pane fade" id="v-pills-khulna" role="tabpanel" aria-labelledby="v-pills-khulna-tab">
                                                                     <div class="city-wrap">
                                                                          <div class="city-list">
                                                                              <h3><i class="fa fa-map-marker"></i>Khulna</h3>
                                                                              <ul>
                                                                                  <li><a href="#">Mohammadpur</a></li>
                                                                                  <li><a href="#">Mogbazar</a></li>
                                                                                  <li><a href="#">Banglamotor</a></li>
                                                                                  <li><a href="#">Uttara</a></li>
                                                                                  <li><a href="#">Elephant Road</a></li>
                                                                                  <li><a href="#">Savar</a></li>
                                                                              </ul>
                                                                          </div>
                                                                     </div>
                                                                </div>
                                                          </div>
                                                       </div>
                                                   </div>
                                              </div>
                                          </div>
                                    </div>
                              </div>
                          </div>

                          <!-- Looking property for -->
                           <div class="row form-group">
                              <label class="col-md-4 label-title">Looking property for:</label>
                              <div class="col-md-8 property-looking">
                                  <input type="radio" name="itemCon" value="buy" id="buy"> 
                                  <label for="buy">Buy</label>
                                  <input type="radio" name="itemCon" value="rent" id="rent"> 
                                  <label for="rent">Rent</label>
                              </div>
                          </div>

                          <!--  property type -->
                          <div class="row form-group property-type">
                              <label class="col-md-4 label-title">Property Type:</label>
                              <div class="col-md-8">
                                    <select class="form-control" id="property-type">
                                        <option>Apartment</option>
                                        <option>Land</option>
                                        <option>Roommate</option>
                                        <option>Building or House</option>
                                        <option>Office Space</option>
                                        <option>Duplex Home</option>
                                        <option>Room</option>
                                        <option>Industrial Space</option>
                                        <option>Warehouse</option>
                                        <option>Shop</option>
                                        <option>Garage</option>
                                    </select>
                              </div>
                          </div>

                          <!-- property size -->
                          <div class="row form-group property-size">
                               <label class="col-md-4 label-title">Property Size:</label>
                               <div class="col-md-8">
                                   <div class="row">
                                        <div class="col-5">
                                             <div class="property-form">
                                                <input type="number" id="minimun" class="form-control" placeholder="minimun Size">
                                             </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="size-middle text-center">
                                               <span>To</span>
                                             </div>
                                        </div>
                                        <div class="col-5">
                                             <div class="property-form">
                                                <input type="number" id="maximum" class="form-control" placeholder="Maximum Size">
                                             </div>
                                        </div>
                                   </div>
                               </div>
                          </div>

                          <!-- property budget -->
                          <div class="row form-group property-size">
                               <label class="col-md-4 label-title">Property Budget:</label>
                               <div class="col-md-8">
                                   <div class="row">
                                        <div class="col-5">
                                             <div class="property-form">
                                                <input type="number" id="minimun" class="form-control" placeholder="minimun">
                                             </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="size-middle text-center">
                                               <span>To</span>
                                             </div>
                                        </div>
                                        <div class="col-5">
                                             <div class="property-form">
                                                <input type="number" id="maximum" class="form-control" placeholder="Maximum">
                                             </div>
                                        </div>
                                   </div>
                               </div>
                          </div>

                          <!-- Bedroom  -->
                          <div class="row bedroom-select">
                              <div class="col-md-4">
                                    <h4>Bedroom</h4>
                              </div>
                              <div class="col-md-8">
                                    <label for="any">
                                         <input type="checkbox" name="rooms" value="any" id="any">Any
                                         <span class="checkmark"></span>
                                     </label>
                                     <label for="1bed">
                                         <input type="checkbox" name="rooms" value="1bed" id="1bed">1
                                         <span class="checkmark"></span>
                                     </label>
                                     <label for="2bed">
                                         <input type="checkbox" name="rooms" value="2bed" id="2bed">2
                                         <span class="checkmark"></span>
                                     </label>
                                     <label for="3bed">
                                         <input type="checkbox" name="rooms" value="3bed" id="3bed">3
                                         <span class="checkmark"></span>
                                     </label>
                                     <label for="4plus">
                                         <input type="checkbox" name="rooms" value="4plus" id="4plus">4 +
                                         <span class="checkmark"></span>
                                     </label> 
                              </div>
                          </div>

                           <!-- Looking property for -->
                           <div class="row form-group property-condition">
                              <label class="col-md-4 label-title">Property Condition (Only Buy):</label>
                              <div class="col-md-8 property-checkbox">
                                  <label for="ready">
                                     <input type="checkbox" name="condition" value="ready" id="ready">Ready
                                     <span class="checkmark"></span>
                                  </label>
                                  
                                  <label for="semi">
                                     <input type="checkbox" name="condition" value="semi" id="semi"> Semi Ready
                                     <span class="checkmark"></span>
                                  </label>
                                  
                                  <label for="ongoing">
                                      <input type="checkbox" name="condition" value="ongoing" id="ongoing"> Ongoing
                                      <span class="checkmark"></span>
                                  </label>
                                  
                                  <label for="Used">
                                      <input type="checkbox" name="condition" value="Used" id="Used"> Used
                                      <span class="checkmark"></span>
                                  </label>

                              </div>
                          </div>

                          <!-- requirement details -->
                          <div class="row form-group requirement-detail">
                              <label class="col-md-4 label-title">Requirement Details</label>
                              <div class="col-md-8">
                                   <textarea class="form-control" id="requirement-details" rows="6" placeholder="Type Here"></textarea>
                              </div>
                          </div>

                          <!-- perferred time -->
                          <div class="row form-group perferred-time">
                               <label class="col-md-4 label-title">Preferred time to contact:</label>
                               <div class="col-md-8">
                                    <div class="size-form">
                                        <input type="time" id="time" name="time" class="form-control">
                                    </div>
                               </div>
                          </div>

                          <!-- email alert -->
                           <div class="row form-group email-alert">
                              <label class="col-md-4 label-title">Email Alert</label>
                              <div class="col-md-8">
                                  <input type="radio" name="alert" value="daily" id="daily"> 
                                  <label for="daily">Daily</label>
                                  <input type="radio" name="alert" value="weekly" id="weekly"> 
                                  <label for="weekly">Weekly</label>
                                   <input type="radio" name="alert" value="monthly" id="monthly"> 
                                  <label for="monthly">Monthly</label>
                              </div>
                          </div>

                          <div class="submit_btn">
                              <div class="row">
                                  <div class="col-4"></div>
                                  <div class="col-8">
                                      <input type="submit" name="submit" value="Submit">
                                  </div>
                              </div>
                          </div>

                     </form>
                </div>
           </div>

      </div><!-- row -->
  </div><!-- container -->
</div>

@endsection

@push('custom_js')

@endpush
