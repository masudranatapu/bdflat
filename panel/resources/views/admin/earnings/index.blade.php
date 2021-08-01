@extends('admin.layout.master')

{{--@section('Earnings','open')--}}
@section('earnings','active')

@section('title') Earnings @endsection
@section('page-name') Earnings @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('agent.breadcrumb_title') </a></li>
    <li class="breadcrumb-item active">Earnings</li>
@endsection

@push('custom_css')
    <link rel="stylesheet" type="text/css" href="{{asset('/custom/css/custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
@endpush

@push('custom_js')

    <!-- BEGIN: Data Table-->
    <script src="{{asset('/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('/app-assets/js/scripts/tables/datatables/datatable-basic.js')}}"></script>
    <!-- END: Data Table-->
@endpush

@php
    $roles = userRolePermissionArray()
@endphp

@section('content')
    <div class="content-body min-height">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-success">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-6">
                                    <div class="table-responsive ">
                                        <table class="table table-striped table-bordered table-sm text-center" {{--id="process_data_table"--}}>
                                            <thead>
                                            <tr>
                                                <th>Agent ID</th>
                                                <th>AID1001</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <span>Agent Name</span>
                                                </td>
                                                <td>
                                                    <span>Rubina Akter</span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <span>Mobile</span>
                                                </td>
                                                <td>
                                                    <span>0123456789</span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <span>Email</span>
                                                </td>
                                                <td>
                                                    <span>email@gmail.com</span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <span>Payment Method</span>
                                                </td>
                                                <td>
                                                    <span>Bkash - 0123585445</span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <span>Created Date</span>
                                                </td>
                                                <td>
                                                    <span>Oct 12, 2021</span>
                                                </td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="col-5 offset-1">
                                    <div class="card bg-info rounded">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="media d-flex">
                                                    <div class="media-body text-center">
                                                        <h1 class="text-white">Balance</h1>
                                                        <h1 class="info text-white font-weight-bold" style="margin-bottom: 10px;">BDT 12000</h1>
                                                        <button class="btn mt-2" style="background: white;color: black;font-weight: bold;border-radius: 5px">Withdraw
                                                            Credit
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row  mb-2">
                                <div class="col-12">
                                    <h2>Earnings</h2>
                                    <div class="table-responsive ">
                                        <table class="table table-striped table-bordered table-sm text-center" {{--id="process_data_table"--}}>
                                            <thead>
                                            <tr>
                                                <th>Agent ID</th>
                                                <th>Date</th>
                                                <th>EID</th>
                                                <th>PID</th>
                                                <th>Earning</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <span>10001</span>
                                                </td>
                                                <td>
                                                    <span>Oct 12, 2020</span>
                                                </td>
                                                <td>
                                                    <span>10001</span>
                                                </td>
                                                <td>
                                                    <span>100001</span>
                                                </td>
                                                <td>
                                                    <span>10</span>
                                                </td>
                                                <td>
                                                    <span class="text-success">Added</span>
                                                </td>
                                                <td>

                                                    <a href="#" title="EDIT">Edit</a>
                                                    |
                                                    <a href="#"
                                                       onclick="return confirm('Are you sure you want to delete the properties ?')"
                                                       title="DELETE">Delete</a>

                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <span>10001</span>
                                                </td>
                                                <td>
                                                    <span>Oct 12, 2020</span>
                                                </td>
                                                <td>
                                                    <span>10002</span>
                                                </td>
                                                <td>
                                                    <span>100001</span>
                                                </td>
                                                <td>
                                                    <span>10</span>
                                                </td>
                                                <td>
                                                    <span class="text-danger">Refunded</span>
                                                </td>
                                                <td>

                                                    <a href="#" title="EDIT">Edit</a>
                                                    |
                                                    <a href="#"
                                                       onclick="return confirm('Are you sure you want to delete the properties ?')"
                                                       title="DELETE">Delete</a>
                                                </td>
                                            </tr>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <h2>Payments</h2>
                                    <div class="table-responsive ">
                                        <table class="table table-striped table-bordered table-sm text-center" {{--id="process_data_table"--}}>
                                            <thead>
                                            <tr>
                                                <th>Agent ID</th>
                                                <th>Date</th>
                                                <th>TID</th>
                                                <th>Amount</th>
                                                <th>Payment Method</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <span>10001</span>
                                                </td>
                                                <td>
                                                    <span>Oct 12, 2020</span>
                                                </td>
                                                <td>
                                                    <span>10001</span>
                                                </td>
                                                <td>
                                                    <span>10</span>
                                                </td>
                                                <td>
                                                    <span>Bkash - 0123545555</span>
                                                </td>
                                                <td>
                                                    <span class="text-success">Paid</span>
                                                </td>
                                                <td>
                                                    <a href="#" title="EDIT">Edit</a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <span>10001</span>
                                                </td>
                                                <td>
                                                    <span>Oct 12, 2020</span>
                                                </td>
                                                <td>
                                                    <span>10001</span>
                                                </td>
                                                <td>
                                                    <span>10</span>
                                                </td>
                                                <td>
                                                    <span>Bkash - 0123545555</span>
                                                </td>
                                                <td>
                                                    <span class="text-danger">Rejected</span>
                                                </td>
                                                <td>
                                                    <a href="#" title="EDIT">Edit</a>
                                                </td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
