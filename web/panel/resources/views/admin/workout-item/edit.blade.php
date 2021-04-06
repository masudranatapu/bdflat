@extends('admin.layout.master')
@section('workout-item','active')
@section('title')
    Workout Item | Create
@endsection
@section('page-name')
    Create Workout Item
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item"><a href="{{ route('admin.workout-item') }}">Workout Item </a>
    </li>
    <li class="breadcrumb-item active">Create Workout Item
    </li>
@endsection
@section('content')
    <div class="card" style="height: 981.5px;">
        <div class="card-header">
            <h4 class="card-title" id="basic-layout-colored-form-control"> Add Workout Item</h4>
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

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="margin-bottom: 0px !important;">
                    @foreach ($errors->all() as $error)
                        <li>* {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card-content collapse show">
            <div class="card-body">
                {!! Form::open([ 'route' => ['admin.workout-item.update', $item->id], 'method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate']) !!}
                @csrf
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Item Name</label>
                                <div class="controls">
                                    {!! Form::text('workout_name', $item->workout_name,[ 'class' => 'form-control mb-1', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter work name', 'tabindex' => 1 ]) !!}
                                </div>
                                @if ($errors->has('workout_name'))
                                    <span class="alert alert-danger">
                                                <strong>{{ $errors->first('workout_name') }}</strong>
                                            </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Body Parts name</label>
                                <div class="controls">
                                    {{--                                    {!! Form::hidden('id', $bodyparts->body_parts_id, null, [ 'class' => 'form-control mb-1', 'placeholder' => 'Select body parts name', 'data-validation-required-message' => 'This field is required']) !!}--}}
                                    {!! Form::select('body_parts_id', $bodyparts, $item->body_parts_id, [ 'class' => 'form-control mb-1', 'placeholder' => 'Select body parts name', 'data-validation-required-message' => 'This field is required']) !!}
                                </div>
                                @if ($errors->has('body_parts_id'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('body_parts_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status</label>
                                <div class="controls">
                                    {!! Form::select('status', ['1' => 'Yes', '0' => 'No'], $item->status, [ 'class' => 'form-control mb-1', 'placeholder' => 'Select status', 'data-validation-required-message' => 'This field is required']) !!}
                                </div>
                                @if ($errors->has('status'))
                                    <span class="alert alert-danger">
                                                    <strong>{{ $errors->first('status') }}</strong>
                                                </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <h5>Profile Pic<span class="required"></span></h5>
                        <div class="controls">
                            <img align="middle" width="150" height="150"
                                 src="{{$item->photo_url}}" alt="Profile_pic">
                            {!! Form::file('photo', ['class' => 'form-control mb-1']); !!}
                        </div>
                        @if ($errors->has('photo'))
                            <span class="alert alert-danger">
                                            <strong>{{ $errors->first('photo') }}</strong>
                                        </span>
                        @endif
                    </div>

                    <div class="form-actions text-center">
                        <a href="{{ route('admin.workout-item')}}">
                            <button type="button" class="btn btn-warning mr-1">
                                <i class="ft-x"></i> Cancel
                            </button>
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="la la-check-square-o"></i> Save
                        </button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
@endsection
