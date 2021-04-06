<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;

class Category extends Model
{
    protected $table        = 'prd_category';
    protected $primaryKey   = 'pk_no';
    protected $fillable     = ['name'];



    public function getCategorCombo()
    {
        $data = Category::get();
        $response = [];
        if ($data) {
            foreach ($data as $key => $value) {
                $response[$value->pk_no] = $value->name;
            }
        }
     
     return $response;
 }

 public function parentCategory() {
   return $this->belongsTo('App\Category', 'parent_id');
 }

public function getChildCategorCombo()
    {  
        $data = Category::where('parent_id','=!', 0)->where('is_delete',0)->get();
        $response = [];
        if ($data) {
            foreach ($data as $key => $value) {
                $response[$value->pk_no] = $value->name;
            }
        }
        return $response;
    }

    public function getParentCategorCombo()
    {

        return Category::where('parent_id', 0)->pluck('name','pk_no');

    }

    public function getTopCategory($limit)
    {
        $data = Category::where(['is_delete' =>  0, 'is_active' => 1])->where('parent_id', '=', 0)->where('is_top',1)->orderBy('is_highlight','desc')->orderBy('order_id','ASC')->limit($limit)->get();
        return $data = $this->getImg($data); 
    }


    public function getCategory()
    {
        $data = Category::where(['is_delete' =>  0, 'is_active' => 1, 'parent_id' => 0])->orderBy('order_id','ASC')->get();
        return $data = $this->getImg($data); 
       
    }

    public function getImg($data)
    {
        if($data){
            foreach ($data as $key => $value) {
                if($value->icon){
                    $value->icon_src = asset('/uploads/category/'.$value->pk_no.'/'.$value->icon);
                }else{
                    $value->icon_src = asset('/assets/img/no_img.png');
                }
                
            }
        }
        
        return $data;
    }

    public function getAllSubCategory()
    {
        return Category::where(['is_delete' =>  0, 'is_active' => 1])->where('parent_id', '!=', 0)->orderBy('order_id','ASC')->get();
    }


    public function getSubCategoryInfo($subcat_ulr_slug)
    {
        return DB::table('prd_category as c')->select( 'c.pk_no', 'c.parent_id', 'c.code', 'c.name', 'c.url_slug', 'c.name_bn', 'c.description', 'c.seo_des', 'c.logo', 'c.icon', 'c.banner', 'c.is_top', 'c.is_new', 'c.is_feature', 'c.hs_prefix', 'c.comments', 'c.is_active', 'c.is_delete', 'c.total_post', 'c.active_post', 'c.order_id', 'c.created_by', 'c.created_at', 'c.updated_by', 'c.updated_at','p_c.pk_no as parent_pk_no', 'p_c.parent_id as parent_parent_id', 'p_c.code as parent_code', 'p_c.name as parent_name', 'p_c.url_slug as parent_url_slug', 'p_c.name_bn as parent_name_bn', 'p_c.description as parent_description', 'p_c.seo_des as parent_seo_des', 'p_c.logo as parent_logo', 'p_c.icon as parent_icon', 'p_c.banner as parent_banner', 'p_c.is_top as parent_is_top', 'p_c.is_new as parent_is_new', 'p_c.is_feature as parent_is_feature', 'p_c.hs_prefix as parent_hs_prefix', 'p_c.comments as parent_comments', 'p_c.is_active as parent_is_active', 'p_c.is_delete as parent_is_delete', 'p_c.total_post as parent_total_post', 'p_c.active_post as parent_active_post', 'p_c.order_id as parent_order_id', 'p_c.created_by as parent_created_by', 'p_c.created_at as parent_created_at', 'p_c.updated_by as parent_updated_by', 'p_c.updated_at as parent_updated_at')->where('c.url_slug',$subcat_ulr_slug)->join('prd_category as p_c', 'p_c.pk_no', '=', 'c.parent_id')->where('c.parent_id', '!=',0)->first();
    }









}
