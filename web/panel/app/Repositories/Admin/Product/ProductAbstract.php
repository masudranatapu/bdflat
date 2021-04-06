<?php
namespace App\Repositories\Admin\Product;

use App\Models\Product as Product;
use App\Traits\RepoResponse;
use App\Repositories\Admin\Auth\AuthAbstract;
use App\Models\Auth;
use App\Models\AdminUser as User;
use App\Models\AuthRole;
use App\Models\ProductVariant;
use App\Models\ProdImgLib;
use App\Models\UserGroup;
use DB;
use File;
use Auth as MyInfo;

class ProductAbstract implements ProductInterface
{
    use RepoResponse;

    protected $user;
    protected $auth;
    protected $auth_role;

    public function __construct(User $user, AuthRole $auth_role, AuthAbstract $auth)
    {
        $this->user = $user;
        $this->auth = $auth;
        $this->auth_role = $auth_role;
    }

    public function getPaginatedList($request)
    {
    

        if($request->ad_promotion_type == 'Top'){
            $data = Product::where('promotion', 'Top')->orderBy('is_active','asc')->get();
        }elseif($request->ad_promotion_type == 'Feature'){
            $data = Product::where('promotion', 'Feature')->orderBy('is_active','asc')->get();
        }elseif($request->ad_promotion_type == 'Urgent'){
            $data = Product::where('promotion', 'Urgent')->orderBy('is_active','asc')->get();
        }elseif($request->ad_promotion_type == 'Basic'){
            $data = Product::where('promotion', 'Basic')->orderBy('is_active','asc')->get();
        }else{
            $data = Product::orderBy('is_active','asc')->get();
        }
        
        return $this->formatResponse(true, '', 'admin', $data);
    }

    public function postStore($request)
    {   
          
    }




    public function postUpdate($request, int $id)
    {   
        

        DB::beginTransaction();
        try{

            $product = Product::find($id);

            $check  = Product::where('pk_no', '!=', $id)->where('url_slug',$request->url_slug)->first();

            if(!empty($check)){
                 return $this->formatResponse(false, 'Url slug already existed in the product list !', 'admin.product.list');
            }

        if($request->submit_btn == 'rejected'){
            $product->comments            = $request->rejected_reason;
            $product->is_active           = 2;
        }else{
            $product->is_active           = 1;
        }
        $product->url_slug            = $request->url_slug;
        $product->promotion           = $request->promotion;
        $product->approved_by         = MyInfo::user()->id;
        $product->approved_at         = date('Y-m-d H:i:s');
        $product->update();

        } catch (\Exception $e) {
        
            DB::rollback();
            return $this->formatResponse(false, 'Unable to update product !', 'admin.product.list');

        }
        DB::commit();

        return $this->formatResponse(true, 'Product updated successfully !', 'admin.product.list');
    }

    public function getShow(int $id)
    {

        $data =  Product::find($id);

        if (!empty($data)) {
            return $this->formatResponse(true, '', 'admin.product.edit', $data);
        }

        return $this->formatResponse(false, 'Did not found data !', 'admin.product.list', null);
    }
    /*

    public function postUrlSlugUpdate($request)
    {
        
        DB::beginTransaction();

        try {
            $product = Product::find($request->prod_pk_no);

            $check  = Product::where('pk_no', '!=', $product->pk_no)->where('url_slug',$request->q)->first();
            if(!empty($check)){
                 return $this->formatResponse(false, 'Url slug already existed in the product list !', 'admin.product.list');
            }

            $product->url_slug = $request->q;
            $product->update();

        } catch (\Exception $e) {
            

            DB::rollback();
            return $this->formatResponse(false, 'Unable to update url slug !', 'admin.product.list');

        }
        DB::commit();

        return $this->formatResponse(true, 'Url slug updated successfully !', 'admin.product.list');
    } 
    */

    public function delete(int $id)
    {

    }
    
    public function getSearchList($request)
    {
       
    }


    public function deleteImage(int $id)
    {
        
    }



    public function postStoreProductVariant($request)
    {   
        
    }


    public function postUpdateProductVariant($request, int $id)
    {   
        
    }




}
