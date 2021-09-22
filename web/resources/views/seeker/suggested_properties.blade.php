@extends('layouts.app')
@section('suggested-properties','active')
@push('custom_css')


@endpush

@section('content')
    <!--
     ============   dashboard   ============
 -->
    <!--
         ============   dashboard   ============
     -->
    <div class="dashboard-sec">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <div class="col-md-3 mb-5 d-none d-md-block">
                    @include('common._left_menu')
                </div>

                <div class="col-sm-12 col-md-9">
                    <div class="account-details">

                        <div class="property-wrapper">
                            <div class="new-property">
                                <div class="property-heading">
                                    <h3><a href="#"><i class="fa fa-long-arrow-left"></i>Suggested Properties</a></h3>
                                </div>
                                <!-- product -->
                                @if(isset($data['properties']) && count($data['properties']))
                                    @foreach($data['properties'] as $property)
                                        <div class="property-product mb-4">
                                            <div class="row no-gutters position-relative">
                                                <div class="col-4">
                                                    <div class="property-bx">
                                                        <a href="{{ route('web.property.details', $property->URL_SLUG) }}">
                                                            <img src="{{ defaultThumb($property->THUMB_PATH ?? '') }}" class="w-100" alt="{{ $property->TITLE }}"></a>
                                                    </div>
                                                </div>
                                                <div class="col-8 position-static">
                                                    <h3>TK {{ number_format($property->TOTAL_PRICE ?? 0, 2) }}
                                                        @if($property->IS_VERIFIED == 1)
                                                            <span class="float-right">Verified <i class="fa fa-check-square"></i></span>
                                                        @endif
                                                    </h3>
                                                    <h5 class="mt-0"><a
                                                            href="{{ route('web.property.details', $property->URL_SLUG) }}">{{ $property->TITLE ?? '' }}</a>
                                                    </h5>
                                                    <h6>{{ $property->BEDROOM . ' Bed '  }}{{$property->BATHROOM. ' Bath' }}</h6>
                                                    <a href="#" class="location"><i
                                                            class="fa fa-map-marker"></i>{{ $property->AREA_NAME }}
                                                        , {{ $property->CITY_NAME }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    {{$data['properties']->links()}}
                                    @else
                                    <p>Data Not Found Yet</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- row -->
        </div><!-- container -->
    </div>


@endsection

@push('custom_js')

@endpush
