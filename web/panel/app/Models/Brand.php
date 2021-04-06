<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Brand extends Model
{

    protected $table        = 'prd_brand';
    protected $primaryKey   = 'pk_no';


    public static function boot()
        {
           parent::boot();
           static::creating(function($model)
           {
               $user = Auth::user();
               $model->created_by = $user->id;
           });

           static::updating(function($model)
           {
               $user = Auth::user();
               $model->updated_by = $user->id;
           });
       }



    public function getBrandCombo($category_id = null){
        if($category_id != null ){
          $brand = Brand::where(['is_delete' => 0, 'cat_pk_no' => $category_id])->get();
        }else{
          $brand = Brand::where('is_delete',0)->get();
        }
        
        $response = [];
        if (!empty($brand)) {
            foreach ($brand as $key => $value) {

                $response[$value->pk_no] = $value->name;
            }
        }
        return $response;
    }


    public function getBrandBySubCat($sub_cat_id, $type = null)
    {

        $data = Brand::where('scat_pk_no',$sub_cat_id)->get();
          $response = null;

          if ($type == 'list') {
              $response = [];
              if ($data) {
                  foreach ($data as $key => $value) {
                      $response[$value->pk_no] = $value->name;
                  }
              }

          }else{
              $response = '';
              if ($data && count($data) > 0) {
                $response .= '<option value="">-- select brand --</option>';
                  foreach ($data as $value) {
                      $response .= '<option value="'.$value->pk_no.'">'.$value->name.'</option>';
                  }
              }else{
                  $response .= '<option value="">No data found</option>';
              }
          }


          return $response;
    }
    

    public function category() {
        return $this->belongsTo('App\Models\Category', 'cat_pk_no');
    }

    public function subcategory() {
        return $this->belongsTo('App\Models\Category', 'scat_pk_no');
    }


    public function productModel() {
        return $this->hasMany('App\Models\ProductModel', 'F_PRD_BRAND_NO')->orderBy('NAME','ASC');
    }

    public function productColor() {
        return $this->hasMany('App\Models\Color', 'F_BRAND')->orderBy('NAME','ASC');
    }
    public function productSize() {
        return $this->hasMany('App\Models\ProductSize', 'F_BRAND_NO')->orderBy('NAME','ASC');
    }







}
