<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
class PropertyCategory extends Model
{
    protected $table        = 'PRD_PROPERTY_TYPE';
    protected $primaryKey   = 'PK_NO';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'CODE', 'NAME'
    ];

    public static function boot()
        {
           parent::boot();
           static::creating(function($model)
           {
               $user = Auth::user();
               $model->F_SS_CREATED_BY = $user->PK_NO;
           });

           static::updating(function($model)
           {
               $user = Auth::user();
               $model->F_SS_MODIFIED_BY = $user->PK_NO;
           });
       }


}
