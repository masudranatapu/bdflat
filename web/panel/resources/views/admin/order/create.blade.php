@extends('admin.layout.master')
@section('order','active')
@section('title')
    Order | Create
@endsection
@section('page-name')
    Create Order
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('order.breadcrumb_dashboard_title')</a>
    </li>
    <li class="breadcrumb-item"><a href="{{ route('admin.admin-user') }}">@lang('order.breadcrumb_dashboard_order_text')</a>
    </li>
    <li class="breadcrumb-item active">@lang('order.breadcrumb_create_order_text')
    </li>
@endsection
<!--push from page-->
@push('custom_css')

@endpush('custom_css')
@section('content')
    <div class="card" style="height: 981.5px;">
        <div class="card-header">
            <h4 class="card-title" id="basic-layout-colored-form-control">
                <i class="ft-plus text-primary"></i> Add New
                Order</h4>
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
            <div class="card-body">
                {!! Form::open([ 'route' => 'admin.order.store', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate']) !!}
                @csrf
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {!! $errors->has('customer') ? 'error' : '' !!}">
                                <div class="controls">
                                    <label>@lang('order.customer')<span class="text-danger">*</span></label>
                                    <select name="customer" class="form-control" id="customer">
                                        <option>Customer One</option>
                                        <option>Customer One</option>
                                        <option>Customer One</option>
                                        <option>Customer One</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group {!! $errors->has('shipping_type') ? 'error' : '' !!}">
                                <label>@lang('order.shipping_type')<span class="text-danger">*</span></label>
                                <div class="controls">
                                    <div>
                                        <input type="radio" id="huey" name="drone" value="huey" checked>
                                        <label for="air_freight">Air Freight</label> &nbsp;
                                        <input type="radio" id="dewey" name="drone" value="dewey">
                                        <label for="sea_freight">Sea Freight</label> &nbsp;

                                        <input type="radio" id="louie" name="drone" value="louie">
                                        <label for="direct_freight">Direct Sale</label>&nbsp;

                                        <input type="radio" id="louie" name="drone" value="louie">
                                        <label for="ready_stock">Ready Stock</label>&nbsp;

                                    </div>



                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {!! $errors->has('from_address') ? 'error' : '' !!}">
                                <label>@lang('order.from_address')<span class="text-danger">*</span></label>
                                <div class="controls">
                                    {!! Form::textarea('from_address', null, [ 'class' => 'form-control mb-1', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter short from address description about the order', 'tabindex' => 1, 'rows' => 3 ]) !!}
                                    {!! $errors->first('from_address', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group {!! $errors->has('delivery_address') ? 'error' : '' !!}">
                                <label>@lang('order.delivery_address')<span class="text-danger">*</span></label>
                                <div class="controls">
                                    {!! Form::textarea('delivery_address', null, [ 'class' => 'form-control mb-1', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter delivery address about the order', 'tabindex' => 1, 'rows' => 3 ]) !!}
                                    {!! $errors->first('delivery_address', '<label class="help-block text-danger">:message</label>') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {!! $errors->has('sales_agent') ? 'error' : '' !!}">
                                <div class="controls">
                                    <label>@lang('order.sales_agent')<span class="text-danger">*</span></label>
                                    <select name="sales_agent" class="form-control" id="sales_agent">
                                        <option>Huda</option>
                                        <option>Fatin</option>
                                        <option>WAHIDA</option>
                                        <option>AZURA</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">


                            <div class="form-group {!! $errors->has('shipping_location') ? 'error' : '' !!}">
                                <div class="controls">
                                    <label>@lang('order.shipping_location')<span class="text-danger">*</span></label>
                                    <select name="shipping_location" class="form-control" id="shipping_location">
                                        <option>UK</option>
                                        <option>Malaysia</option>
                                        <option>Bangladesh</option>
                                        <option>KSA</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="order_date">@lang('order.order_date')</label>
                                <input type="date" id="order_date" class="form-control" name="order_date" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Date Opened" data-original-title="" title="">
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="delivery_date">@lang('order.delivery_date')</label>
                                <input type="date" id="delivery_date" class="form-control" name="delivery_date" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Date Opened" data-original-title="" title="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-actions mt-10 text-center">
                    <a href="{{ route('admin.order')}}" class="btn btn-warning mr-1">

                            <i class="ft-x"></i> @lang('order.order_frm_button_cancel_label')

                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="la la-check-square-o"></i> @lang('order.order_frm_button_save_label')
                    </button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

<!--push from page-->
@push('custom_js')
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/select/form-select2.js')}}"></script>
@endpush('custom_js')
