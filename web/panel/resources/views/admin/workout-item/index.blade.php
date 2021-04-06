@extends('admin.layout.master')
@section('workout-item','active')
@section('title')
    Workout Item
@endsection
@section('page-name')
    Workout Item
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Workout Item
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
                            <a class="text-white" href="{{ route('admin.workout-item.new') }}">
                                <button type="button" class="btn btn-round btn-sm btn-primary">
                                    <i
                                        class="ft-user-plus text-white"></i> Create Workout Item
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
                                    <table class="table table-striped table-bordered alt-pagination" id="indextable">
                                        <thead>
                                        <tr>
                                            <th>Sl.</th>
                                            <th>Workout Name</th>
                                            <th>Body Parts Name</th>
                                            <th>Photo</th>
                                            <th>Status</th>
                                            <th>Created at</th>
                                            <th>Updated at</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($workouts as $row)
                                            <tr>
                                                <td>{{$loop->index + 1}}</td>
                                                <td>{{$row->workout_name}}</td>
                                                <td>{{$row->name}}</td>
                                                <td>
                                                    <img align="middle" width="50" height="50"
                                                         src="{{$row->photo_url}}" alt="No image">
                                                </td>
                                                <td>
                                                    @if($row->status == 0)
                                                        {{'Inactive'}}
                                                    @else
                                                        {{'Active'}}
                                                    @endif
                                                </td>
                                                <td>{{ $row->created_at }}</td>
                                                <td>{{ $row->updated_at }}</td>
                                                <td>
                                                    <a href="{{ route('admin.workout-item.edit', [$row->id]) }}">
                                                        <button type="button"
                                                                class="btn btn-sm btn-outline-primary mr-1"><i
                                                                class="la la-edit"></i>
                                                        </button>
                                                    </a>

                                                    <a href="{{ route('admin.workout-item.delete', [$row->id]) }}">
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
