<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class ProductType extends Model
{

    protected $table 		= 'prd_type';
    protected $primaryKey   = 'pk_no';

    protected $fillable = ['name', 'url_slug'];

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

       public function category() {
           return $this->belongsTo('App\Models\Category', 'cat_pk_no', 'pk_no');
       }

       public function subcategory() {
           return $this->belongsTo('App\Models\Category', 'scat_pk_no', 'pk_no');
       }


}
