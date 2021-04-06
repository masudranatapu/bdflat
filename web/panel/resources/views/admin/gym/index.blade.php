@extends('admin.layout.master')
@section('gym','active')
@section('title')
    Gym
@endsection
@section('page-name')
    Gym
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Gym
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
                            <div class="form-group">
                                <a class="text-white" href="{{ route('admin.gym.new')}}">
                                    <button type="button" class="btn btn-round btn-sm btn-primary">
                                        <i class="ft-user-plus"></i> Create Gym
                                    </button>
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
                            <div class="card-body card-dashboard text-center">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered alt-pagination" id="indextable">
                                        <thead>
                                        <tr>
                                            <th>Sl.</th>
                                            <th>Name</th>
                                            <th>Code</th>
                                            <th>Moto</th>
                                            <th>Address</th>
                                            <th>Established</th>
                                            <th>Logo</th>
                                            <th>Banner</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($gym as $row)
                                            <tr>
                                                <td>{{$loop->index+1}}</td>
                                                <td>{{$row->name}}</td>
                                                <td>{{$row->code}}</td>
                                                <td>{{$row->moto}}</td>
                                                <td>{{$row->address}}</td>
                                                <td>{{$row->established}}</td>
                                                <td>
                                                    <img align="middle" width="50" height="50"
                                                         src="{{$row->logo_url}}" alt="Gym user logo">
                                                </td>
                                                <td>
                                                    <img align="middle" width="50" height="50"
                                                         src="{{$row->banner_url}}" alt="Gym user banner">
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.gym.edit', [$row->id]) }}">
                                                        <button type="button"
                                                                class="btn btn-sm btn-outline-primary mr-1"><i
                                                                class="la la-edit"></i>
                                                        </button>
                                                    </a>
                                                    <a href="{{route('admin.gym.delete', [$row->id])}}">
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
