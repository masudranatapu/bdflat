@extends('admin.layout.master')

@section('Property Owner','open')
@section('owner_list','active')

@section('title') Property Owner @endsection
@section('page-name') Property Owner @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('invoice.breadcrumb_title')</a></li>
    <li class="breadcrumb-item active">Property Owner </li>
@endsection

@php
    $roles          = userRolePermissionArray();
    $user_type      = Config::get('static_array.user_type');
    $user_status    = Config::get('static_array.user_status');

@endphp

@push('custom_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-tooltip.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
@endpush


@section('content')
    <div class="content-body min-height">
        <section id="pagination">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-sm card-success">
                        <div class="card-header">
                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <a href="{{ route('admin.owner.list',['owner' => 2]) }}" class="btn btn-info btn-sm">Owner</a>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <a href="{{ route('admin.owner.list',['owner' => 3]) }}" class="btn btn-info btn-sm">Builder</a>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <a href="{{ route('admin.owner.list',['owner' => 4]) }}" class="btn btn-info btn-sm">Agency</a>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <a href="{{ route('admin.owner.list') }}" class="btn btn-info btn-sm">All</a>
                                    </div>
                                </div>

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


                                <div class="table-responsive ">
                                    <table class="table table-striped table-bordered table-sm" {{--id="process_data_table"--}}>
                                        <thead>
                                        <tr>
                                            <th class="text-center">SL</th>
                                            <th class="text-center">User ID</th>
                                            <th>Create Date</th>
                                            <th>User Type</th>
                                            <th>Name</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th class="text-center">Balance</th>
                                            <th class="text-center">Properties</th>
                                            <th class="text-center">Status</th>
                                            <th style="width: 17%" class="text-center">Action</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                            @if(isset($data['rows']) && count($data['rows']) > 0 )
                                                @foreach($data['rows'] as $key => $row)
                                                    <tr>
                                                        <td class="text-center">{{ $key+1 }}</td>
                                                        <td class="text-center">{{ $row->CODE }}</td>
                                                        <td>{{ date('M d, Y', strtotime($row->CREATED_AT)) }}</td>
                                                        <td>{{ $user_type[$row->USER_TYPE] ?? '' }}</td>
                                                        <td>{{ $row->NAME }}</td>
                                                        <td>{{ $row->MOBILE_NO }}</td>
                                                        <td>{{ $row->EMAIL }}</td>
                                                        <td class="text-center">{{ number_format($row->UNUSED_TOPUP,2) }}</td>
                                                        <td class="text-center"><span class="t-pub">{{ $row->TOTAL_LISTING }}</span></td>
                                                        <td class="text-center">{{ $user_status[$row->STATUS] ?? '' }}</td>
                                                        <td style="width: 17%" class="text-center">
                                                            <a href="{{ route('admin.owner.edit', $row->PK_NO) }}">Edit</a>
                                                            |
                                                            <a href="{{ route('admin.owner.payment', $row->PK_NO) }}">Payment</a>
                                                            |
                                                            <a href="{{ route('admin.owner.password.edit', $row->PK_NO) }}">CP</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
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

        jQuery(document).ready(function ($) {
            typeahead('customer');
        })

        $('#scrollable-dropdown-menu2 .search_to_customer').bind('typeahead:select', function (ev, suggestion) {
            $('#to_customer_hidden').val(suggestion.pk_no1);

        });

        function typeahead(type) {
            var get_url = $('#base_url').val();
            var engine = new Bloodhound({
                remote: {
                    url: get_url + '/get-customer-info?q=%QUERY%&type=' + type,
                    wildcard: '%QUERY%'
                },
                datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
                queryTokenizer: Bloodhound.tokenizers.whitespace
            });

            $(".search_to_customer").typeahead({
                hint: true,
                highlight: true,
                minLength: 1,

            }, {
                source: engine.ttAdapter(),
                // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
                display: 'NAME',
                limit: 20,

                // the key from the array we want to display (name,id,email,etc...)
                templates: {
                    // empty: [
                    //     // '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                    // ],
                    empty: function (context) {
                        $(".tt-dataset").html('<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>');

                    },
                    header: [
                        '<div class="list-group search-results-dropdown">'
                    ],
                    suggestion: function (data) {


                        if (type == 'customer') {


                            return '<span class="list-group-item" style="cursor: pointer;" data-id="' + data.pk_no1 + '" >' + data.NAME + '- Mobile : ' + data.MOBILE_NO + '- ID : ' + data.CUSTOMER_NO + '</span>';


                        } else {

                            return '<span class="list-group-item" style="cursor: pointer;" data-id="' + data.pk_no1 + '" >' + data.NAME + '- Mobile : ' + data.MOBILE_NO + '- ID : ' + data.RESELLER_NO + '</span>';

                        }
                    },
                    updater: function (data) {
                        //print the id to developer tool's console
                        console.log(data);
                    }
                }
            });
        }

        $(document).on('click', '.balanceTransBtn', function (e) {
            var id = $(this).data('id');
            var pageurl = get_url + '/get/' + id + '/remainingcustomerbalance';
            $.ajax({
                type: 'get',
                url: pageurl,
                async: true,
                beforeSend: function () {
                    $("body").css("cursor", "progress");
                },
                success: function (data) {
                    console.log(data);
                    if (data != '') {
                        $('#payment_no').html(data);

                    } else {
                        $('#payment_no').html("<option value=''>data not found</option>");
                    }

                },
                complete: function (data) {
                    $("body").css("cursor", "default");

                }
            });

            var name = $(this).data('name');
            var payment_no = $(this).data('payment_no');
            $('#customer_name').text(name);
            // $('#payment_no').val(payment_no);
            $('#from_customer').val(id);
            $('#to_customer').val('');
//    $('#amount_to_trans').attr('max', payment_no);

        })
        $(document).ready(function () {
            var value = getCookie('reseller_list');

            if (value !== null) {
                var value = (value - 1) * 10;
                // table.fnPageChange(value,true);
            } else {
                var value = 0;
            }
            var table = callDatatable(value);

        });

        function callDatatable(value) {
            var table =
                $('#process_data_table').dataTable({
                    processing: false,
                    serverSide: true,
                    paging: true,
                    pageLength: 10,
                    lengthChange: true,
                    searching: true,
                    ordering: true,
                    info: true,
                    autoWidth: false,
                    iDisplayStart: value,
                    ajax: {
                        url: 'reseller/all_reseller',
                        type: 'POST',
                        data: function (d) {
                            d._token = "{{ csrf_token() }}";
                        }
                    },
                    columns: [
                        {
                            data: 'RESELLER_NO',
                            name: 'r.RESELLER_NO',
                            searchable: true,
                            className: 'text-center'
                        },
                        // {
                        //     data: 'PK_NO',
                        //     name: 'PK_NO',
                        //     searchable: false,
                        //     sortable:false,
                        //     render: function(data, type, row, meta) {
                        //         return meta.row + meta.settings._iDisplayStart + 1;
                        //     }
                        // },

                        {
                            data: 'NAME',
                            name: 'r.NAME',
                            searchable: true
                        },

                        {
                            data: 'EMAIL',
                            name: 'r.EMAIL',
                            searchable: true,
                            render: function (data, type, row) {
                                if (row.EMAIL == null) {
                                    return '----------------------------';
                                } else {
                                    return row.EMAIL;
                                }
                            }
                        },
                        {
                            data: 'MOBILE_NO',
                            name: 'r.MOBILE_NO',
                            dial: 'c.DIAL_CODE',
                            searchable: true,
                            render: function (data, type, row) {
                                return row.DIAL_CODE + ' ' + row.MOBILE_NO;
                            }
                        },

                        {
                            data: 'total_unverified',
                            name: 'total_unverified',
                            searchable: false,
                            className: 'text-right',
                        },
                        {
                            data: 'balance',
                            name: 'balance',
                            searchable: false,
                            className: 'text-right',
                        },

                        {
                            data: 'due',
                            name: 'due',
                            searchable: true,
                            className: 'text-right'

                        },
                        {
                            data: 'credit',
                            name: 'r.CUM_BALANCE',
                            searchable: true,
                            className: 'text-right'

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
    </script>

    <script>
        $(document).on('click', '.page-link', function () {
            var pageNum = $(this).text();
            setCookie('reseller_list', pageNum);
        });

        function setCookie(reseller_list, pageNum) {
            var today = new Date();
            var name = reseller_list;
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
