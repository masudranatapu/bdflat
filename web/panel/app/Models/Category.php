<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Category extends Model
{
    protected $table        = 'prd_category';
    protected $primaryKey   = 'pk_no';
    protected $fillable     = ['name'];

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


    public function getCategorCombo(){

    	$data = Category::get();
    	$response = [];
    	if ($data) {
    		foreach ($data as $key => $value) {
    			$response[$value->pk_no] = $value->name;
    		}
    	}
    	return $response;
    }

    public function getChildCategorCombo($parent_id = null, $type = null)
    {

      $response = '';
      $data = Category::where('is_active',1);

      if ($parent_id != null){
        $data->where('parent_id', $parent_id);
      }else{
        $data->where('parent_id', '!=', 0);
      }

      

      if($type == 'ajax')
      {
        $data = $data->select('pk_no','name')->orderBy('order_id','ASC')->get();
        $response = '';
        if ($data && $data->count() > 0 ) {
          $response .= '<option value="">-- select subcategory --</option>';
            foreach ($data as $value) {
                $response .= '<option value="'.$value->pk_no.'">'.$value->name.'</option>';
            }
        }else{
            $response .= '<option value="">No data found</option>';
        } 
      }else{

        $response = $data->orderBy('order_id','ASC')->pluck('name','pk_no');
      }


      return $response;

    }

    public function getParentCategorCombo(){

        return Category::where(['parent_id' => 0, 'is_active' => 1])->orderBy('order_id','ASC')->pluck('name','pk_no');
        
    }

    public function category() {
        return $this->belongsTo('App\Models\Category', 'f_cat_pk_no');
    }

    public function subcategory() {
        return $this->belongsTo('App\Models\Category', 'f_scat_pk_no');
    }

    public function area() {
        return $this->belongsTo('App\Models\Area', 'area_id');
    }

    public function jobInfo() {
        return $this->hasOne('App\Models\JobPreference', 'prod_pk_no');
    }

    // public function user() {
    //     return $this->belongsTo('App\Models\User', 'user_pk_no');
    // }

    public function allPhotos() {
        return $this->hasMany('App\Models\ProductImg', 'f_prd_master_no')->orderBy('serial_no','asc');
    }




   



    
}
