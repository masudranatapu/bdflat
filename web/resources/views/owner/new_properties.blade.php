@extends('layouts.app')
@section('owner-properties','active')
@push('custom_css')

@endpush

@section('content')
 <!--
     ============  advertisment    ============
 -->

 <div class="advertisment-sec">
    <!-- container -->
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-5 d-none d-md-block">
                @include('owner._left_menu')
            </div>
            <div class="col-sm-12 col-md-8">
                 <div class="advertisment-wrap">
                      <div class="advertis-seller d-lg-flex">
                          <h5>Advertisment Type:</h5>
                          <form action="#" method="post">
                                <input type="radio" name="signup" value="sell" id="sell"> <label for="sell">Sell</label>
                                <input type="radio" name="signup" value="rent" id="rent"> <label for="rent">Rent</label>
                                <input type="radio" name="signup" value="roommate" id="roommate"> <label for="roommate">Roommate</label>
                          </form>
                      </div>
                      <div class="advertisment-form">
                        <form action="#" method="post" enctype="multipart/form-data">
                            <!-- property type  -->
                             <div class="row form-group">
                                  <label class="col-sm-4 advertis-label">Property Type:</label>
                                  <div class="col-sm-8">
                                       <div class="form-group">
                                            <select class="form-control" name="property" id="property">
                                                <option>Select property type</option>
                                                <option>Select property type</option>
                                                <option>Select property type</option>
                                                <option>Select property type</option>
                                                <option>Select property type</option>
                                            </select>
                                        </div>
                                  </div>
                              </div>

                              <!-- city  -->
                             <div class="row form-group">
                                  <label class="col-sm-4 advertis-label">City <span class="required">*</span>:</label>
                                  <div class="col-sm-8">
                                       <div class="form-group">
                                            <select class="form-control" name="city" id="city">
                                                <option>Select City</option>
                                                <option>Dhaka</option>
                                                <option>Barisal</option>
                                                <option>Khulna</option>
                                                <option>Sylhet</option>
                                            </select>
                                        </div>
                                  </div>
                              </div>

                            <!--  area  -->
                             <div class="row form-group">
                                  <label class="col-sm-4 advertis-label">Area(based on city)<span class="required">*</span>:</label>
                                  <div class="col-sm-8">
                                       <div class="form-group">
                                            <select class="form-control" name="area" id="area">
                                                <option>Select Area</option>
                                                <option>Gulshan</option>
                                                <option>Banani</option>
                                                <option>Jatrabari</option>
                                                <option>Uttara</option>
                                            </select>
                                        </div>
                                  </div>
                              </div>

                             <!--  address  -->
                             <div class="row form-group">
                                  <label class="col-sm-4 advertis-label">Address<span class="required">*</span>:</label>
                                  <div class="col-sm-8">
                                       <div class="form-group">
                                             <input type="text" class="form-control" name="address" id="address" placeholder="Address">
                                        </div>
                                  </div>
                              </div>

                              <!--  condition  -->
                             <div class="row form-group">
                                  <label class="col-sm-4 advertis-label">Condition <span class="required">*</span>:</label>
                                  <div class="col-sm-8">
                                       <div class="form-group">
                                            <select class="form-control" name="condition" id="condition">
                                                <option>Select Conditon</option>
                                                <option>Select Conditon</option>
                                            </select>
                                        </div>
                                  </div>
                              </div>

                            <!--  Property Size & Price  -->
                          <div class="advertisment-title">
                              <h3>Property Size & Price <button type="button" class="btn btn-xs btn-danger">+ Add new size</button></h3>
                          </div>
                           <div class="row no-gutters form-group">
                                <div class="col-6 col-md-3">
                                   <div class="form-group">
                                        <input type="number" class="form-control" name="size" id="size" placeholder="Size in sft">
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                    <div class="form-group">
                                        <select class="form-control" name="bedroom" id="bedroom">
                                            <option>Bedroom</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                        </select>
                                    </div>
                                </div>
                                 <div class="col-6 col-md-3">
                                    <div class="form-group">
                                        <select class="form-control" name="bathroom" id="bathroom">
                                            <option>Bathroom</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                   <div class="form-group">
                                        <input type="number" class="form-control" name="price" id="price" placeholder="Price">
                                    </div>
                                </div>
                            </div>

                            <!--  property price   -->
                             <div class="row form-group">
                                  <label class="col-sm-4 advertis-label">Property price is:</label>
                                  <div class="col-sm-8">
                                      <div class="form-group">
                                           <input type="radio" name="radio" value="fixed" id="fixed"> <label for="fixed">Fixed</label>
                                           <input type="radio" name="radio" value="nagotiable" id="nagotiable"> <label for="nagotiable">Nagotiable</label>
                                      </div>
                                  </div>
                              </div>

                            <!--  Additional Infomation  -->
                            <div class="advertisment-title">
                                <h3>Additional Infomation</h3>
                            </div>
                             <div class="row form-group">
                                  <label class="col-sm-4 advertis-label">Total Number Of Floor:</label>
                                  <div class="col-sm-8">
                                       <div class="form-group">
                                            <select class="form-control" name="floor" id="floor">
                                                <option>Ground Floor</option>
                                                <option>1 Floor</option>
                                                <option>2 Floor</option>
                                                <option>3 Floor</option>
                                            </select>
                                        </div>
                                  </div>
                              </div>
                              <div class="row form-group">
                                  <label class="col-sm-4 advertis-label">Floor Available:</label>
                                  <div class="col-sm-8">
                                      <div class="form-group">
                                            <input type="radio" name="radio" value="ground" id="ground"> <label for="ground">Ground Floor</label>
                                           <input type="radio" name="radio" value="1stfloor" id="1stfloor"> <label for="1stfloor">1st Floor</label>
                                       </div>
                                  </div>
                              </div>
                              <div class="row form-group">
                                  <label class="col-sm-4 advertis-label">Facing:</label>
                                  <div class="col-sm-8">
                                       <div class="form-group">
                                            <select class="form-control" name="facing" id="facing">
                                                <option>Select facing</option>
                                                <option>Select facing</option>
                                                <option>Select facing</option>
                                                <option>Select facing</option>
                                            </select>
                                        </div>
                                  </div>
                              </div>
                              <div class="row form-group">
                                  <label class="col-sm-4 advertis-label">Handover Date:</label>
                                  <div class="col-sm-8">
                                       <div class="form-group">
                                             <input type="text" name="datepicker" class="form-control" id="datepicker">
                                        </div>
                                  </div>
                              </div>
                              <div class="row form-group">
                                  <label class="col-sm-4 advertis-label">Descriptions:</label>
                                  <div class="col-sm-8">
                                       <div class="form-group">
                                              <textarea name="msg-form" id="msg-form" class="msg-area form-control" rows="4" placeholder="Type here"></textarea>
                                        </div>
                                  </div>
                              </div>

                            <!--  features  -->
                            <div class="advertisment-title">
                                <h3>Features</h3>
                            </div>
                            <div class="row form-group">
                                  <div class="col-lg-12">
                                      <div class="form-group">
                                            <input type="radio" name="radio" value="parking" id="parking"> <label for="parking">Parking</label>
                                            <input type="radio" name="radio" value="gas" id="gas"> <label for="gas">Gas</label>
                                            <input type="radio" name="radio" value="water" id="water"> <label for="water">Water</label>
                                            <input type="radio" name="radio" value="generator" id="generator"> <label for="generator">Generator</label>
                                       </div>
                                  </div>
                              </div>
                            <!--  facilities   -->
                            <div class="advertisment-title">
                                <h3>Facilities Within 1km</h3>
                            </div>
                              <div class="row form-group">
                                  <div class="col-lg-12">
                                      <div class="form-group">
                                            <input type="radio" name="radio" value="busstand" id="busstand"> <label for="busstand">Bus stand</label>
                                            <input type="radio" name="radio" value="supershop" id="supershop"> <label for="supershop">Super Shop</label>
                                            <input type="radio" name="radio" value="Hospital" id="Hospital"> <label for="Hospital">Hospital</label>
                                            <input type="radio" name="radio" value="school" id="school"> <label for="school">School</label>
                                       </div>
                                  </div>
                              </div>
                             <!--  map   -->
                            <div class="advertisment-title">
                                <h3>Property Location on Map</h3>
                            </div>
                            <div class="property-map mb-3">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d233667.8223964362!2d90.27923941726908!3d23.780887453986505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2sDhaka!5e0!3m2!1sen!2sbd!4v1618505395009!5m2!1sen!2sbd" style="border:0; width:100%; height:200px;" allowfullscreen="" loading="lazy"></iframe>
                            </div>

                             <!--  image & video   -->
                            <div class="advertisment-title">
                                <h3>Image & Videos</h3>
                            </div>
                            <div class="row form-group mb-5">
                                <label class="col-sm-4 advertis-label">Image</label>
                                <div class="col-sm-8">
                                      <label for="imageFile" class="et_pb_contact_form_label"></label>
                                      <input type="file" id="imageFile" class="file-upload">
                                </div>
                            </div>

                            <div class="row form-group video-tag">
                                <label class="col-sm-4 advertis-label">Video:</label>
                                <div class="col-sm-8">
                                     <div class="form-group">
                                            <input type="text" name="videoURL" id="videoURL" class="form-control" placeholder="Paste your youtube video URL">
                                      </div>
                                </div>
                            </div>


                            <!--   property owner   -->
                            <div class="advertisment-title">
                                <h3>Property Owner Details</h3>
                            </div>
                             <div class="row form-group">
                                  <label class="col-sm-4 advertis-label">Contact Person:</label>
                                  <div class="col-sm-8">
                                       <div class="form-group">
                                              <input type="text" name="contactPerson" id="contactPerson" class="form-control" placeholder="Auto fill owner name except agent user">
                                        </div>
                                  </div>
                              </div>
                              <div class="row form-group">
                                  <label class="col-sm-4 advertis-label">Mobile:</label>
                                  <div class="col-sm-8">
                                       <div class="form-group">
                                              <input type="number" name="mobileNum" id="mobileNum" class="form-control" placeholder="Property Owner Number">
                                        </div>
                                  </div>
                              </div>

                            <!--  listing  type -->
                            <div class="advertisment-title">
                                <h3>Listing Type</h3>
                            </div>
                            <div class="listing-list mb-3">
                                <input type="radio" name="radio" checked="" value="geralListing" id="geralListing"> <label for="geralListing">General Listing for 30 days</label>

                                <input type="radio" name="radio" value="feturListing" id="feturListing"> <label for="feturListing">Feature LIsting for 30 days</label>

                                <input type="radio" name="radio" value="dailyGeral" id="dailyGeral"> <label for="dailyGeral">General Listing with daily auto update for 30 days</label>

                                <input type="radio" name="radio" value="dailyFea" id="dailyFea"> <label for="dailyFea">Feature Listing with daily auto update for 30 days</label>
                            </div>

                            <!--  submit button  -->
                            <div class="advertisment-btn">
                                 <input type="submit" name="submit" id="submit" value="Submit">
                            </div>

                        </form>
                    </div>
                 </div>
            </div>

    </div><!-- container -->
</div>



@endsection

@push('custom_js')

@endpush
