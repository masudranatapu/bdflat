@extends('admin.layout.master')
@section('gym-admin','active')
@section('title')
    Gym Admin
@endsection
@section('page-name')
    Gym Admin
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Gym Admin
    </li>
@endsection
@section('content')
    <!-- Alternative pagination table -->
    <div class="content-body">
        <section id="pagination">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a class="text-white" href="{{url('gym-admin/new')}}">
                                <button type="button" class="btn btn-round btn-sm btn-primary">
                                    <i class="ft-user-plus text-white">
                                    </i> Create Gym Admin
                                </button>
                            </a>
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
                                    <table class="table display nowrap table-striped table-bordered alt-pagination" id="indextable">
                                        <thead>
                                        <tr>
                                            <th>Sl.</th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Role name</th>
                                            <th>Gym name</th>
                                            <th>Designation</th>
                                            <th>Email</th>
                                            <th>Mobile no</th>
                                            <th>Can login</th>
                                            <th>Profile photo</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($triggers as $row)
                                            <tr>
                                                <td>{{$loop->index + 1}}</td>
                                                <td>{{$row->first_name}} {{$row->middle_name}} {{$row->last_name}}</td>
                                                <td>{{$row->username}}</td>
                                                <td>{{$row->role_name}}</td>
                                                <td>{{$row->name}}</td>
                                                <td>{{$row->designation}}</td>
                                                <td>{{$row->email}}</td>
                                                <td>{{$row->mobile_no}}</td>
                                                @if($row->can_login == 0)
                                                    <td class="text-center"><i class='ft-crosshair text-danger'></i>
                                                    </td>
                                                @else
                                                    <td class="text-center"><i class='ft-check text-success'></i></td>
                                                @endif
                                                <td>
                                                    <img align="middle" width="50" height="50"
                                                         src="{{$row->profile_pic_url}}" alt="No image">
                                                </td>
                                                <td>
                                                    @if($row->status == 0)
                                                        {{'Inactive'}}
                                                    @else
                                                        {{'Active'}}
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.gym-admin.edit', array($row->auth_id)) }}">
                                                        <button type="button"
                                                                class="btn btn-sm btn-outline-primary mr-1"><i
                                                                class="la la-edit"></i>
                                                        </button>
                                                    </a>

                                                    <a href="{{ route('admin.gym-admin.delete', [$row->auth_id]) }}">
                                                        <button type="button"
                                                                class="btn btn-sm btn-outline-danger mr-1"><i
                                                                class="la la-trash"></i>
                                                        </button>
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
