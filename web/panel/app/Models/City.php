<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Models\Area;
class City extends Model
{

    protected $table        = 'ss_cities';
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

  public function getCityCombo(){

    $data = City::where('is_active',1)->orderBy('order_id','asc')->get();
    $response = [];
    if ($data) {
      foreach ($data as $key => $value) {
        $response[$value->pk_no] = $value->name;
      }
    }
    return $response;
  }


  public function getAreaByLocation($cityOrDivision, $cityOrDivisionId)
  {
    $data = array();
    if ($cityOrDivision == 'city') {
      $data = Area::where('city_pk_no',$cityOrDivisionId)->get();
    }
    if ($cityOrDivision == 'division') {
      $data = Area::where('division_pk_no',$cityOrDivisionId)->get();
    }

   
    $response = '';
    if (!empty($data->toArray()) ) {
        foreach ($data as $value) {
            $response .= '<option value="'.$value->pk_no.'">'.$value->name.'</option>';
        }
    }else{
        $response .= '<option value="">No data found</option>';
    }
    return $response;

  }




}
