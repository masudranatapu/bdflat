@extends('admin.layout.master')

@section('web_settings','open')
@section('product_type','active')

@section('title') Product Type @endsection
@section('page-name') Product Color @endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item active">Product Type</li>
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
                <div class="card">
                    <div class="card-header">
                        <div class="form-group">
                            <a type="button" class="text-white btn btn-round btn-sm btn-primary" href="{{ route('admin.product_type.create')}}">
                                   <i class="ft-user-plus"></i> @lang('form.add_new')
                            </a>
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
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered alt-pagination table-sm" id="indextable">
                                    <thead>
                                        <tr>

                                            <th>Sl.</th>
                                            <th>Category</th>
                                            <th>Sub Category</th>
                                            <th>Product Type Name</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($rows as $row)

                                        <tr>

                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $row->category->name ?? '' }}</td>
                                            <td>{{ $row->subcategory->name ?? '' }}</td>
                                            <td>{{ $row->name }}</td>
                                           
                                            <td class="text-center">
                                                @if(hasAccessAbility('edit_product_type', $roles))
                                                    <a href="{{ route('admin.product_type.edit', [$row->pk_no]) }}" type="button" class="btn btn-xs btn-outline-primary mr-1 " title="EDIT">
                                                        <i class="la la-edit"></i>
                                                    </a>
                                                @endif

                                                @if(hasAccessAbility('delete_product_type', $roles))
                                                    <a href="{{ route('admin.product_type.delete', [$row->pk_no]) }}" type="button" class="btn btn-xs btn-outline-danger mr-1 " title="DELETE"  onclick="return confirm('Are you sure you want to delete?')" >
                                                        <i class="la la-trash"></i>
                                                    </a>
                                                @endif

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
