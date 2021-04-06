@extends('admin.layout.master')
@section('web_settings','open')
@section('sub_category','active')
@section('title') Sub-category @endsection
@section('page-name') Sub-category @endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Subcategory
    </li>
@endsection
@php
    $roles = userRolePermissionArray()
@endphp

@section('content')
    <!-- Alternative pagination table -->
    <div class="content-body">
        <section id="pagination">
            <div class="row">
                <div class="col-12">
                    <div class="card card-sm">
                        <div class="card-header pl-2">

                                <a href="{{route('product.category.create')}}" class="btn btn-round btn-sm btn-primary text-white"><i class="ft-plus text-white"></i> Create New

                                </a>

                            <a class="heading-elements-toggle heading-elements-toggle-sm"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements heading-elements-sm">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard text-center">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered alt-pagination table-sm" id="indextable">
                                        <thead>
                                        <tr>
                                            <th>Sl.</th>
                                            <th class="text-left" >@lang('tablehead.category')</th>
                                            <th class="text-left" >@lang('tablehead.subcategory_name')</th>
                                            <th class="text-left" >URL Title</th>
                                            <th class="text-left" >Order id</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                       @foreach($rows as $row)

                                            <tr>
                                                <td>{{$loop->index + 1}}</td>
                                                <td class="text-left">{{ $row->category_name }}</td>
                                                <td class="text-left">{{ $row->name }}</td>
                                                <td class="text-left">{{ $row->url_slug }}</td>
                                                <td class="text-left">{{ $row->order_id }}</td>
                                               
                                                <td>
                                                    <a href="{{route('product.category.edit',$row->pk_no)}}" class="btn btn-xs btn-outline-primary mr-1" title="EDIT"><i class="la la-edit"></i></a>
                                                    <a href="{{route('product.category.delete',$row->pk_no)}}" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-xs btn-outline-danger mr-1" title="DELETE">
                                                        <i class="la la-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                            @endforeach

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

    <!--/ Alternative pagination table -->
@endsection
