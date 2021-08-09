@extends('admin.layout.master')
@section('Web','Open')
@section('payment_method','active')
@section('title')
    Payment Method
@endsection
@section('page-name')
    Payment Method
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"> Payment Method </a></li>
    <li class="breadcrumb-item active">Home Article</li>
@endsection
@push('custom_css')
    <link href="http://arocrm.com/app-assets/icheck/square/yellow.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/extensions/toastr.css')}}">
@endpush
<?php
$rows = $data['article'] ?? [];
$roles = userRolePermissionArray();
?>
@section('content')
    <section id="basic-form-layouts">
        <div class="row match-height min-height">
            <div class="col-md-6">
                <div class="card card-success">
                    <div class="card-header">
                        <a href="{{route('web.payment_method.create')}}" class="btn btn-primary float-lg-right btn-sm"> <i class="la la-plus"></i> Create New</a>
                    </div>
                    <hr>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @if(isset($data['rows']) && count($data['rows']) > 0 )
                                    @foreach( $data['rows'] as $key => $row )
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $row->CODE }}</td>
                                            <td>{{ $row->NAME }}</td>
                                            <td>{{ $row->IS_ACTIVE == 1 ? 'Active' : 'Inactive' }}</td>
                                            <td>
                                                <a href="{{ route('web.payment_method.edit',['id' => $row->PK_NO]) }}">Edit</a>
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
    </section>
    @push('custom_js')
        <script src="http://arocrm.com/app-assets/icheck/icheck.min.js"></script>
        <script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
        <script>
            $(document).ready(function () {
                $('.is_feature').iCheck({
                    checkboxClass: 'icheckbox_square-yellow',
                    radioClass: 'iradio_square-yellow',
                    increaseArea: '20%'
                });
                $('.is_active').iCheck({
                    checkboxClass: 'icheckbox_square-yellow',
                    radioClass: 'iradio_square-yellow',
                    increaseArea: '20%'
                });
                $('.is_feature').on('ifClicked', function (event) {
                    id = $(this).data('id');
                    $.ajax({
                        type: 'POST',
                        url: "{{ URL('web/article/featureStatus') }}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            'id': id
                        },
                        success: function (data) {

                            toastr.success('Home article', 'Feature Status Updated')


                        },
                    });
                });
                $('.is_feature').on('ifToggled', function (event) {
                    $(this).closest('tr').toggleClass('warning');
                });

            });
        </script>
    @endpush
@endsection
