<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Auth;
class Division extends Model
{

    protected $table        = 'ss_divisions';
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


  public function country() {
      return $this->belongsTo('App\Models\Country', 'country_pk_no');
  }

  public function getDivisionCombo(){

    $data = Division::where('is_active',1)->orderBy('order_id','asc')->get();
    $response = [];
    if ($data) {
      foreach ($data as $key => $value) {
        $response[$value->pk_no] = $value->name;
      }
    }
    return $response;
  }




}
