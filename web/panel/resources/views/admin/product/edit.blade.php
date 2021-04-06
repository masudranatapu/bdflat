@extends('admin.layout.master')

@section('product_list','active')
@section('Product Management','open')

@section('title') @lang('product.product_view') @endsection
@section('page-name') @lang('product.product_view') @endsection



@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('product.breadcrumb_title')  </a></li>
<li class="breadcrumb-item active">@lang('product.breadcrumb_sub_title')    </li>
@endsection

@push('custom_css')
<style type="text/css">
    #scrollable-dropdown-menu .tt-menu {
      max-height: 260px;
      overflow-y: auto;
      width: 100%;
      border: 1px solid #333;
      border-radius: 5px;

  }
  #scrollable-dropdown-menu2 .tt-menu {
      max-height: 260px;
      overflow-y: auto;
      width: 100%;
      border: 1px solid #333;
      border-radius: 5px;

  }
  .twitter-typeahead{
    display: block !important;
    /*width: 90%;*/
}


</style>

@endpush('custom_css')


<?php 


$roles  = userRolePermissionArray();
$type   = request('type') ?? null;
$row    = $data['row'] ;

// echo "<pre>";
// print_r($row->allPhotos);
// die();

?>

@section('content')
<div class="content-body">
    <div class="row">
        <div class="col-md-12">
            <div class="card" >
                <div class="card-content">
                    <div class="card-body">
                        {{-- <form action="{{route('product.update-url-slug')}}" method="post" novalidate>
                            @csrf
                            <div class="row form-group">
                                <label class="col-sm-3">URL Slug</label>
                                <div class="col-sm-9 user-type">
                                    <div class="input-group">
                                        <input type="hidden" name="prod_pk_no" value="{{$row->pk_no}}" />
                                        <input type="search" value="{{$row->url_slug}}" name="q" id="key_search" class="form-control search-input2" autocomplete="off" data-validation-required-message ="This field is required" />

                                        

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary btn-xs" style="width: 40px;" type="button"><i class="la la-pencil"></i></button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form> --}}
                        
                        {!! Form::open([ 'route' => ['admin.product.update', $row->pk_no], 'method' => 'post', 'class' => 'form-horizontal', 'files' => true ]) !!}
                        <div class="row form-group">
                            <label class="col-sm-3">URL Slug</label>
                            <div class="col-sm-9 user-type">
                                    <input type="search" value="{{$row->url_slug}}" name="url_slug" id="key_search" class="form-control search-input2 noSpace" autocomplete="off" data-validation-required-message ="This field is required"  />

                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-sm-3">Promotion Type</label>
                            <div class="col-sm-9 user-type">
                                
                                <select class="form-control" name="promotion" >
                                    <option value="" selected="">--select--</option>
                                    <option value="Top" {{ $row->promotion == 'Top' ? 'selected' : '' }}>Top</option>
                                    <option value="Feature" {{ $row->promotion == 'Feature' ? 'selected' : '' }}>Feature</option>
                                    <option  value="Urgent" {{ $row->promotion == 'Urgent' ? 'selected' : '' }}>Urgent</option>
                                    <option value="Basic" {{ $row->promotion == 'Basic' ? 'selected' : '' }}>Free</option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-sm-3">Post For</label>
                            <div class="col-sm-9 user-type">
                             {{$row->main_category}} 
                         </div>
                     </div>
                     <div class="row form-group">
                        <label class="col-sm-3">Type of ad</label>
                        <div class="col-sm-9 user-type">
                            {{$row->ad_type}} 
                        </div>
                    </div>
                    
                    <div class="row form-group add-title">
                        <label class="col-sm-3 label-title">Ad Title</label>
                        <div class="col-sm-9">
                            <input type="text" readonly="" class="form-control" id="text" value="{{$row->ad_title}}">
                        </div>
                    </div>
                    <div class="row form-group add-title">
                        <label class="col-sm-3 label-title">Product Type</label>
                        <div class="col-sm-9">
                            <input type="text" readonly="" class="form-control" id="text" value="{{$row->prod_type}}">
                        </div>
                    </div>
                    <div class="row form-group add-title">
                        <label class="col-sm-3 label-title">City/Division</label>
                        <div class="col-sm-9">
                            <input type="text" readonly="" class="form-control" id="text" value="{{$row->area->city->name ?? $row->area->division->name}}">
                        </div>
                    </div>
                    <div class="row form-group add-title">
                        <label class="col-sm-3 label-title">Area</label>
                        <div class="col-sm-9">
                            <input type="text" readonly="" class="form-control" id="text" value="{{$row->area->name ?? ''}}">
                        </div>
                    </div>
                    <div class="row form-group add-image">
                        <label class="col-sm-3 label-title">Ad Photos</label>
                        <div class="col-sm-9 adsimgview">
                            <div class="upload-section">
                                @if(($row->allPhotos) && count($row->allPhotos) > 0 )
                                @foreach($row->allPhotos as $img)
                                <a href="" target="_blank"><img class="img-thumbnail example-image" src="https://dalalbazar.com/public/uploads/product/{{$row->pk_no.'/'.$img->img_name}}" alt="" width="200" /></a>
                                @endforeach
                                @endif
                            </div>  
                        </div>
                    </div>
                    <div class="row form-group select-condition">
                        <label class="col-sm-3">Condition</label>
                        <div class="col-sm-9">
                            {{$row->using_condition}}
                        </div>
                    </div>
                    <div class="row form-group select-price">
                        <label class="col-sm-3 label-title">Price</label>
                        <div class="col-sm-9">
                            <label>BDT</label>
                            <input type="text" readonly="" value="{{$row->price}}" class="form-control" id="text1">
                            <div class="checkbox mt-2">
                                <input type="radio" name="price" value="negotiable" id="negotiable" {{ $row->negotiable == 1 ? 'checked' : '' }}>
                                <label for="negotiable">Negotiable </label>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group brand-name">
                        <label class="col-sm-3 label-title">Category</label>
                        <div class="col-sm-9">
                            <input type="text" readonly="" class="form-control" value="{{$row->category->name}}">
                        </div>
                    </div>
                    <div class="row form-group brand-name">
                        <label class="col-sm-3 label-title">Subcategory</label>
                        <div class="col-sm-9">
                            <input type="text" readonly="" class="form-control" value="{{$row->subcategory->name}}">
                        </div>
                    </div>
                    <div class="row form-group brand-name">
                        <label class="col-sm-3 label-title">Brand Name</label>
                        <div class="col-sm-9">
                            <input type="text" readonly="" class="form-control" value="{{$row->brand_name}}">
                        </div>
                    </div>
                    <div class="row form-group model-name">
                        <label class="col-sm-3 label-title">Model</label>
                        <div class="col-sm-9">
                            <input type="text" readonly="" class="form-control" id="model" value="{{$row->model_name}}">  
                        </div>
                    </div>
                    <div class="row form-group additional">
                        <label class="col-sm-3 label-title">Additional</label>
                        <div class="col-sm-9">
                            {{$row->prod_feature}}
                        </div>
                    </div>
                    <div class="row form-group item-description">
                        <label class="col-sm-3 label-title">Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="textarea" readonly="" rows="8">{{$row->description}}</textarea>     
                        </div>
                    </div>
                    <div class="row form-group brand-name">
                        <label class="col-sm-3 label-title">Date & Time</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{date('d M, Y : h :i A', strtotime($row->created_at))}}">
                        </div>
                    </div>
                    <div class="section seller-info">
                        <h4>Seller Information</h4>
                        <div class="row form-group">
                            <label class="col-sm-3 label-title">Seller Type</label>
                            <div class="col-sm-9">
                                {{$row->customer->seller_type ?? '' }}
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-sm-3 label-title">Your Name</label>
                            <div class="col-sm-9">
                                <input type="text" readonly="" name="name" class="form-control" value="{{$row->customer->name ?? '' }}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-sm-3 label-title">Your Email ID</label>
                            <div class="col-sm-9">
                                <input type="email" readonly="" name="email" class="form-control" value="{{$row->customer->email ?? '' }}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-sm-3 label-title">Mobile Number (1)</label>
                            <div class="col-sm-9">
                                <input type="text" readonly="" name="mobileNumber" class="form-control" value="{{$row->customer->mobile1 ?? '' }}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-sm-3 label-title">Mobile Number (2)</label>
                            <div class="col-sm-9">
                                <input type="text" readonly="" name="mobileNumber" class="form-control" value="{{$row->customer->mobile2 ?? '' }}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-sm-3 label-title">Address</label>
                            <div class="col-sm-9">
                                <input type="text" readonly="" name="address" class="form-control" value="{{$row->address ?? '' }}">
                            </div>
                        </div>

                        <div class="row form-group rejected_reason @if($row->is_active != 2) d-none @endif">
                            <label class="col-sm-3 label-title">Reason of Reject</label>
                            <div class="col-sm-9">
                                <textarea class="form-control rejected_reason" placeholder="why you will reject this ad ??" rows="8" name="rejected_reason">{{$row->comments ?? '' }}</textarea>
                                <button type="submit" name="submit_btn" value="rejected" class="form-control mt-1 btn-danger text-white">Submit for Finally Reject this Ad</button>
                            </div>
                        </div>
                        
                        <div class="row form-group action_div">
                            <label class="col-sm-3 label-title">Action</label>
                            <div class="col-sm-9">
                                <button type="submit" value="accept" onclick="return confirm('are you really sure ??')" name="submit_btn" class="btn btn-success">Accept</button>
                                <button type="button" value="" class="btn btn-danger rejectad">Reject</button>
                            </div>
                        </div>
                        
                        
                        {!! Form::close() !!}
                    </div>                          
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!--/ Recent Transactions -->

@endsection
<!--push from page-->
@push('custom_js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script type="text/javascript">
    $('.noSpace').keyup(function() {
     this.value = this.value.replace(/\s/g,'');
    });


    $(document).on('click', '.rejectad', function(){

        $('.rejected_reason').removeClass('d-none');
        $('.action_div').toggleClass('d-none');
    });

    jQuery(document).ready(function($) {
        typeahead('customer');
    });

    function typeahead(type) {
        var get_url = $('#base_url').val();
        var engine = new Bloodhound({
            remote: {
                url: get_url+'/product/get-url-slug?q=%QUERY%&type='+type,
                wildcard: '%QUERY%',
                cache: false,
            },
            datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
            queryTokenizer: Bloodhound.tokenizers.whitespace
        });

        $(".search-input2").typeahead({
            hint: true,
            highlight: true,
            minLength: 1,
        }, {
            source: engine.ttAdapter(),
            // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
            // display: 'NAME',
            // displayKey: 'IG_CODE',
            name: 'url_slug',
            displayKey: 'url_slug',
            // valueKey: 'IG_CODE',
            limit: 20,

            // the key from the array we want to display (name,id,email,etc...)
            templates: {
                empty: [
                '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                ],
                header: [
                '<div class="list-group search-results-dropdown">'
                ],
                suggestion: function (data) {
                    return '<span class="list-group-item" style="cursor: pointer;">' + data.url_slug + '</span>'
                }
            }
        }); 
    }
</script>

@endpush('custom_js')