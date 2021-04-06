@extends('admin.layout.master')
@section('web_settings','open')
@section('category','active')

@section('title') Category @endsection
@section('page-name') Category @endsection

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
  <li class="breadcrumb-item active">Category</li>
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
          <div class="card-header pl-2">
            <div class="form-group">
              @if(hasAccessAbility('view_category', $roles))
              <a class="text-white btn btn-round btn-sm btn-primary" href="{{ route('product.category.create')}}"><i class="ft-plus text-white"></i> Create Category</a>
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
            <div class="card-body card-dashboard">
              <div class="table-responsive">
                <table class="table table-striped table-bordered alt-pagination table-sm" id="indextable">
                  <thead>
                    <tr>
                      <th class="text-center" style="width: 50px;">Sl.</th>
                      <th class="" style="width: 120px;">Category Name</th>
                      <th class="" >URL Title</th>
                      {{--<th class="" style="min-width: 100px;">Seo Description</th> --}}
                      <th class="" style="min-width: 100px;">Logo</th>
                      <th class="" style="min-width: 100px;">Icon</th>
                      <th class="" style="min-width: 100px;">Banner</th>
                      <th class="" style="min-width: 40px;">Top</th>
                      <th class="" style="min-width: 40px;">New</th>
                      <th class="" style="min-width: 40px;">Feature</th>
                      <th class="" style="min-width: 40px;">Order</th>
                      <th class="text-center" style="width: 120px;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($rows as $row)

                    <tr>
                      <td class="text-center" style="width: 50px;">{{ $loop->index + 1 }}</td>
                      <td class="" style="width: 120px;">{{ $row->name }}</td>
                      <td class="" >{{ $row->url_slug }}</td>
                      {{--<td>{{$row->seo_des}}</td>--}}
                      <td class="text-center">
                        <img src="{{$row->logo_path}}" style="width: 64px" >
                      </td>
                      <td class="text-center">
                        <img src="{{$row->icon_path}}" style="width: 64px" >
                      </td>
                      <td class="text-center">
                        <img src="{{$row->banner_path}}" style="width: 80px" >
                      </td>
                      <td class="text-center">{{$row->is_top == 1 ? 'Yes' : 'No'}}</td>
                      <td class="text-center">{{$row->is_new == 1 ? 'Yes' : 'No'}}</td>
                      <td class="text-center">{{$row->is_feature == 1 ? 'Yes' : 'No'}}</td>
                      <td class="text-center">
                        <span>{{$row->order_id}}</span>
                      </td>
                    
                        
                        <td class="text-center" style="width: 90px;">
                          @if(hasAccessAbility('edit_category', $roles))
                          <a href="{{ route('product.category.edit', [$row->pk_no]) }}" title="EDIT" class="btn btn-xs btn-outline-primary mr-1 mb-1"><i class="la la-edit"></i></a>
                          @endif

                          @if(hasAccessAbility('view_sub_category', $roles))
                          <a href="{{ route('admin.sub_category.list', [$row->pk_no]) }}"  title="SHOW SUB CATEGORY" class="btn btn-xs btn-outline-primary mr-1 mb-1"><i class="la la-eye"></i></a>
                          @endif

                          @if(hasAccessAbility('delete_category', $roles))
                          <a href="{{ route('product.category.delete', [$row->pk_no]) }}" onclick="return confirm('Are you sure you want to delete product category?')" title="DELETE" class="btn btn-xs btn-outline-danger mr-1 mb-1"><i class="la la-trash"></i></a>
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

<!--script only for brand page-->
<!--script type="text/javascript" src="{{ asset('app-assets/pages/category.js')}}"></script-->


@endpush('custom_js')
