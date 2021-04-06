@extends('admin.layout.master')
@section('gym-admin','active')
@section('title')
    Admin | Edit
@endsection
@section('page-name')
    Edit Admin User
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item"><a href="{{ route('admin.gym-admin') }}"> Admin User </a>
    </li>
    <li class="breadcrumb-item active">Edit Admin User
    </li>
@endsection
@section('content')
    <div class="col-md-12">

        @if($errors->all())
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        @endif

        <div class="card" style="height: 981.5px;">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-colored-form-control">User Profile</h4>
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

                <div class="card-body">
                    {!! Form::open([ 'route' => ['admin.gym-admin.update', $user->auth_id], 'method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate']) !!}
                    @csrf
                    <div class="form-body">
                        <h4 class="form-section"><i class="la la-eye"></i> About User</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <div class="controls">
                                        {!! Form::text('first_name', $user->first_name,[ 'class' => 'form-control mb-1', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter first name', 'tabindex' => 1 ]) !!}
                                    </div>
                                    @if ($errors->has('first_name'))
                                        <span class="alert alert-danger">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <div class="controls">
                                        {!! Form::text('last_name', $user->last_name,[ 'class' => 'form-control mb-1', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter last name', 'tabindex' => 1 ]) !!}
                                    </div>
                                </div>
                                @if ($errors->has('last_name'))
                                    <span class="alert alert-danger">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Designation</label>
                                    <div class="controls">
                                        {!! Form::text('designation', $user->designation,[ 'class' => 'form-control mb-1', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter designation', 'tabindex' => 1 ]) !!}
                                    </div>
                                </div>
                                @if ($errors->has('designation'))
                                    <span class="alert alert-danger">
                                            <strong>{{ $errors->first('designation') }}</strong>
                                        </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <div class="controls">
                                        {!! Form::select('status', ['1' => 'Yes', '0' => 'No'], $user->status, [ 'class' => 'form-control mb-1', 'placeholder' => 'Select status', 'data-validation-required-message' => 'This field is required']) !!}
                                    </div>
                                    @if ($errors->has('status'))
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('status') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>


                    <h4 class="form-section"><i class="ft-mail"></i> Contact Info &amp; Bio</h4>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Username</label>
                                <div class="controls">
                                    {!! Form::text('username', $user->username,[ 'class' => 'form-control mb-1', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter username', 'tabindex' => 1 ]) !!}
                                </div>
                                @if ($errors->has('username'))
                                    <span class="alert alert-danger">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Contact Number</label>
                                <div class="controls">
                                    {!! Form::text('mobile_no', $user->mobile_no,[ 'class' => 'form-control mb-1', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter contact number', 'tabindex' => 1 ]) !!}
                                </div>
                                @if ($errors->has('mobile_no'))
                                    <span class="alert alert-danger">
                                            <strong>{{ $errors->first('mobile_no') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <div class="controls">
                            {!! Form::text('email', $user->email,[ 'class' => 'form-control mb-1', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter email', 'tabindex' => 1 ]) !!}
                        </div>
                        @if ($errors->has('email'))
                            <span class="alert alert-danger">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Gender</label>
                                <div class="controls">
                                    {!! Form::select('gender', ['1' => 'Male', '0' => 'Female'] , $user->gender, [ 'class' => 'form-control mb-1', 'placeholder' => 'Select gender', 'data-validation-required-message' => 'This field is required']) !!}
                                </div>
                                @if ($errors->has('gender'))
                                    <span class="alert alert-danger">
                                            <strong>{{ $errors->first('gender') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Can Login</label>
                                <div class="controls">
                                    {!! Form::select('can_login', ['1' => 'Yes', '0' => 'No'] , $user->can_login, [ 'class' => 'form-control mb-1', 'placeholder' => 'Select who can login', 'data-validation-required-message' => 'This field is required']) !!}
                                </div>
                                @if ($errors->has('can_login'))
                                    <span class="alert alert-danger">
                                            <strong>{{ $errors->first('can_login') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Role name</label>
                                <div class="controls">
                                    {!! Form::select('role', $role, $user->role_id, [ 'class' => 'form-control mb-1', 'placeholder' => 'Select role name', 'data-validation-required-message' => 'This field is required']) !!}
                                </div>
                                @if ($errors->has('role'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Gym name</label>
                                <div class="controls">
                                    {!! Form::select('gym', $gym, $user->gym_id, [ 'class' => 'form-control mb-1', 'placeholder' => 'Select gym name', 'data-validation-required-message' => 'This field is required']) !!}
                                </div>
                                @if ($errors->has('gym'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('gym') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <h5>Profile Pic<span class="required"></span></h5>
                        <div class="controls">
                            <img align="middle" width="150" height="180"
                                 src="{{$user->profile_pic_url}}" alt="Profile_pic">
                            {!! Form::file('profile_pic', ['class' => 'form-control mb-1']); !!}
                        </div>
                        @if ($errors->has('profile_pic'))
                            <div class="alert alert-danger">
                                <strong>{{ $errors->first('profile_pic') }}</strong>
                            </div>
                        @endif
                    </div>


                    <div class="form-actions text-center">
                        <a href="{{ route('admin.gym-admin')}}">
                            <button type="button" class="btn btn-warning mr-1">
                                <i class="ft-x"></i> Cancel
                            </button>
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="la la-check-square-o"></i> Save changes
                        </button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
