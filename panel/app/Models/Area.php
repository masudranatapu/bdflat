<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table        = 'SS_AREA';
    protected $primaryKey   = 'PK_NO';

    public function getArea($id)
    {
        return Area::where('F_CITY_NO',$id)->pluck('AREA_NAME', 'PK_NO');
    }






}
