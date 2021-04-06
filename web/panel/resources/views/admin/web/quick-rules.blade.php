@extends('admin.layout.master')

@section('Web Setting','open')
@section('quick_rules','active')

@section('title') @lang('web_setting.quick_rules_title') @endsection
@section('page-name') @lang('web_setting.quick_rules_title') @endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">@lang('admin_role.breadcrumb_title')  </a></li>
<li class="breadcrumb-item active">@lang('web_setting.quick_rules_title')    </li>
@endsection

<!--push from page-->
@push('custom_css')
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
@endpush('custom_css')

@section('content')

<div class="content-body">
    <section id="pagination">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-sm">
                    <div class="card-header">

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
                                        <label for="package" >Title</label>
                                        <input type="text"  class="form-control" name="title">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="package" >Sub-Title</label>
                                        <textarea class="form-control" rows="5" name="subtitle"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="package" >Rule One</label>
                                        <input type="text"  class="form-control" name="rule1">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="package" >Rule Two</label>
                                        <input type="text"  class="form-control" name="rule2">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="package" >Rule Three</label>
                                        <input type="text"  class="form-control" name="rule3">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="package" >Rule Four</label>
                                        <input type="text"  class="form-control" name="rule4">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="package" >Rule Five</label>
                                        <input type="text"  class="form-control" name="rule5">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="package" >Rule Six</label>
                                        <input type="text"  class="form-control" name="rule6">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="package" >Rule Seven</label>
                                        <input type="text"  class="form-control" name="rule7">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="package" >Rule Eight</label>
                                        <input type="text"  class="form-control" name="rule8">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="package" >Rule Nine</label>
                                        <input type="text"  class="form-control" name="rule9">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="package" >Rule Ten</label>
                                        <input type="text"  class="form-control" name="rule10">
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
