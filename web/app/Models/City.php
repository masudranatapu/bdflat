<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'SS_CITY';
    protected $primaryKey = 'PK_NO';
    protected $fillable = ['CITY_NAME'];
    public $timestamps = false;

    public function getPopularCities()
    {
        return City::where('IS_ACTIVE', 1)
            ->where('IS_POPULATED', 1)
            ->get(['PK_NO', 'URL_SLUG', 'CITY_NAME', 'TOTAL_LISTING']);
    }
}
