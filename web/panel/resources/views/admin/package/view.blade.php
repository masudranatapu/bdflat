@extends('admin.layout.master')
<!--push from page-->
@push('custom_css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/selects/select2.min.css') }}">

<!--for file uploads-->
<link rel="stylesheet" href="{{ asset('app-assets/file_upload/image-uploader.min.css')}}">
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<!--for tooltip-->
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-tooltip.css')}}">

<!--for image gallery-->
<link rel="stylesheet" href="{{ asset('app-assets/lightgallery/dist/css/lightgallery.min.css') }}">

@endpush('custom_css')

@section('dashboard','active')

@section('title') @lang('package.packageview') @endsection

@section('page-name') @lang('package.packageview') @endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('product.breadcrumb_title')  </a></li>
<li class="breadcrumb-item active">@lang('package.packageview')    </li>
@endsection

<?php
    $roles = userRolePermissionArray();
    $active_tab = request('tab') ?? 1;
    $variant_id = request('variant_id') ?? null;
    $type = request('type') ?? null;
?>

@section('content')
<div class="content-body">
    <div class="row">
        <div class="col-md-6">
            <div class="card card-sm">
                    <div class="card-header">
                        @if(hasAccessAbility('new_role', $roles))
                        <a class="btn btn-round btn-sm btn-primary text-white" href="{{route('admin.package.create')}}" title="ADD NEW PRODUCT CUSTOMER"><i class="ft-plus text-white"></i> @lang('package.package_create_btn')</a>
                        @endif

                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="package" >Package Name</label>
                                        <input type="text" class="form-control" name="package" value="Basic">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="package" >Package Price</label>
                                        <input type="text" class="form-control" name="package" value="Price">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="package" >Feature One</label>
                                        <input type="text" class="form-control" name="package" value="10 Ads Monthly">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="package" >Feature Two</label>
                                        <input type="text" class="form-control" name="package" value="10 Ads Monthly">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="package" >Feature Three</label>
                                        <input type="text" class="form-control" name="package" value="10 Ads Monthly">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="package" >Feature Four</label>
                                        <input type="text" class="form-control" name="package" value="10 Ads Monthly">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="package" >Feature Five</label>
                                        <input type="text" class="form-control" name="package" value="10 Ads Monthly">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="package" >Feature Six</label>
                                        <input type="text" class="form-control" name="package" value="10 Ads Monthly">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="package" >Package Seven</label>
                                        <input type="text" class="form-control" name="package" value="10 Ads Monthly">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-actions text-center mt-3">
                                <a href="">
                                    <button type="button" class="btn btn-success mr-1">
                                        Update
                                    </button>
                                </a>
                                <a href="">
                                    <button type="button" class="btn btn-warning mr-1">
                                        <i class="ft-x"></i>@lang('form.btn_cancle')
                                    </button>
                                </a>
                            </div>
                          
                        </div>
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

    });

 </script>



 @endpush('custom_js')
