<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Api\Product\ProductInterface;

class ProductController extends Controller
{
    protected $user;

    public function __construct(ProductInterface $product)
    {
        $this->product = $product;
    }

    public function getProductList(){

        $response = $this->product->getProductList();
        return response()->json($response, $response->code);
    }

    public function getVariantList(Request $request){

        $response = $this->product->getVariantList($request->pk_id);
        return response()->json($response, $response->code);
    }

    public function getVariantImg(Request $request){

        $response = $this->product->getVariantImg($request->PK_ID);
        return response()->json($response, $response->code);
    }

    public function getStockSearchList(Request $request){

        $response = $this->product->getStockSearchList($request);
        return response()->json($response, $response->code);
    }
}
