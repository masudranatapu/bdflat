@extends('admin.layout.master')
@section('gym','active')
@section('title')
    Gym | Edit
@endsection
@section('page-name')
    Gym User Edit
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item"><a href="{{ route('admin.gym') }}"> Gym User </a>
    </li>
    <li class="breadcrumb-item active">Gym User Edit
    </li>
@endsection
@section('content')
    <div class="card" style="height: 943.5px;">
        <div class="card-header">
            <h4 class="card-title" id="basic-layout-colored-form-control"> Gym User Profile</h4>
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
                {!! Form::open([ 'route' => ['admin.gym.update', $user->id], 'method' => 'post', 'class' => 'form-horizontal', 'files' => true , 'novalidate']) !!}
                @csrf
                <div class="form-body">
                    <h4 class="form-section"><i class="la la-eye"></i> Edit Gym User</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>User Name</label>
                                <div class="controls">
                                    {!! Form::text('name', $user->name, [ 'class' => 'form-control mb-1', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter user name', 'tabindex' => 1 ]) !!}
                                </div>
                                @if ($errors->has('name'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Code</label>
                                <div class="controls">
                                    {!! Form::text('code', $user->code,[ 'class' => 'form-control mb-1', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter user code', 'tabindex' => 1 ]) !!}
                                </div>
                            </div>
                            @if ($errors->has('code'))
                                <span class="alert alert-danger">
                                    <strong>{{ $errors->first('code') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Moto</label>
                                <div class="controls">
                                    {!! Form::text('moto', $user->moto,[ 'class' => 'form-control mb-1', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter moto', 'tabindex' => 1 ]) !!}
                                </div>
                            </div>
                            @if ($errors->has('moto'))
                                <span class="alert alert-danger">
                                    <strong>{{ $errors->first('moto') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Address</label>
                                <div class="controls">
                                    {!! Form::text('address', $user->address, [ 'class' => 'form-control mb-1', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter address', 'tabindex' => 1 ]) !!}
                                </div>
                            </div>
                            @if ($errors->has('address'))
                                <span class="alert alert-danger">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Established</label>
                        <div class="controls">
                            {!! Form::text('established', $user->established, [ 'class' => 'form-control mb-1', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter established', 'tabindex' => 1 ]) !!}
                        </div>
                        @if ($errors->has('established'))
                            <span class="alert alert-danger">
                                <strong>{{ $errors->first('established') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Logo<span class="required"></span></h5>
                                <div class="controls">
                                    <img align="left" width="150" height="150"
                                         src="{{$user->logo_url}}" alt="">
                                    {!! Form::file('logo' ,['class' => 'form-control mb-1']); !!}
                                </div>
                                @if ($errors->has('logo'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('logo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Banner<span class="required"></span></h5>
                                <div class="controls">
                                    <img align="left" width="350" height="150"
                                         src="{{ $user->banner_url }}" alt="">
                                    {!! Form::file('banner', ['class' => 'form-control mb-1']); !!}
                                </div>
                                @if ($errors->has('banner'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('banner') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Status</label>
                                <div class="controls">
                                    {!! Form::select('status', ['1' => 'Yes', '0' => 'No'], $user->status, [ 'class' => 'form-control mb-1', 'placeholder' => 'Select status', 'data-validation-required-message' => 'This field is required']) !!}
                                </div>
                                @if ($errors->has('status'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-actions text-center">
                        <a href="{{ route('admin.gym')}}">
                            <button type="button" class="btn btn-outline-warning btn-min-width box-shadow-5 mr-1 mb-1">
                                Cancel
                            </button>
                        </a>
                        <button type="submit" class="btn btn-outline-success btn-min-width box-shadow-5 mr-1 mb-1">
                            Save changes
                        </button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
