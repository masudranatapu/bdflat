<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; 
use Auth;

class Promotion extends Model
{
    protected $table 		= 'sls_promotions';
    protected $primaryKey   = 'pk_no'; 
    protected $fillable 	= ['name', 'title'];

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

    
    public function allPromotions() {
        return $this->hasMany('App\Models\ProductImg', 'f_prd_master_no')->orderBy('serial_no','asc');
    }
}
