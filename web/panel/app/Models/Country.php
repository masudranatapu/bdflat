<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    protected $table 		= 'ss_country';
    protected $primaryKey   = 'pk_no';

    public function getCountryCombo(){
        return Country::orderBy('order_id','ASC')->pluck('name', 'pk_no');
    }
    
}
