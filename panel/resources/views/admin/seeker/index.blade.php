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
                                    <table class="table table-striped table-bordered table-sm text-center alt-pagination" >
                                        <thead>
                                        <tr>
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

                                        <tbody>
                                            @if(isset($data) && count($data) > 0 )
                                                @foreach($data as $row)
                                                    <tr>
                                                        <td>{{$row->CODE}}</td>
                                                        <td>{{$row->NAME}}</td>
                                                        <td>{{$row->MOBILE_NO}}</td>
                                                        <td>{{$row->EMAIL}}</td>
                                                        <td>{{$row->UNUSED_TOPUP}}</td>
                                                        <td>{{date('M d, Y', strtotime($row->CREATED_AT))}}</td>
                                                        <td>
                                                            <span class="t-pub">Valid</span>
                                                        </td>
                                                        <td>
                                                            @if($row->STATUS == 1)
                                                                <span class="t-pub">Active</span>
                                                            @else
                                                                <span class="t-del">Inactive</span>
                                                            @endif
                                                        </td>
                                                        <td style="width: 17%" class="text-center">
                                                            <a href="{{route('admin.seeker.edit',$row->PK_NO)}}">Edit</a>
                                                            |
                                                            <a href="{{route('admin.seeker.payment',$row->PK_NO)}}">Payment</a>
                                                            |
                                                            <a href="#">CP</a>

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
            var value = getCookie('customer_list');

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
                    pageLength: 25,
                    lengthChange: true,
                    searching: true,
                    ordering: true,
                    info: true,
                    autoWidth: false,
                    iDisplayStart: value,
                    ajax: {
                        url: 'customer/all_customer',
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
                            data: 'NAME',
                            name: 'c.NAME',
                            searchable: true
                        },
                        {
                            data: 'CUSTOMER_NO',
                            name: 'c.CUSTOMER_NO',
                            searchable: true,
                            className: 'text-center'
                        },
                        {
                            data: 'EMAIL',
                            name: 'c.EMAIL',
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
                            data: 'mobile',
                            name: 'c.MOBILE_NO',
                            searchable: true,
                        },
                        /*{
                            data: 'reseller',
                            name: 'r.NAME',
                            searchable: true,
                            render: function(data, type, row) {
                                if (row.reseller == null) {
                                    return 'AZURAMART';
                                } else {
                                    return row.reseller;
                                }
                            }
                        },*/
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
                            name: 'c.CUM_BALANCE',
                            searchable: true,
                            className: 'text-right'

                        },
                        {
                            data: 'action',
                            name: 'action',
                            searchable: false
                        },
                        // {
                        //     data: 'PK_NO',
                        //     id: 'PK_NO',
                        //     searchable: false,
                        //     render: function(data, type, row) {
                        //         // return "<a href='javascript:void(0)'data-toggle='modal' data-target='#sms_send' onclick='sms_pop_up(\"" + row.id + "\",\"" + row.id + "\")' class='btn-hover-shine btn-shadow btn btn-alternate btn-sm'>Send sms</a>|<a href='guest-update/" + row.id + "' class='btn-hover-shine btn-shadow btn btn-warning btn-sm' target='_blank'>Detils</a>";
                        //         var alert = "Are you sure you want to delete the customer ?";
                        //         return "<a href='customer/" + row.id + "'/edit' class='btn btn-xs btn-success mr-1' title='EDIT'><i class='la la-edit'></i></a><a href='customer/" + row.id + "'/view' class='btn btn-xs btn-primary mr-1' title='VIEW'><i class='la la-eye'></i></a><a href='customer/" + row.id + "'/delete' class='btn btn-xs btn-danger mr-1' onclick='return confirm("+ '"' +"Are you sure you want to delete the customer ?"+ '"' +")' title='DELETE'><i class='la la-trash'></i></a>";

                        //     }
                        // },
                    ]
                });
            return table;
        }
    </script>

    <script>
        $(document).on('click', '.page-link', function () {
            var pageNum = $(this).text();
            setCookie('customer_list', pageNum);
        });

        function setCookie(customer_list, pageNum) {
            var today = new Date();
            var name = customer_list;
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
