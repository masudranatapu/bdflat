<?php
namespace App\Repositories\Api\Product;
use DB;
use App\Models\Product;
use App\Models\AdminUser;
use App\Models\ProdImgLib;
use App\Traits\ApiResponse;
use App\Models\ProductVariant;

class ProductAbstract implements ProductInterface
{
    use ApiResponse;

    function __construct() {
    }

    // public function getProductList(){
    //     $data = DB::table('PRD_VARIANT_SETUP as v')
    //                 ->select('m.COMPOSITE_CODE as sku_id','m.MKT_CODE as mkt_id','m.DEFAULT_NAME as product_name','v.VARIANT_NAME as product_variant_name','v.SIZE_NAME as size','v.COLOR as color','v.REGULAR_PRICE as price','m.PRIMARY_IMG_RELATIVE_PATH as primary_image','m.PK_NO as available_qty', DB::raw('(select RELATIVE_PATH from PRD_IMG_LIBRARY where PRD_IMG_LIBRARY.F_PRD_VARIANT_NO = v.PK_NO and PRD_IMG_LIBRARY.SERIAL_NO=0) as variant_primary_image'))
    //                 ->rightJoin('PRD_MASTER_SETUP as m', 'm.PK_NO', 'v.F_PRD_MASTER_SETUP_NO')
    //                 ->get();
    //     // $data = ProductVariant::rightJoin('PRD_MASTER_SETUP as m', 'm.PK_NO', 'PRD_VARIANT_SETUP.F_PRD_MASTER_SETUP_NO')
    //     //                         ->select('m.COMPOSITE_CODE as sku_id','m.MKT_CODE as mkt_id','m.DEFAULT_NAME as product_name','PRD_VARIANT_SETUP.VARIANT_NAME as product_variant_name','PRD_VARIANT_SETUP.SIZE_NAME as size','PRD_VARIANT_SETUP.COLOR as color','PRD_VARIANT_SETUP.REGULAR_PRICE as price','m.PRIMARY_IMG_RELATIVE_PATH as primary_image','m.PK_NO as available_qty', DB::raw('(select RELATIVE_PATH from PRD_IMG_LIBRARY where PRD_IMG_LIBRARY.F_PRD_VARIANT_NO = PRD_VARIANT_SETUP.PK_NO and PRD_IMG_LIBRARY.SERIAL_NO=0) as variant_primary_image'))
    //     //                         ->get();
    //     if (!empty($data)) {
    //         return $this->successResponse(200, 'Product list is available !', $data, 1);
    //     }
    //     return $this->successResponse(404, 'Data Not Found !', null, 0);
    // }

    public function getProductList(){
        $data = Product::select('PK_NO as mp_id','DEFAULT_NAME as mp_name','PRIMARY_IMG_RELATIVE_PATH as mp_image','MODEL_NAME as mp_model', 'BRAND_NAME as mp_brand')->get();
        if (!empty($data)) {
            return $this->successResponse(200, 'Product list is available !', $data, 1);
        }
        return $this->successResponse(404, 'Data Not Found !', null, 0);
    }

    public function getVariantList($id){

        // $data =  DB::table('PRD_VARIANT_SETUP as v')
        //             ->join('PRD_IMG_LIBRARY as i', 'i.F_PRD_VARIANT_NO', 'v.PK_NO')
        //             ->select('v.PK_NO','v.COMPOSITE_CODE as sku_id','v.VARIANT_NAME as product_variant_name','v.SIZE_NAME as size','v.COLOR as color','v.REGULAR_PRICE as price','v.INSTALLMENT_PRICE as ins_price','v.SEA_FREIGHT_CHARGE as sea_price', 'v.AIR_FREIGHT_CHARGE as air_price', 'v.PREFERRED_SHIPPING_METHOD as payment_method', 'v.VAT_AMOUNT as vat', DB::raw('(select RELATIVE_PATH from PRD_IMG_LIBRARY where PRD_IMG_LIBRARY.F_PRD_VARIANT_NO = v.PK_NO and PRD_IMG_LIBRARY.SERIAL_NO = 0) as variant_primary_image'))
        //             ->where('v.F_PRD_MASTER_SETUP_NO',$id)
        //             ->get();

        $data = DB::table('PRD_VARIANT_SETUP as v')
                    ->select('v.PK_NO','v.COMPOSITE_CODE as sku_id','v.MKT_CODE as mkt_id','m.DEFAULT_NAME as product_name','v.VARIANT_NAME as product_variant_name','v.SIZE_NAME as size','v.COLOR as color','v.REGULAR_PRICE as price','v.INSTALLMENT_PRICE as ins_price','v.SEA_FREIGHT_CHARGE as sea_price', 'v.AIR_FREIGHT_CHARGE as air_price', 'v.PREFERRED_SHIPPING_METHOD as payment_method', 'v.VAT_AMOUNT_PERCENT as vat', DB::raw('(select RELATIVE_PATH from PRD_IMG_LIBRARY where PRD_IMG_LIBRARY.F_PRD_VARIANT_NO = v.PK_NO and PRD_IMG_LIBRARY.SERIAL_NO=0) as variant_primary_image'))
                    ->leftJoin('PRD_MASTER_SETUP as m', 'm.PK_NO', 'v.F_PRD_MASTER_SETUP_NO')
                    ->where('v.F_PRD_MASTER_SETUP_NO',$id)
                    ->get();

        if (!empty($data)) {
            return $this->successResponse(200, 'Product variant data is available !', $data, 1);
        }
        return $this->successResponse(404, 'Data Not Found !', null, 0);
    }

    public function getVariantImg($id){
        $data = ProdImgLib::select('RELATIVE_PATH as mp_image')->where('F_PRD_VARIANT_NO', $id)->get();
        if (!empty($data)) {
            return $this->successResponse(200, 'Variant Image is available !', $data, 1);
        }
        return $this->successResponse(404, 'Data Not Found !', null, 0);
    }

    public function getStockSearchList($request){
        if (!empty($request->barcode) && $request->barcode != '') {
            $data = DB::table('PRD_VARIANT_SETUP as v')
                    ->select('v.PK_NO','v.COMPOSITE_CODE as sku_id','v.MKT_CODE as mkt_id','m.DEFAULT_NAME as product_name','v.VARIANT_NAME as product_variant_name','v.SIZE_NAME as size','v.COLOR as color','v.REGULAR_PRICE as price','v.PK_NO as available_qty','v.PK_NO as available_qty_uk','v.PK_NO as available_qty_my','v.PK_NO as available_qty_tr_sea','v.PK_NO as available_qty_tr_air','v.PK_NO as already_booked_uk','v.PK_NO as already_booked_my','v.PK_NO as already_booked_sea','v.PK_NO as already_booked_air', 'm.PRIMARY_IMG_RELATIVE_PATH as primary_image', DB::raw('(select RELATIVE_PATH from PRD_IMG_LIBRARY where PRD_IMG_LIBRARY.F_PRD_VARIANT_NO = v.PK_NO and PRD_IMG_LIBRARY.SERIAL_NO=0) as variant_primary_image'))
                    ->leftJoin('PRD_MASTER_SETUP as m', 'm.PK_NO', 'v.F_PRD_MASTER_SETUP_NO')
                    ->where('v.BARCODE',$request->barcode)
                    ->get();
                    if (!$data->isEmpty()) {
                        return $this->successResponse(200, 'Variant is available !', $data, 1);
                    }
                    return $this->successResponse(404, 'Data Not Found !', null, 0);
        }else{
            $data = DB::table('PRD_VARIANT_SETUP as v')
                        ->select('v.PK_NO','v.COMPOSITE_CODE as sku_id','v.MKT_CODE as mkt_id','m.DEFAULT_NAME as product_name','v.VARIANT_NAME as product_variant_name','v.SIZE_NAME as size','v.COLOR as color','v.REGULAR_PRICE as price','v.PK_NO as available_qty','v.PK_NO as available_qty_uk','v.PK_NO as available_qty_my','v.PK_NO as available_qty_tr_sea','v.PK_NO as available_qty_tr_air','v.PK_NO as already_booked_uk','v.PK_NO as already_booked_my','v.PK_NO as already_booked_sea','v.PK_NO as already_booked_air','v.PK_NO as ', 'm.PRIMARY_IMG_RELATIVE_PATH as primary_image', DB::raw('(select RELATIVE_PATH from PRD_IMG_LIBRARY where PRD_IMG_LIBRARY.F_PRD_VARIANT_NO = v.PK_NO and PRD_IMG_LIBRARY.SERIAL_NO=0) as variant_primary_image'))
                        ->leftJoin('PRD_MASTER_SETUP as m', 'm.PK_NO', 'v.F_PRD_MASTER_SETUP_NO')
                        ->Where('v.VARIANT_NAME', 'like', '%' . $request->product_name . '%')
                        ->where('v.COMPOSITE_CODE', 'like', '%' . $request->sku_id . '%')
                        ->Where('v.MKT_CODE', 'like', '%' . $request->mkt_id . '%')
                        ->get();


                        if ($data->isEmpty()) {
                            return $this->successResponse(404, 'Data Not Found !', null, 0);
                        }
                        return $this->successResponse(200, 'Variant is available !', $data, 1);

        }

    }
}
