@extends('admin.layout.master')
@section('gym-admin','active')
@section('title')
    Gym Admin | Create
@endsection
@section('page-name')
    Create Gym Admin
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item"><a href="{{ route('admin.gym-admin') }}">Gym Admin </a>
    </li>
    <li class="breadcrumb-item active">Create Gym Admin
    </li>
@endsection
@section('content')
    <div class="card" style="height: 981.5px;">
        <div class="card-header">
            <h4 class="card-title" id="basic-layout-colored-form-control">Gym Admin Profile</h4>
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
                {!! Form::open([ 'route' => 'admin.gym-admin.store', 'method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate']) !!}
                @csrf
                <div class="form-body">
                    <h4 class="form-section"><i class="la la-eye"></i> About User</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>First Name</label>
                                <div class="controls">
                                    {!! Form::text('first_name', null,[ 'class' => 'form-control mb-1', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter first name', 'tabindex' => 1 ]) !!}
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
                                    {!! Form::text('last_name', null,[ 'class' => 'form-control mb-1', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter last name', 'tabindex' => 1 ]) !!}
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
                                    {!! Form::text('designation', null,[ 'class' => 'form-control mb-1', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter designation', 'tabindex' => 1 ]) !!}
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
                                    {!! Form::select('status', ['1' => 'Yes', '0' => 'No'], null, [ 'class' => 'form-control mb-1', 'placeholder' => 'Select status', 'data-validation-required-message' => 'This field is required']) !!}
                                </div>
                                @if ($errors->has('status'))
                                    <span class="alert alert-danger">
                                            <strong>{{ $errors->first('status') }}</strong>
                                        </span>
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
                                {!! Form::text('username', null,[ 'class' => 'form-control mb-1', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter username', 'tabindex' => 1 ]) !!}
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
                                {!! Form::text('mobile_no', null,[ 'class' => 'form-control mb-1', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter contact number', 'tabindex' => 1 ]) !!}
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
                        {!! Form::text('email', null,[ 'class' => 'form-control mb-1', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter email', 'tabindex' => 1 ]) !!}
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
                            <label>Password</label>
                            <div class="controls">
                                {!! Form::password('password',[ 'class' => 'form-control mb-1', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter password', 'tabindex' => 1 ]) !!}
                            </div>
                            @if ($errors->has('password'))
                                <span class="alert alert-danger">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <div class="controls">
                                {!! Form::password('password_confirmation',[ 'class' => 'form-control mb-1', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter confirm password', 'tabindex' => 1 ]) !!}
                            </div>
                            @if ($errors->has('password_confirmation'))
                                <span class="alert alert-danger">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Gender</label>
                            <div class="controls">
                                {!! Form::select('gender', ['1' => 'Male', '0' => 'Female'] , null, [ 'class' => 'form-control mb-1', 'placeholder' => 'Select gender', 'data-validation-required-message' => 'This field is required']) !!}
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
                                {!! Form::select('can_login', ['1' => 'Yes', '0' => 'No'] , null, [ 'class' => 'form-control mb-1', 'placeholder' => 'Select who can login', 'data-validation-required-message' => 'This field is required']) !!}
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
                                {!! Form::select('role', $role, null, [ 'class' => 'form-control mb-1', 'placeholder' => 'Select role name', 'data-validation-required-message' => 'This field is required']) !!}
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
                                {!! Form::select('gym', $gym, null, [ 'class' => 'form-control mb-1', 'placeholder' => 'Select gym name', 'data-validation-required-message' => 'This field is required']) !!}
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
                        {!! Form::file('profile_pic', null, ['class' => 'form-control mb-1', 'data-validation-required-message' => 'This field is required']); !!}
                    </div>
                    @if ($errors->has('profile_pic'))
                        <span class="alert alert-danger">
                                            <strong>{{ $errors->first('profile_pic') }}</strong>
                                        </span>
                    @endif
                </div>

                <div class="form-actions text-center">
                    <a href="{{ route('admin.gym-admin')}}">
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
