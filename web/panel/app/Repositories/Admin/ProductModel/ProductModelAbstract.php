<?php

namespace App\Repositories\Admin\ProductModel;

use App\Traits\RepoResponse;
use App\Models\ProductModel;
use DB;

class ProductModelAbstract implements ProductModelInterface
{

    use RepoResponse;

    protected $productModel;

    public function __construct(ProductModel $productModel)
    {
        $this->productModel = $productModel;
    }

    public function getPaginatedList($request)
    {
        $data = ProductModel::paginate(20);

        return $this->formatResponse(true, '','admin.product-model',$data);
    }
    public function postStore($request)
    {
        $productModel                   = new ProductModel();
        $productModel->cat_pk_no        = $request->category;
        $productModel->scat_pk_no        = $request->sub_category;
        $productModel->brand_pk_no      = $request->brand;
        $productModel->name             = $request->name;

        if ($productModel->save()) {
            return $this->formatResponse(true, 'Product model has been created successfully', 'admin.product-model');
        }

        return $this->formatResponse(false, 'Unable to create product model !', 'admin.product-model.new');
    }

    public function getShow(int $pk_no)
    {   
        $data = ProductModel::where('pk_no',$pk_no)->first();
        if (!empty($data)) {
            return $this->formatResponse(true, '', 'admin.product-model.edit', $data);
        }

        return $this->formatResponse(false, 'Did not found data !', 'admin.product-model', null);
    }

    public function postUpdate($request, $pk_no)
    {
        $productModel                   = ProductModel::find($pk_no);
        $productModel->cat_pk_no        = $request->category;
        $productModel->scat_pk_no       = $request->sub_category;
        $productModel->brand_pk_no      = $request->brand;
        $productModel->name             = $request->name;

        if ($productModel->update()) {
            return $this->formatResponse(true, 'Product model has been Updated successfully', 'admin.product-model');
        }

        return $this->formatResponse(false, 'Unable to update Product model !', 'admin.productModel.new');
    }

    public function delete(int $pk_no)
    {
        $productModel = ProductModel::find($pk_no);
        $productModel->is_delete = 1;
        $productModel->update();

        return $this->formatResponse(true,'Successfully deleted product model','admin.product-model');
    }


    public function getList()
    {
        return DB::table('admin.product-Model')->pluck('name', 'pk_no');
    }

    
}
