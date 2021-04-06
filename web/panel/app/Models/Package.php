<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Package extends Model
{

    protected $table        = 'ss_packages';
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






}
