@extends('admin.layout.master')

@section('product_list','active')
@section('Product Management','open')

@section('title') @lang('product.product_view') @endsection
@section('page-name') @lang('product.product_view') @endsection



@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('product.breadcrumb_title')  </a></li>
<li class="breadcrumb-item active">@lang('product.breadcrumb_sub_title')    </li>
@endsection

@push('custom_css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/selects/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/lightbox.css') }}">

<!--for file uploads-->
<link rel="stylesheet" href="{{ asset('app-assets/file_upload/image-uploader.min.css')}}">
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<!--for tooltip-->
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-tooltip.css')}}">

<!--for image gallery-->
<link rel="stylesheet" href="{{ asset('app-assets/lightgallery/dist/css/lightgallery.min.css') }}">

@endpush('custom_css')


<?php 


    $roles = userRolePermissionArray();
    $active_tab = request('tab') ?? 1;
    $variant_id = request('variant_id') ?? null;
    $type = request('type') ?? null;


?>

@section('content')
<div class="content-body">
    <div class="row">
        <div class="col-md-12">
            <div class="card" >
                <div class="card-content">
                    <div class="card-body">
                        <!-- view product -->
                         <div class="row form-group">
                            <label class="col-sm-3">Type of ad<span class="required">*</span></label>
                                <div class="col-sm-9 user-type">
                                    <input type="radio" name="sellType" checked="checked" value="newsell" id="newsell"> <label for="newsell">I want to sell </label>
                                    <input type="radio" name="sellType" value="newbuy" id="newbuy"> <label for="newbuy">I want to buy</label> 
                                </div>
                            </div>
                            <div class="row form-group">
                            <label class="col-sm-3">Promotion Type<span class="required">*</span></label>
                                <div class="col-sm-9 user-type">
                                    <input type="radio" checked="checked" name="free" value="free" id="free"> <label for="newsell">free</label>
                                    <input type="radio" name="urgent" value="urgent" id="urgent"> <label for="newbuy">urgent</label> 
                                </div>
                            </div>
                            <div class="row form-group add-title">
                                <label class="col-sm-3 label-title">Ad Title<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" readonly="" class="form-control" id="text" value="new ad">
                                </div>
                            </div>
                            <div class="row form-group add-image">
                                <label class="col-sm-3 label-title">Ad Photos</label>
                                <div class="col-sm-9 adsimgview">
                                    <div class="upload-section">
                                        <a class="example-image-link" href="https://i.bikroy-st.com/fa538576-5e05-4c51-91ee-c7ef85a11b5f/160/120/cropped.webp" data-lightbox="example-set"><img class="img-thumbnail example-image" src="https://i.bikroy-st.com/fa538576-5e05-4c51-91ee-c7ef85a11b5f/160/120/cropped.webp" alt=""/></a>
                                          <a class="example-image-link" href="https://i.bikroy-st.com/fa538576-5e05-4c51-91ee-c7ef85a11b5f/160/120/cropped.webp" data-lightbox="example-set" ><img class="img-thumbnail example-image" src="https://i.bikroy-st.com/fa538576-5e05-4c51-91ee-c7ef85a11b5f/160/120/cropped.webp" alt="" /></a>
                                          <a class="example-image-link" href="https://i.bikroy-st.com/fa538576-5e05-4c51-91ee-c7ef85a11b5f/160/120/cropped.webp" data-lightbox="example-set"><img class="img-thumbnail example-image" src="https://i.bikroy-st.com/fa538576-5e05-4c51-91ee-c7ef85a11b5f/160/120/cropped.webp" alt="" /></a>
                                          <a class="example-image-link" href="https://i.bikroy-st.com/fa538576-5e05-4c51-91ee-c7ef85a11b5f/160/120/cropped.webp" data-lightbox="example-set" ><img class="img-thumbnail example-image" src="https://i.bikroy-st.com/fa538576-5e05-4c51-91ee-c7ef85a11b5f/160/120/cropped.webp" alt="" /></a>
                                    </div>  
                                </div>
                            </div>
                            <div class="row form-group select-condition">
                                <label class="col-sm-3">Condition<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="radio" checked="checked" name="itemCon" value="new" id="new"> 
                                    <label for="new">New</label>
                                    <input type="radio" name="itemCon" value="used" id="used"> 
                                    <label for="used">Used</label>
                                </div>
                            </div>
                            <div class="row form-group select-price">
                                <label class="col-sm-3 label-title">Price<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <label>BDT</label>
                                    <input type="text" readonly="" value="500" class="form-control" id="text1">
                                    <div class="checkbox mt-2">
                                     <input type="radio" checked="checked" name="price" value="negotiable" id="negotiable">
                                    <label for="negotiable">Negotiable </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group brand-name">
                                <label class="col-sm-3 label-title">Category & Subcategory<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" readonly="" class="form-control" value="mobile">
                                </div>
                            </div>
                            <div class="row form-group brand-name">
                                <label class="col-sm-3 label-title">Brand Name<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" readonly="" class="form-control" value="walton">
                                </div>
                            </div>
                            <div class="row form-group additional">
                                <label class="col-sm-3 label-title">Additional<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <div class="checkbox">
                                        <label for="camera"><input type="checkbox" name="camera" id="camera"> Camera</label>
                                        <label for="dual-sim"><input type="checkbox" name="dual-sim" id="dual-sim"> Dual SIM</label>
                                        <label for="keyboard"><input type="checkbox" name="keyboard" id="keyboard">  Physical keyboard</label>
                                        <label for="3g"><input checked="checked" type="checkbox" name="3g" id="3g"> 3G</label>

                                        <label for="gsm"><input type="checkbox" name="gsm" id="gsm"> GSM</label>

                                        <label for="screen"><input type="checkbox" name="screen" id="screen"> Touch screen</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row form-group model-name">
                                <label class="col-sm-3 label-title">Model</label>
                                <div class="col-sm-9">
                                    <input type="text" readonly="" class="form-control" id="model" value="A5">  
                                </div>
                            </div>
                            
                            <div class="row form-group item-description">
                                <label class="col-sm-3 label-title">Description<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="textarea" readonly="" rows="8">lorem</textarea>     
                                </div>
                            </div>
                            <div class="row form-group brand-name">
                                <label class="col-sm-3 label-title">Date & Time<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="25 November, 2020, 10:50 PM">
                                </div>
                            </div>
                            <div class="section seller-info">
                                <h4>Seller Information</h4>
                                <div class="row form-group">
                                    <label class="col-sm-3 label-title">Condition<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="radio" name="sellerType" value="individual" id="individual">
                                        <label for="individual">Individual</label>
                                        <input type="radio" checked="checked" name="sellerType" value="dealer" id="dealer"> 
                                        <label for="dealer">Dealer</label>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label class="col-sm-3 label-title">Your Name<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" readonly="" name="name" class="form-control" value="rony">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label class="col-sm-3 label-title">Your Email ID<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="email" readonly="" name="email" class="form-control" value="rony@gmail.com">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label class="col-sm-3 label-title">Mobile Number<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" readonly="" name="mobileNumber" class="form-control" value="01990522321">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label class="col-sm-3 label-title">Address</label>
                                    <div class="col-sm-9">
                                        <input type="text" readonly="" name="address" class="form-control" value="dhaka">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label class="col-sm-3 label-title">Action</label>
                                    <div class="col-sm-9">
                                        <a href="javascript::void(0)" onclick="return confirm('are you really sure ??')" class="btn btn-success">Accept</a>
                                        <a href="javascript::void(0)" class="btn btn-danger rejectad">Reject</a>
                                    </div>
                                </div>
                                <form action="" method="" class="d-none rejectform">
                                  <div class="row form-group item-description">
                                    <label class="col-sm-3 label-title">Reason of Reject<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="textarea" placeholder="why you will reject this ad ??" rows="8"></textarea>
                                        <input type="submit" name="reject" value="Finally Reject this Ad" class="form-control mt-1 btn-danger text-white"> 
                                    </div>
                                  </div>
                                </form>
                            </div><!-- section -->                          
                        </div><!-- card body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--/ Recent Transactions -->

@endsection
<!--push from page-->
@push('custom_js')
<script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{ asset('app-assets/js/scripts/forms/select/form-select2.js')}}"></script>
<script src="{{ asset('app-assets/js/lightbox.js')}}"></script>

<!--for image upload-->
<script type="text/javascript" src="{{ asset('app-assets/file_upload/image-uploader.min.js')}}"></script>

<!--script only for product page-->
<script type="text/javascript" src="{{ asset('app-assets/pages/product.js')}}"></script>

<!--for tooltip-->
<script src="{{ asset('app-assets/js/scripts/tooltip/tooltip.js')}}"></script>

<!--for image gallery-->
<script src="{{ asset('app-assets/lightgallery/dist/js/lightgallery.min.js')}}"></script>

<script type="text/javascript">

    //for image gallery
    $(".lightgallery").lightGallery(); 

   //product photo delete 
   $(document).on('click','.photo-delete', function(e){
    var id = $(this).attr('data-id');
    if (!confirm('Are you sure you want to delete the photo')) {
        return false;
    }
    if ('' != id) {
        var pageurl = `{{ URL::to('prod_img_delete')}}/`+id;
        $.ajax({
            type:'get',
            url:pageurl,
            async :true,
            beforeSend: function () {
                $("body").css("cursor", "progress");
                //blockUI();
            },
            success: function (data) {
                // console.log(data.status);
                if(data.status == true ){
                    $('#photo_div_'+id).hide();
                } else {
                    alert('something wrong please you should reload the page');
                }

            },
            complete: function (data) {
                $("body").css("cursor", "default");
                //$.unblockUI();
            }
        });
    }

 
})

</script>

<script>
    $(function () {
        $('.prod_def_photo_upload').imageUploader();
        $('.rejectad').click(function(){
            $('.rejectform').removeClass('d-none');
        });
    });

 </script>



 @endpush('custom_js')