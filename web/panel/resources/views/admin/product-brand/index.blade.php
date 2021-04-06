@extends('admin.layout.master')

@section('web_settings','open')
@section('product_brand','active')

@section('title') Product Brand @endsection
@section('page-name') Product Brand @endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item active">Brand</li>
@endsection

@php
$roles = userRolePermissionArray()
@endphp

@section('content')
<div class="content-body">
  <section id="pagination">
    <div class="row">
      <div class="col-12">
        <div class="card card-sm">
          <div class="card-header">
            <div class="form-group">
              @if(hasAccessAbility('new_brand', $roles))
              <a class="text-white btn btn-round btn-sm btn-primary" href="{{ route('admin.brand.create')}}"><i class="ft-plus text-white"></i> Create Brand</a>
              @endif
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
            <div class="card-body card-dashboard text-center">
              <div class="table-responsive">
                <table class="table table-striped table-bordered alt-pagination table-sm" id="indextable">
                  <thead>
                    <tr>
                      <th style="width: 10%;">Sl.</th>
                      <th class="text-left" style="width: 20%;">Category</th>
                      <th class="text-left" style="width: 20%;">Subcategory</th>
                      <th class="text-left" style="width: 20%;">Brand Name</th>
                      <th style="width: 10%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($rows as $row)
                    <tr>
                      <td style="width: 10%;">{{ $loop->index + 1 }}</td>
                      <td class="text-left" style="width: 20%;">{{ $row->category->name ?? '' }}</td>
                      <td class="text-left" style="width: 20%;">{{ $row->subcategory->name ?? '' }}</td>
                      <td class="text-left" style="width: 20%;">{{$row->name}}</td>
                      <td style="width: 10%;">

                        @if(hasAccessAbility('edit_brand', $roles))
                        <a href="{{ route('admin.brand.edit', [$row->pk_no]) }}" class="btn btn-xs btn-outline-primary mr-0 mb-1"><i class="la la-edit"></i></a>
                        @endif

                        @if(hasAccessAbility('delete_brand', $roles))
                        <a href="{{ route('admin.brand.delete', [$row->pk_no]) }}" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-xs btn-outline-danger mr-0 mb-1"><i class="la la-trash"></i></a>
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

@endsection

@push('custom_js')


@endpush('custom_js')
