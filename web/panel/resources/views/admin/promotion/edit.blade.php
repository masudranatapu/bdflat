@extends('admin.layout.master')

@section('Promotion','open')
@section('promotion_list','active')

@section('title') @lang('promotion.promotion_title') @endsection
@section('page-name') @lang('promotion.promotion_title') @endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">@lang('admin_role.breadcrumb_title')  </a></li>
<li class="breadcrumb-item active">@lang('promotion.edit_promotion')    </li>
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
                              {!! Form::open([ 'route' => ['admin.promotion.update',$data['row']->pk_no], 'method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate', 'autocomplete' => 'off']) !!}

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="package" >Promotion Name</label>
                                        <input type="text"  class="form-control" name="package" value="{{ $data['row']->promotion->name ?? '' }}" readonly>
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="package" >Days</label>
                                        <input type="text"  class="form-control" name="day" value="{{ $data['row']->day_limit }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="package" >(BDT) Price</label>
                                        <input type="text"  class="form-control" name="price" value="{{ $data['row']->price }}">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-actions text-center mt-3">
                                <a href="{{ route('admin.promotion.list') }}">
                                    <button type="button" class="btn btn-warning mr-1">
                                        <i class="ft-x"></i>@lang('form.btn_cancle')
                                    </button>
                                </a>
                                <a href="">
                                    <button type="submit" class="btn btn-success mr-1">
                                        Update
                                    </button>
                                </a>
                               
                            </div>
                            {!! Form::close() !!}
                          
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

<script type="text/javascript">
  
</script>
@endpush('custom_js')
