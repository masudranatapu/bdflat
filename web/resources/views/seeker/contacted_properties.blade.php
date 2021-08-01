@extends('layouts.app')
@section('contacted-properties','active')
@push('custom_css')
@endpush

<?php
$product_lists = $data['rows'] ?? [];
?>

@section('content')
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
                                    <h3><a href="my-dashboard.html"><i class="fa fa-long-arrow-left"></i>Contacted Properties</a></h3>
                                </div>
                                <!-- product -->
                                @if(isset($product_lists) && count($product_lists) > 0 )
                                    @foreach($product_lists as $item)
                                        <div class="property-product mb-4">
                                            <div class="row no-gutters position-relative">
                                                <div class="col-4">
                                                    <div class="property-bx">
                                                        <a href="#"><img src="{{ asset($listing->getDefaultThumb->THUMB_PATH ?? '') }}" class="w-100" alt="image"></a>
                                                    </div>
                                                </div>
                                                <div class="col-8 position-static">
                                                    <h3>TK {{$item->getListingVariant->TOTAL_PRICE ?? 0}} <span class="float-right claim"><a
                                                                href="{{ route('refund-request',$item->PK_NO) }}">Claim Refund</a> <i
                                                                class="fa fa-exclamation-triangle"></i></span></h3>
                                                    <h5 class="mt-0"><a href="#">{{$item->TITLE}}</a></h5>
                                                    <h6>{{--{{$item->getListingVariant->BEDROOM}} Bed, {{$item->getListingVariant->BATHROOM}} Bath--}} <a
                                                            href="javascript:void(0)" data-id="{{$item->PK_NO}}" class="moreVariantBtn">More</a>
                                                    </h6>
                                                    <a href="#" class="location"><i class="fa fa-map-marker"></i>{{$item->AREA_NAME}}, {{$item->CITY_NAME}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>


                            <div class="city-location">
                                <div class="modal fade" id="extra_variants" tabindex="-1" aria-labelledby="extra_variantsLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="extra_variantsLabel">More Variants</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="nav modalcategory flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                            <table class="table text-center table-striped" style="font-family: 'Montserrat-Medium';font-size: 14px">
                                                                <thead>
                                                                <tr>
                                                                    <th>BED</th>
                                                                    <th>BATH</th>
                                                                    <th>PRICE</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody id="show_variant"></tbody>
                                                            </table>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div><!-- row -->
        </div><!-- container -->
    </div>


@endsection

@push('custom_js')
    <script>
        $(".moreVariantBtn").on('click', function () {
            var id = $(this).data('id');
            $.ajax({
                url: "ajax-get-variants/" + id,
                method: 'GET',
                success: function (data) {
                    $("#show_variant").empty();
                    $("#extra_variants").modal('show');
                    $("#show_variant").append(data);
                }
            });
        });

        $(".close").on('click', function () {
            $("#extra_variants").modal('hide');
        });
    </script>
@endpush
