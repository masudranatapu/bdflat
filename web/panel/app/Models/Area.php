<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table        = 'ss_areas';
    protected $primaryKey   = 'pk_no';

   
    protected $fillable = ['city_division', 'name'];


    public function city() {
        return $this->belongsTo('App\Models\City', 'city_pk_no');
    }

    public function division() {
        return $this->belongsTo('App\Models\Division', 'division_pk_no');
    }
   


}
