@extends('admin.layout.master')

@section('web_settings','open')
@section('area','active')

@section('title') Area @endsection
@section('page-name') Area @endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" >@lang('product.breadcrumb_title') </a></li>
<li class="breadcrumb-item active">Area</li>
@endsection

@php
    $roles = userRolePermissionArray();
    $type = request()->get('type') ?? null;

@endphp

@section('content')
<!-- Alternative pagination table -->
<div class="content-body">
    <section id="pagination">
        <div class="row">
            <div class="col-12">
                <div class="card card-sm">
                    <div class="card-header pl-2">
                        @if(hasAccessAbility('new_area', $roles))
                            <a class="text-white btn btn-round btn-sm btn-primary" href="{{ route('admin.area.create')}}"><i class="ft-plus text-white"></i>Add Area</a>
                        @endif
                        &nbsp;&nbsp;
                        <select class="form-control" style="width: 150px; display: inline;" id="filterArea">
                            <option value="{{route('admin.area.list')}}"> -- All Areas -- </option>
                            <option value="{{route('admin.area.list')}}?type=division" {{ $type == 'division' ? 'selected' : '' }}> Division Areas </option>
                            <option value="{{route('admin.area.list')}}?type=city" {{ $type == 'city' ? 'selected' : '' }}> City Areas </option>
                        </select>

                        <a class="heading-elements-toggle heading-elements-toggle-sm"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements heading-elements-sm">
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
                                            <th>Sl.</th>
                                            <th class="text-left" >@lang('tablehead.area')</th>
                                            <th class="text-left" >@lang('tablehead.city_division')</th>
                                            <th class="text-left">URL Title</th>
                                            <th class="text-left" >@lang('tablehead.order')</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($rows as $row)

                                    <tr>
                                        <td>{{$loop->index + 1}}</td>
                                        <td class="text-left">{{ $row->name }}</td>
                                        <td class="text-left">
                                            {{$row->city->name ?? '' }} {{$row->division->name ?? '' }}</td>
                                        <td class="text-left">{{ $row->url_slug }}</td>
                                        <td class="text-left">{{ $row->order_id }}</td>
                                        <td>

                                            @if(hasAccessAbility('edit_area', $roles))
                                            <a href="{{ route('admin.area.edit', [$row->pk_no]) }}" title="EDIT" class="btn btn-xs btn-outline-primary mr-1"><i class="la la-edit"></i></a>
                                            @endif

                                            @if(hasAccessAbility('delete_area', $roles))
                                            <a href="{{ route('admin.area.delete', [$row->pk_no]) }}" onclick="return confirm('Are you sure you want to delete  area ?')" title="DELETE" class="btn btn-xs btn-outline-danger mr-1"><i class="la la-trash"></i></a>
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

<script type="text/javascript">
    $(document).on('change','#filterArea',function(){
       
        window.location = $(this).val();
    })
</script>


@endpush('custom_js')
