<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Repositories\Admin\ProductType\ProductTypeInterface;
use App\Http\Requests\Admin\ProductTypeRequest;
use Illuminate\Http\Request;
use App\Models\ProductType;
use App\Models\Category;
use App\Http\Models\CustomUser as User;

class ProductTypeController extends BaseController
{

    protected $color;
    protected $category;


    public function __construct(ProductTypeInterface $productTypeInt, Category $category)
    {
        $this->productTypeInt   = $productTypeInt;
        $this->category         = $category;

    }



    public function getIndex(Request $request)
    {

        $this->resp = $this->productTypeInt->getPaginatedList($request, 2000);
        return view('admin.product-type.index')->withRows($this->resp->data);

    }

    public function getCreate()
    {
        $data = array();
        $data['category'] = $this->category->getParentCategorCombo();
        return view('admin.product-type.create', compact('data'));
    }


    public function postStore(ProductTypeRequest $request)
    {

        $this->resp = $this->productTypeInt->postStore($request);
        return redirect()->back()->with($this->resp->redirect_class, $this->resp->msg);


    }
    public function getEdit(Request $request, $id){

        $data                   = array();
        $this->resp             = $this->productTypeInt->findOrThrowException($id);
        $data['row']            = $this->resp->data;
        $data['category']       = $this->category->getCategorCombo();
        $data['sub_category']   = $this->category->getChildCategorCombo();
        return view('admin.product-type.edit', compact('data'));
    }

    public function postUpdate(ProductTypeRequest $request, $id){
        
        $this->resp = $this->productTypeInt->postUpdate($request, $id);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);

    }

    public function getDelete($id)
    {

        $this->resp = $this->productTypeInt->delete($id);

        return redirect()->back()->with($this->resp->redirect_class, $this->resp->msg);
    }
}
