@extends('admin.layout.master')

@section('Web Setting','open')
@section('client_query','active')

@section('title') @lang('web_setting.query_view_title') @endsection
@section('page-name') @lang('web_setting.query_view_title') @endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">@lang('admin_role.breadcrumb_title')  </a></li>
<li class="breadcrumb-item active">@lang('web_setting.query_view_title')    </li>
@endsection

<!--push from page-->
@push('custom_css')
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
@endpush('custom_css')

@section('content')

<div class="content-body">
        <section id="pagination">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-sm">
                        <div class="card-header">
                            <a class="btn btn-round btn-sm btn-primary text-white" href="" title="ADD NEW PACKAGE"><i class="ft-plus text-white"></i>All Queries</a>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
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
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="package">Name</label>
                                        <input type="text" readonly="" value="Rony" class="form-control" name="name">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                       <label for="package">Email</label>
                                        <input type="email" readonly="" value="rony@gmail.com" class="form-control" name="email">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                       <label for="package">Subject</label>
                                        <input type="text" value="ad posting" readonly="" class="form-control" name="subject">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="package">Message</label>
                                        <textarea readonly="" name="desc">hello dalal, this is rony</textarea>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-actions text-center mt-3">
                                <a href="">
                                    <button type="button" class="btn btn-success mr-1">
                                        OK
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
        </section>
    </div>


@endsection
<!--push from page-->
@push('custom_js')
<script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{ asset('app-assets/js/scripts/forms/select/form-select2.js')}}"></script>
<script type="text/javascript" src="{{ asset('app-assets/pages/customer.js')}}"></script>
<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
 <script>
        CKEDITOR.replace('desc');
        CKEDITOR.replace('desc1');
        CKEDITOR.replace('desc2');
        CKEDITOR.replace('desc3');
</script>
@endpush('custom_js')
