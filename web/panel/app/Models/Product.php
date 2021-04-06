<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Product extends Model
{
    protected $table        = 'prd_master';
    protected $primaryKey   = 'pk_no';
    public $timestamps      = false;
    // const CREATED_AT     = 'create_dttm';
    // const UPDATED_AT     = 'update_dttm';


    protected $fillable = ['ad_title'];

    
    public function category() {
        return $this->belongsTo('App\Models\Category', 'f_cat_pk_no');
    }

    public function subcategory() {
        return $this->belongsTo('App\Models\Category', 'f_scat_pk_no');
    }
    public function customer() {
        return $this->belongsTo('App\Models\Customer', 'customer_pk_no');
    }

    public function area() {
        return $this->belongsTo('App\Models\Area', 'area_id');
    }

    public function city() {
        return $this->belongsTo('App\Models\City', 'pk_no');
    }

   

    public function allPhotos() {
        return $this->hasMany('App\Models\ProductImg', 'f_prd_master_no')->orderBy('serial_no','asc');
    }


    public function allReports() {
        return $this->hasMany('App\Models\Report', 'prod_pk_no');
    }

    
    

    
}
