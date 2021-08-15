@extends('admin.layout.master')

@section('Seeker Management','open')
@section('seeker_list','active')

@section('title') Property Seekers @endsection
@section('page-name') Property Seekers @endsection

@push('custom_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-tooltip.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
@endpush

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">@lang('customer.breadcrumb_title')</a></li>
    <li class="breadcrumb-item active">Property Seekers</li>
@endsection

@php
    $roles = userRolePermissionArray();

@endphp


@section('content')
    <div class="content-body min-height">
        <section id="pagination">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-sm card-success">
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <div class="table-responsive ">
                                    <table class="table table-striped table-bordered table-sm text-center" id="dtable">
                                        <thead>
                                        <tr>
                                            <th class="text-center">SL</th>
                                            <th class="text-center">User ID</th>
                                            <th>Name</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>Balance</th>
                                            <th>Create Date</th>
                                            <th>Lead Status</th>
                                            <th>Account Status</th>
                                            <th style="width: 17%" class="text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>




@endsection

@push('custom_js')

<script src="{{asset('/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
<script src="{{asset('/app-assets/js/scripts/tables/datatables/datatable-basic.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var get_url = $('#base_url').val();


        $(document).ready(function () {
            var value = getCookie('seeker_list');

            if (value !== null) {
                var value = (value - 1) * 25;
                // table.fnPageChange(value,true);
            } else {
                var value = 0;
            }
            var table = callDatatable(value);

        });

        function callDatatable(value) {
            var table =
                $('#dtable').dataTable({
                    processing: false,
                    serverSide: true,
                    paging: true,
                    pageLength: 25,
                    lengthChange: true,
                    searching: true,
                    ordering: true,
                    info: true,
                    autoWidth: false,
                    iDisplayStart: value,
                    ajax: {
                        url: get_url+'/seeker_list',
                        type: 'POST',
                        data: function (d) {
                            d._token = "{{ csrf_token() }}";
                        }
                    },
                    columns: [
                        {
                            data: 'PK_NO',
                            name: 'PK_NO',
                            searchable: false,
                            sortable: false,
                            render: function (data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },

                        {
                            data: 'CODE',
                            name: 'CODE',
                            searchable: true
                        },
                        {
                            data: 'NAME',
                            name: 'NAME',
                            searchable: true,
                            className: 'text-center'
                        },
                        {
                            data: 'MOBILE_NO',
                            name: 'MOBILE_NO',
                            searchable: true,
                            className: 'text-center'
                        },
                        {
                            data: 'EMAIL',
                            name: 'EMAIL',
                            searchable: true,
                        },

                        {
                            data: 'UNUSED_TOPUP',
                            name: 'UNUSED_TOPUP',
                            searchable: false,
                            className: 'text-right',
                            render: function (data, type, row, meta) {
                                return formatter.format(data);
                            }
                        },
                        {
                            data: 'CREATED_AT',
                            name: 'CREATED_AT',
                            searchable: false,
                            className: 'text-right',
                        },

                        {
                            data: 'STATUS',
                            name: 'STATUS',
                            searchable: true,
                            className: 'text-right'

                        },
                        {
                            data: 'status',
                            name: 'status',
                            searchable: true,
                            className: 'text-center'

                        },
                        {
                            data: 'action',
                            name: 'action',
                            searchable: false
                        },

                    ]
                });
            return table;
        }

        let formatter = new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'BDT'
        });
    </script>

    <script>
        $(document).on('click', '.page-link', function () {
            var pageNum = $(this).text();
            setCookie('seeker_list', pageNum);
        });

        function setCookie(seeker_list, pageNum) {
            var today = new Date();
            var name = seeker_list;
            var elementValue = pageNum;
            var expiry = new Date(today.getTime() + 30 * 24 * 3600 * 1000); // plus 30 days

            document.cookie = name + "=" + elementValue + "; path=/; expires=" + expiry.toGMTString();
        }

        function getCookie(name) {
            var re = new RegExp(name + "=([^;]+)");
            var value = re.exec(document.cookie);
            return (value != null) ? unescape(value[1]) : null;
        }
    </script>
@endpush


