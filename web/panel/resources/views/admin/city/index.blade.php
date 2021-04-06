@extends('admin.layout.master')

@section('web_settings','open')
@section('cities','active')

@section('title') City @endsection
@section('page-name') City @endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item active">City</li>
@endsection

@php
$roles = userRolePermissionArray();
$rows = $data['data'];
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
              <a class="text-white btn btn-round btn-sm btn-primary" href="{{ route('admin.city.create')}}"><i class="ft-plus text-white"></i> Create City</a>
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
                      <th style="width: 40px;">Sl.</th>
                      <th style="max-width: 200px;">Country</th>
                      <th>City Name</th>
                      <th>URL Title</th>
                      <th style="width: 100px;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($rows as $row)
                    <tr>
                      <td>{{ $loop->index + 1 }}</td>
                      <td>{{$row->country->name ?? ''}}</td>
                      <td>{{ $row->name }}</td>
                      <td>{{ $row->url_slug }}</td>
                      <td>
                        @if(hasAccessAbility('edit_city', $roles))
                        <a href="javascript:void(0)" title="EDIT" class="btn btn-xs btn-outline-primary mr-1"><i class="la la-edit"></i></a>
                        @endif

                        @if(hasAccessAbility('delete_city', $roles))
                        <a href="javascript:void(0)" onclick="return confirm('Are you sure you want to delete city ?')" title="DELETE" class="btn btn-xs btn-outline-danger mr-1"><i class="la la-trash"></i></a>
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
