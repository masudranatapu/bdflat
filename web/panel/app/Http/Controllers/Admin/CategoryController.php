<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Repositories\Admin\Category\CategoryInterface;
use App\Http\Requests\Admin\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use DB;

class CategoryController extends BaseController
{
    protected $category;
    protected $categoryModel;

    public function __construct(CategoryInterface $category, Category $categoryModel)
    {
        $this->category         = $category;
        $this->categoryModel    = $categoryModel;
    }

    public function getIndex(Request $request)
    {
        $this->category_resp = $this->category->getPaginatedList($request, 20);
        return view('admin.category.index')->withRows($this->category_resp->data);

    }

    public function getCreate() {
        $data = array();
        $data['parent_category_combo'] = $this->categoryModel->getParentCategorCombo();
        return view('admin.category.create',compact('data'));
    }

    public function postStore(CategoryRequest $request) {

        $this->resp = $this->category->postStore($request);

        return redirect()->back()->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getEdit(Request $request, $id){
        $data = array();
        $data['parent_category_combo'] = $this->categoryModel->getParentCategorCombo();
        $this->resp = $this->category->findOrThrowException($id);
        $data['data'] = $this->resp->data;

        return view('admin.category.edit', compact('data'));

    }

    public function postUpdate(CategoryRequest $request, $id)
    {
      
        $this->resp = $this->category->postUpdate($request, $id);
        return redirect()->back()->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getDelete($id)
    {
        $this->resp = $this->category->delete($id);

        return redirect()->back()->with($this->resp->redirect_class, $this->resp->msg);
    }


}
