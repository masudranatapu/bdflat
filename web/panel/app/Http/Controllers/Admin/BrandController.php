<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Repositories\Admin\Brand\BrandInterface;
use App\Http\Requests\Admin\ProductBrandRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use DB;

class BrandController extends BaseController
{
    protected $userGroup;
    protected $category;
    protected $brandModel;

    public function __construct(BrandInterface $brand, Category $category, Brand $brandModel)
    {
        $this->brand        = $brand;
        $this->brandModel   = $brandModel;
        $this->category     = $category;
    }

    public function getIndex(Request $request)
    {
        $this->brand_resp = $this->brand->getPaginatedList($request, 50);
        return view('admin.product-brand.index')->withRows($this->brand_resp->data);

    }

    public function getCreate() {

        $data = array();
        $data['category'] = $this->category->getParentCategorCombo();
        return view('admin.product-brand.create', compact('data'));
    }

    public function postStore(ProductBrandRequest $request) {

        $this->resp = $this->brand->postStore($request);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    
    public function getBrandBySubCat($sub_cat_id)
    {
        $prod_model = $this->brandModel->getBrandBySubCat($sub_cat_id);
        return response()->json($prod_model);

    }


    public function postEdit(Request $request, $id){

        $data                   = array();
        $this->resp             = $this->brand->findOrThrowException($id);
        $data['row']            = $this->resp->data;
        $category               = $this->resp->data->cat_pk_no;
        $data['category']       = $this->category->getParentCategorCombo();
        $data['subcategory']    = $this->category->getChildCategorCombo($category);

        return view('admin.product-brand.edit',compact('data'));

    }

    public function postUpdate(ProductBrandRequest $request, $id)
    {
        //dd($id);
        $this->resp = $this->brand->postUpdate($request, $id);
        //dd($this->resp->data);

        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getDelete($id)
    {
        $this->resp = $this->brand->delete($id);

        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }


}
