<?php
namespace App\Repositories\Admin\Brand;

use App\Models\Brand;
use App\Traits\RepoResponse;
use DB;


class BrandAbstract implements BrandInterface
{
    use RepoResponse;

    protected $brand;

    public function __construct(Brand $brand)
    {
        $this->brand = $brand;
    }

    public function getPaginatedList($request, int $per_page = 5)
    {
        $data = $this->brand->where('is_delete',0)->paginate($per_page);
        //dd($data);
        return $this->formatResponse(true, '', 'admin.brand.list', $data);
    }


    public function postStore($request)
    {
    //dd($request);
        DB::beginTransaction();

        try {
            $brand                  = new Brand();
            $brand->name            = $request->name;
            $brand->cat_pk_no       = $request->category;
            $brand->scat_pk_no       = $request->sub_category;
            $brand->save();

        } catch (\Exception $e) {

            DB::rollback();
            return $this->formatResponse(false, 'Brand not created successfully !', 'admin.brand.list');
        }
        DB::commit();

        return $this->formatResponse(true, 'Brand has been created successfully !', 'admin.brand.list');
    }

    public function findOrThrowException($id)
    {
        $data = $this->brand->where('PK_NO', '=', $id)->first();

        if (!empty($data)) {
            return $this->formatResponse(true, '', 'admin.brand.edit', $data);
        }

        return $this->formatResponse(false, 'Did not found data !', 'admin.brand.list', null);
    }


    public function postUpdate($request, $id)
    {

        DB::beginTransaction();

        try {

            $brand              = $this->brand->find($id);
            $brand->name        = $request->name;
            $brand->cat_pk_no   = $request->category;
            $brand->scat_pk_no   = $request->sub_category;
            $brand->update();

        } catch (\Exception $e) {
            DB::rollback();

            return $this->formatResponse(false, 'Unable to update brand !', 'admin.brand.list');
        }

        DB::commit();

        return $this->formatResponse(true, 'Brand has been updated successfully !', 'admin.brand.list');
    }

    public function delete($id)
    {
        DB::begintransaction();
        try {
            $brand = $this->brand->find($id);
            $brand->is_delete = 1;
            $brand->update();
            
        } catch (\Exception $e) {
            DB::rollback();

            return $this->formatResponse(false, 'Unable to delete this action !', 'admin.brand.list');
        }
        DB::commit();

        return $this->formatResponse(true, 'Successfully delete this action !', 'admin.brand.list');
    }




}
