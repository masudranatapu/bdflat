<?php
namespace App\Repositories\Admin\Category;

use App\Models\Category;
use App\Models\SubCategory;
use App\Traits\RepoResponse;
use DB;


class CategoryAbstract implements CategoryInterface
{
    use RepoResponse;

    protected $category;
    protected $subcategory;

    public function __construct(Category $category, SubCategory $subcategory)
    {
        $this->category     = $category;
        $this->subcategory  = $subcategory;
    }

    public function getPaginatedList($request, int $per_page = 2000)
    {
        $data = $this->category->where(['is_active' => 1, 'parent_id' => 0])->orderBy('order_id', 'ASC')->paginate($per_page);
        
        $data = $this->categoryImgPath($data,'get');
        
        return $this->formatResponse(true, '', 'product.category.list', $data);
    }

    public function categoryImgPath($data, $type)
    {

        if ($type == 'get') {
            if ($data->count() > 0 ){
            foreach ($data as $key => $value) {
                if($value->logo){
                   $value->logo_path = asset('/../../public/uploads/category').'/'.$value->pk_no.'/'.$value->logo; 
               }else{
                $value->logo_path = asset('/images').'/no_img.png';
               }
                
                if ($value->icon) {
                   $value->icon_path = asset('/../../public/uploads/category').'/'.$value->pk_no.'/'.$value->icon;
                }else{
                    $value->icon_path = asset('/images').'/no_img.png';
                }

                if ($value->banner) {
                     $value->banner_path = asset('/../../public/uploads/category').'/'.$value->pk_no.'/'.$value->banner;
                }else{
                     $value->banner_path = asset('/images').'/no_img.png';
                }
            }
                
               
            }
        }else{
             if($data->logo){
                $data->logo_path = asset('/../../public/uploads/category').'/'.$data->pk_no.'/'.$data->logo; 
            }else{
             $data->logo_path = asset('/images').'/no_img.png';
            }
             
             if ($data->icon) {
                $data->icon_path = asset('/../../public/uploads/category').'/'.$data->pk_no.'/'.$data->icon;
             }else{
                 $data->icon_path = asset('/images').'/no_img.png';
             }

             if ($data->banner) {
                  $data->banner_path = asset('/../../public/uploads/category').'/'.$data->pk_no.'/'.$data->banner;
             }else{
                  $data->banner_path = asset('/images').'/no_img.png';
             }
        }

        return $data;
    }


    public function postStore($request)
    {
        $update_logo = null;
        $update_icon = null;
        $update_banner  = null;
        
        DB::beginTransaction();

        try {
            $category                  = new Category();
            $category->name            = $request->name;
            $category->parent_id       = $request->parent ?? 0;
            $category->url_slug        = $this->urlSlug($request->name);
            $category->description     = $request->description;
            $category->seo_des         = $request->seo_des;
            $category->is_top          = $request->is_top ? 1 : 0;
            $category->is_new          = $request->is_new ? 1 : 0;
            $category->is_feature      = $request->is_feature ? 1 : 0;
            $category->save();
            
            if ($request->file('logo')) {
                $logo       = $request->file('logo');
                $logo_name  = 'category_log'.'_' .uniqid(). '.' . $logo->getClientOriginalExtension();
                $update_logo = $logo_name;
                
                $logo->move(public_path().'/../../public/uploads/category/'.$category->pk_no.'/', $logo_name);
            }
            if ($request->file('icon')) {
                $icon       = $request->file('icon');
                $icon_name  = 'category_log'.'_' .uniqid(). '.' . $icon->getClientOriginalExtension();
                $update_icon = $icon_name;
                
                $icon->move(public_path().'/../../public/uploads/category/'.$category->pk_no.'/', $icon_name);
            }
            if ($request->file('banner')) {
                $banner       = $request->file('banner');
                $banner_name  = 'category_log'.'_' .uniqid(). '.' . $banner->getClientOriginalExtension();
                $update_banner = $banner_name;
                
                $banner->move(public_path().'/../../public/uploads/category/'.$category->pk_no.'/', $banner_name);
            }

            $category           = Category::find($category->pk_no);
            $category->logo     = $update_logo;
            $category->icon     = $update_icon;
            $category->banner   = $update_banner;
            $category->update();

            

        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            return $this->formatResponse(false, 'Category not created successfully !', 'product.category.list');
        }
        DB::commit();

        return $this->formatResponse(true, 'Category has been created successfully !', 'product.category.list');
    }

    public function findOrThrowException($id)
    {
        $data = $this->category->where('PK_NO', '=', $id)->first();

        if (!empty($data)) {
            $data = $this->categoryImgPath($data,'first');
            // dd($data);
            return $this->formatResponse(true, '', 'admin.category.edit', $data);
        }

        return $this->formatResponse(false, 'Did not found data !', 'admin.category.list', null);
    }


    public function postUpdate($request, $id)
    {

        DB::beginTransaction();

        try {

            $category = Category::find($id);
            $category->name            = $request->name;
            $category->description     = $request->description;
            $category->seo_des         = $request->seo_des;
            $category->is_top          = $request->is_top ? 1 : 0;
            $category->is_new          = $request->is_new ? 1 : 0;
            $category->is_feature      = $request->is_feature ? 1 : 0;
            $category->order_id        = $request->order_id;
            
            if ($request->file('logo')) {
                $logo       = $request->file('logo');
                $logo_name  = 'category_log'.'_' .uniqid(). '.' . $logo->getClientOriginalExtension();
                $update_logo = $logo_name;
                
                $logo->move(public_path().'/../../public/uploads/category/'.$category->pk_no.'/', $logo_name);
                $category->logo     = $update_logo;
            }
            if ($request->file('icon')) {
                $icon       = $request->file('icon');
                $icon_name  = 'category_log'.'_' .uniqid(). '.' . $icon->getClientOriginalExtension();
                $update_icon = $icon_name;
                $category->icon     = $update_icon;
                
                $icon->move(public_path().'/../../public/uploads/category/'.$category->pk_no.'/', $icon_name);
            }
            if ($request->file('banner')) {
                $banner       = $request->file('banner');
                $banner_name  = 'category_log'.'_' .uniqid(). '.' . $banner->getClientOriginalExtension();
                $update_banner = $banner_name;
                $category->banner   = $update_banner;
                $banner->move(public_path().'/../../public/uploads/category/'.$category->pk_no.'/', $banner_name);
            }

            $category->update();


        } catch (\Exception $e) {
            DB::rollback();

            return $this->formatResponse(false, 'Unable to update Category !', 'product.category.list');
        }

        DB::commit();

        return $this->formatResponse(true, 'Category has been updated successfully !', 'product.category.list');
    }

    public function delete($id)
    {
        DB::begintransaction();
        try {
            $category = Category::find($id);
            $category->is_active = 0;
            $category->update();

        } catch (\Exception $e) {
            DB::rollback();

            return $this->formatResponse(false, 'Unable to delete this category !', 'product.category.list');
        }
        DB::commit();

        return $this->formatResponse(true, 'Successfully delete this category !', 'product.category.list');
    }






}
