<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class WebAds extends Model
{
    protected $table = 'PRD_ADS';
    protected $primaryKey = 'PK_NO';
    const CREATED_AT = 'CREATED_AT';
    const UPDATED_AT = 'MODIFIED_AT';

    public function images(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\WebAdsImage', 'F_ADS_NO', 'PK_NO')
            ->orderByDesc('ORDER_ID');
    }

    public function getRandomAd($position_id)
    {
        return WebAds::with(['images'])
            ->where('F_AD_POSITION_NO', '=', $position_id)
            ->where('STATUS', '=', 1)
            ->whereDate('AVAILABLE_FROM', '<=', DB::raw('CURRENT_DATE()'))
            ->whereDate('AVAILABLE_TO', '>=', DB::raw('CURRENT_DATE()'))
            ->inRandomOrder()
            ->first();
    }
}
