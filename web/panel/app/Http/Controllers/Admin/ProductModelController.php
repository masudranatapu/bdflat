<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Admin\ProductModel\ProductModelInterface;
use App\Traits;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\ProductModelRequest;
use App\Models\ProductModel;
use App\Models\Brand;
use App\Models\Category;

class ProductModelController extends BaseController
{
    protected $productModelInt;
    protected $brand;

    public function __construct(
        ProductModelInterface       $productModelInt,
        Brand                       $brand,
        Category                    $category
    )
    {
        $this->productModelInt      = $productModelInt;
        $this->brand                = $brand;
        $this->category             = $category;
    }

    public function getIndex(Request $request) {

        $this->resp = $this->productModelInt->getPaginatedList($request);

        return view('admin.product-model.index')
        ->withModel($this->resp->data);

    }

    public function getCreate() {
        $data                   = array();
        $data['brand_combo']    =  $this->brand->getBrandCombo();
        $data['category'] = $this->category->getParentCategorCombo();
        //$data['subcategory'] = $this->category->getChildCategorCombo();
        return view('admin.product-model.create', compact('data'));

    }

    public function postStore(ProductModelRequest $request) {

        $this->resp = $this->productModelInt->postStore($request);

        return redirect()->back()->with($this->resp->redirect_class, $this->resp->msg);

    }

    public function putUpdate(ProductModelRequest $request, $pk_no) {

        $this->resp = $this->productModelInt->postUpdate($request, $pk_no);
        return redirect()->back()->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getEdit(Request $request, $pk_no) {
        $data                   = array();
        $this->resp             = $this->productModelInt->getShow($pk_no); 
        $category_id            = $this->resp->data->cat_pk_no ?? null;
        $data['category']       = $this->category->getParentCategorCombo();
        $data['subcategory']    = $this->category->getChildCategorCombo();
        $data['brand_combo']    =  $this->brand->getBrandCombo($category_id);
        $data['row']            = $this->resp->data;       

        return view('admin.product-model.edit',compact('data'));
  
    }

    public function getDelete($pk_no) {

        $this->resp = $this->productModelInt->delete($pk_no);

        return redirect()->back()->with($this->resp->redirect_class, $this->resp->msg);
    }

}

