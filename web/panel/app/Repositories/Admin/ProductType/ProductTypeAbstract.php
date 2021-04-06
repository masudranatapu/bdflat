<?php
namespace App\Repositories\Admin\ProductType;
use App\Models\ProductType;
use App\Traits\RepoResponse;
use DB;

class ProductTypeAbstract implements ProductTypeInterface
{
    use RepoResponse;

    protected $productType;

    public function __construct(ProductType $productType)
    {
        $this->productType = $productType;
    }

    public function getPaginatedList($request, int $per_page = 2000)
    {
        $data = $this->productType->where('is_delete',0)->orderBy('cat_pk_no','asc')->orderBy('scat_pk_no','asc')->orderBy('order_id','asc')->get();

        return $this->formatResponse(true, '', 'admin.product_type.list', $data);
    }

    public function findOrThrowException($id)
    {
        $data = $this->productType->find($id);

        if (!empty($data)) {
            return $this->formatResponse(true, '', 'admin.product_type.edit', $data);
        }

        return $this->formatResponse(false, 'Did not found data !', 'admin.brand.list', null);
    }


    public function postStore($request)
    {
        $brand = DB::table('PRD_BRAND')->select('NAME')->where('pk_no', '=', $request->brand)->first();
dd($request->all());

        DB::beginTransaction();

        try {
            $product_type = new productType();
            $product_type->name            = $request->name;
            $product_type->cat_pk_no       = $request->category;
            $product_type->scat_pk_no       = $request->sub_category;
            $product_type->save();

        } catch (\Exception $e) {
            dd($e);

            DB::rollback();
            return $this->formatResponse(false, 'Unable to create product type !', 'admin.product_type.list');

        }
        DB::commit();

        return $this->formatResponse(true, 'Product type has been created successfully !', 'admin.product_type.list');
    }


    public function delete($id)
    {
        DB::begintransaction();
        try {

            $product_type = $this->productType->find($id);
            $product_type->is_delete = 1;
            $product_type->update();

        } catch (\Exception $e) {
            DB::rollback();

            return $this->formatResponse(false, 'Unable to delete this action !', 'admin.product_type.list');
        }
        
        DB::commit();

        return $this->formatResponse(true, 'Product type has been deleted successfully !', 'admin.product_type.list');
    }


    public function postUpdate($request, $id){
        DB::beginTransaction();

        try {
            $product_type = $this->productType->find($id);
            $product_type->name = $request->name;
            $product_type->cat_pk_no = $request->category;
            $product_type->scat_pk_no = $request->sub_category;
            $product_type->update();


        } catch (\Exception $e) {
            DB::rollback();
            return $this->formatResponse(false, 'Unable to update product type !', 'admin.product_type.list');
        }

             DB::commit();

      

        return $this->formatResponse(true, 'Product type has been updated successfully !', 'admin.product_type.list');

    }







}
