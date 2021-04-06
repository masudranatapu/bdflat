<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Repositories\Admin\AdminUser\AdminUserInterface;
use App\Repositories\Admin\Product\ProductInterface;
use App\Repositories\Admin\Role\RoleInterface;
use App\Repositories\Admin\UserGroup\UserGroupInterface;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\ProductModel;
use App\Models\Brand;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;
use App\Traits;


class ProductController extends BaseController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $dashboard;

    public function __construct(
        Product             $product,
        ProductModel        $productModel,
        ProductInterface    $productInt,
        Category            $category,
        SubCategory         $subCategory,
        Brand               $brand
    )
    {
        $this->product          = $product;
        $this->productModel     = $productModel;
        $this->productInt       = $productInt;
        $this->category         = $category;
        $this->subCategory      = $subCategory;
        $this->brand            = $brand;
    }

    public function getIndex(Request $request)
    {
        $this->resp = $this->productInt->getPaginatedList($request);
        return view('admin.product.index')->withRows($this->resp->data);
    }

  


    public function getCreate()
    {
        $data[]                         = '';
        $data['category_combo']         =  $this->category->getCategorCombo();
        $data['brand_combo']            =  $this->brand->getBrandCombo();
        return view('admin.product.create')->withData($data);
    }

    public function getProdModel($brand_id)
    {
        $prod_model = $this->productModel->getProdModel($brand_id);
        return response()->json($prod_model);

    }

    public function getSubcat($cat_id)
    {
        $sub_cat = $this->category->getChildCategorCombo($cat_id, $type = 'ajax');
        return response()->json($sub_cat);

    }


    public function postStore(ProductRequest $request)
    {

        $this->resp = $this->productInt->postStore($request);
        if ($this->resp->status) {
            $pk_no = $this->resp->id;
            return redirect()->route('admin.product.edit',['id' => $pk_no,'type' => 'variant', 'tab' => 2])->with($this->resp->redirect_class, $this->resp->msg);
        }else{
            return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
        }

    }

    public function postStoreProductVariant(ProductVariantRequest $request)
    {
        $this->resp = $this->productInt->postStoreProductVariant($request);
        $pk_no = $request->pk_no;
        return redirect()->route('admin.product.edit',['id' => $pk_no,'type' => 'variant', 'tab' => 2])->with($this->resp->redirect_class, $this->resp->msg);
    }




    public function getEdit(Request $request, $id)
    {
        $data[]             = '';
        $this->resp         = $this->productInt->getShow($id);
        $data['cat_id']     = $this->resp->data->subcategory->category->PK_NO ?? 0;
        $data['brand_id']   = $this->resp->data->F_BRAND ?? 0;
        $data['row']        = $this->resp->data;
        return view('admin.product.edit', compact('data'));

    }

    public function getView($id)
    {
        $data[] = '';
        $this->resp = $this->productInt->getShow($id);
        $cat_id     = $this->resp->data->subcategory->category->PK_NO ?? 0;
        $brand_id   = $this->resp->data->F_BRAND ?? 0;
        return view('admin.product.view')->withProduct($this->resp->data)->withData($data);
    }





    public function putUpdate(Request $request, $id)
    {

        $this->resp = $this->productInt->postUpdate($request, $id);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function putUpdateProductVariant(ProductVariantRequest $request, $id)
    {
        $this->resp = $this->productInt->postUpdateProductVariant($request, $id);
        return redirect()->route('admin.product.edit',['id' => $request->pk_no,'type' => 'variant', 'tab' => 2])->with($this->resp->redirect_class, $this->resp->msg);
    }


    public function getDelete($id)
    {
        $this->resp = $this->productInt->delete($id);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getUrlSlug(Request $request)
    {
        $key    = $request->get('q');
        $result = DB::table('prd_master')->select('url_slug', 'pk_no')->where('url_slug', 'LIKE', '%'.$key. '%')->get();
        // return $result;
        return response()->json($result);
    }
    public function getReport($id)
    {
        $data[] = '';
        $this->resp = $this->productInt->getShow($id);

        return view('admin.product.report')->withProduct($this->resp->data)->withData($data);
    }


    public function test()
    {

        $data = '';
        return view('admin.product.test')->withData($data);
    }


}
