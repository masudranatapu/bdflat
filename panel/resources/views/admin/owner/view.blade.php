@extends('admin.layout.master')

@push('custom_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/selects/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/file_upload/image-uploader.min.css')}}">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-tooltip.css')}}">
    <link rel="stylesheet" href="{{ asset('app-assets/lightgallery/dist/css/lightgallery.min.css') }}">
@endpush

@section('owner_list','active')
@section('title') Owner | View @endsection
@section('page-name') Owner | View @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('product.breadcrumb_title')  </a></li>
    <li class="breadcrumb-item active"> Owner view</li>
@endsection

<?php
$roles = userRolePermissionArray();
$user_type = Config::get('static_array.user_type');
$user_status = Config::get('static_array.user_status');
$owner = $data['owner'] ?? [];
?>

@section('content')
    <div class="content-body min-height">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-success">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <p><span class="font-weight-bold">User ID: </span>{{ $owner->CODE }}</p>
                                    @if($owner->USER_TYPE == 2)
                                        <p><span
                                                class="font-weight-bold">User Type: </span>{{ $user_type[$owner->USER_TYPE] }}
                                        </p>
                                        <p><span
                                                class="font-weight-bold">Listing Limit: </span>{{ $owner->LISTING_LIMIT }}
                                        </p>
                                        <p><span class="font-weight-bold">Name: </span>{{ $owner->NAME }}</p>
                                        <p><span class="font-weight-bold">Email: </span>{{ $owner->EMAIL }}</p>
                                        <p><span class="font-weight-bold">Mobile: </span>{{ $owner->MOBILE_NO }}</p>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p><span class="font-weight-bold">User Image:</span></p>
                                                <img src="{{ asset($owner->PROFILE_PIC_URL ?? '') }}" alt=""
                                                     style="width: 100%">
                                            </div>
                                        </div>
                                    @else
                                        <p><span
                                                class="font-weight-bold">User Type: </span>{{ $user_type[$owner->USER_TYPE] }}
                                        </p>
                                        <p><span
                                                class="font-weight-bold">Listing Limit: </span>{{ $owner->LISTING_LIMIT }}
                                        </p>
                                        <p><span class="font-weight-bold">Company Name: </span>{{ $owner->NAME }}</p>
                                        <p><span
                                                class="font-weight-bold">Contact Person Name: </span>{{ $owner->CONTACT_PER_NAME }}
                                        </p>
                                        <p><span class="font-weight-bold">Designation: </span>{{ $owner->DESIGNATION }}
                                        </p>
                                        <p><span class="font-weight-bold">Office Address: </span>{{ $owner->ADDRESS }}
                                        </p>
                                        <p><span class="font-weight-bold">Email: </span>{{ $owner->EMAIL }}</p>
                                        <p><span class="font-weight-bold">Mobile: </span>{{ $owner->MOBILE_NO }}</p>
                                        <p><span
                                                class="font-weight-bold">About Company: </span>{{ $owner->info->ABOUT_COMPANY ?? 'N/A' }}
                                        </p>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p><span class="font-weight-bold">Logo:</span></p>
                                                <img src="{{ asset($owner->info->LOGO ?? '') }}" alt=""
                                                     style="width: 100%">
                                            </div>
                                            <div class="col-md-3">
                                                <p><span class="font-weight-bold">Banner:</span></p>
                                                <img src="{{ asset($owner->info->BANNER ?? '') }}" alt=""
                                                     style="width: 100%">
                                            </div>
                                        </div>
                                        <h3 class="mt-2">SEO</h3>
                                        <p><span
                                                class="font-weight-bold">Meta Title: </span>{{ $owner->info->META_TITLE ?? 'N/A' }}
                                        </p>
                                        <p><span
                                                class="font-weight-bold">Site URL: </span>{{ $owner->info->SITE_URL ?? 'N/A' }}
                                        </p>
                                        <p><span
                                                class="font-weight-bold">Meta Description: </span>{{ $owner->info->META_DESCRIPTION ?? 'N/A' }}
                                        </p>
                                    @endif
                                </div>
                                <div class="col-12">
                                    <a href="{{ route('admin.owner.list') }}" class="btn btn-info">Back</a>
                                </div>
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

    <script type="text/javascript">

        //for image gallery
        $(".lightgallery").lightGallery();

        //product photo delete
        $(document).on('click', '.photo-delete', function (e) {
            var id = $(this).attr('data-id');
            if (!confirm('Are you sure you want to delete the photo')) {
                return false;
            }
            if ('' != id) {
                var pageurl = `{{ URL::to('prod_img_delete')}}/` + id;
                $.ajax({
                    type: 'get',
                    url: pageurl,
                    async: true,
                    beforeSend: function () {
                        $("body").css("cursor", "progress");
                        //blockUI();
                    },
                    success: function (data) {
                        // console.log(data.status);
                        if (data.status == true) {
                            $('#photo_div_' + id).hide();
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
