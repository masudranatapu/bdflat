<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'SS_CITY';
    protected $primaryKey = 'PK_NO';
    public $timestamps = false;

    public function getCity()
    {
        return City::pluck('CITY_NAME', 'PK_NO');
    }
}
