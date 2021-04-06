<?php
namespace App\Repositories\Admin\SubCategory;

use App\Models\SubCategory;
use App\Models\Category;
use App\Traits\RepoResponse;
use DB;


class SubCategoryAbstract implements SubCategoryInterface
{
    use RepoResponse;

    protected $sub_category;
    protected $category;

    public function __construct(SubCategory $sub_category, Category $category)
    {
        $this->sub_category = $sub_category;
        $this->category     = $category;
    }

    public function getPaginatedList($request, int $per_page = 1000, $cat_id)
    {
        
        if($cat_id != null){
            $data = $this->category->select('prd_category.pk_no','prd_category.name','prd_category.url_slug','pcat.name as category_name','prd_category.order_id')
                    ->where('prd_category.parent_id', '>' , 0)
                    ->where('prd_category.is_active',1)
                    ->where('prd_category.parent_id',$cat_id)
                    ->leftJoin('prd_category as pcat','pcat.pk_no', '=', 'prd_category.parent_id')
                    ->orderBy('prd_category.parent_id','asc')
                    ->orderBy('prd_category.order_id','asc')
                    ->paginate($per_page);

                   

      }else{
            $data = $this->category->select('prd_category.pk_no','prd_category.name','prd_category.url_slug','pcat.name as category_name','prd_category.order_id')
            ->where('prd_category.parent_id', '>' , 0)
            ->where('prd_category.is_active',1)
            ->leftJoin('prd_category as pcat','pcat.pk_no', '=', 'prd_category.parent_id')
            ->orderBy('prd_category.parent_id','asc')
            ->orderBy('prd_category.order_id','asc')
            ->paginate($per_page);
      }
        

        return $this->formatResponse(true, '', 'admin.sub_category.list', $data);
    }


    public function postStore($request)
    {
       
        DB::beginTransaction();

        try {
            $sub_category                                = new SubCategory();
            $sub_category->F_PRD_CATEGORY_NO             = $request->category;
            $sub_category->NAME                          = $request->name;
            //$sub_category->CODE                          = $request->code;
            $sub_category->save();

        } catch (\Exception $e) {

            DB::rollback();
            return $this->formatResponse(false, $e, 'admin.sub_category.list');
        }
        DB::commit();

        return $this->formatResponse(true, 'Sub Category has been created successfully !', 'admin.sub_category.list');
    }

    public function findOrThrowException($id)
    {
        $data = $this->sub_category->where('PK_NO', '=', $id)->first();
        // dd($data);

        if (!empty($data)) {
            return $this->formatResponse(true, '', 'admin.sub_category.edit', $data);
        }

        return $this->formatResponse(false, 'Did not found data !', 'admin.sub_category.list', null);
    }


    public function postUpdate($request, $id)
    {
        DB::beginTransaction();

        try {

            $sub_category = $this->sub_category->where('PK_NO', $id)->first();

            $sub_category->where('PK_NO', $id)->update(
                [
                    'F_PRD_CATEGORY_NO'     => $request->category,
                    'NAME'                  => $request->name
                ]
            );

        } catch (\Exception $e) {
            DB::rollback();

            return $this->formatResponse(false, 'Unable to update Sub Category !', 'admin.sub_category.list');
        }

        DB::commit();

        return $this->formatResponse(true, 'Sub Category has been updated successfully !', 'admin.sub_category.list');
    }

    public function delete($id)
    {
        DB::begintransaction();
        try {
            $sub_category = $this->sub_category->find($id);
            $sub_category->is_active = 0;
            $sub_category->update();
           
        } catch (\Exception $e) {
            DB::rollback();

            return $this->formatResponse(false, 'Unable to delete this action !', 'admin.sub_category.list');
        }

        DB::commit();

        return $this->formatResponse(true, 'Successfully delete this action !', 'admin.sub_category.list');
    }




}
