<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; 
use Auth;

class PromotionDetails extends Model
{
    protected $table 		= 'sls_promotion_details';
    protected $primaryKey   = 'pk_no'; 
    protected $fillable 	= ['day_limit', 'price'];

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


    public function promotion(){
       return $this->hasOne('App\Models\Promotion', 'pk_no', 'f_promotion_pk_no');
    }



    
    
}
