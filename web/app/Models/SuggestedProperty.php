<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class SuggestedProperty extends Model
{
    protected $table = 'PRD_SUGGESTED_PROPERTY';
    protected $primaryKey = 'PK_NO';
    const CREATED_AT = 'CREATED_AT';
    const UPDATED_AT = 'MODIFYED_AT';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->CREATED_BY = Auth::id();
        });

        static::updating(function ($model) {
            $model->MODIFYED_BY = Auth::id();
        });
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo('App\Models\Owner', 'F_COMPANY_NO', 'PK_NO');
    }

    public function seeker(): BelongsTo
    {
        return $this->belongsTo('App\Models\Owner', 'F_USER_NO', 'PK_NO')
            ->where('USER_TYPE', '=', 1);
    }

    public function listing(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne('App\Models\Listings', 'PK_NO', 'F_LISTING_NO');
    }

    public function getProperties($request)
    {

        $userID = Auth::id();

        return SuggestedProperty::select('PRD_LISTINGS.PK_NO', 'PRD_LISTINGS.URL_SLUG','PRD_LISTINGS.TITLE', 'PRD_LISTINGS.IS_VERIFIED','PRD_LISTINGS.IS_TOP','PRD_LISTINGS.CI_PRICE','PRD_LISTINGS.AREA_NAME','PRD_LISTINGS.CITY_NAME','PRD_LISTING_IMAGES.IMAGE_PATH','PRD_LISTING_VARIANTS.PROPERTY_SIZE','PRD_LISTING_VARIANTS.BEDROOM','PRD_LISTING_VARIANTS.TOTAL_PRICE','PRD_LISTING_VARIANTS.BATHROOM')
        ->leftJoin('PRD_LISTINGS', 'PRD_LISTINGS.PK_NO', 'PRD_SUGGESTED_PROPERTY.F_LISTING_NO')
        ->leftJoin('PRD_LISTING_IMAGES', function($join)
         {
             $join->on('PRD_LISTINGS.PK_NO', '=', 'PRD_LISTING_IMAGES.F_LISTING_NO');
             $join->on('PRD_LISTING_IMAGES.IS_DEFAULT','=',DB::raw("'1'"));

         })
         ->leftJoin('PRD_LISTING_VARIANTS', function($join)
         {
             $join->on('PRD_LISTINGS.PK_NO', '=', 'PRD_LISTING_VARIANTS.F_LISTING_NO');
             $join->on('PRD_LISTING_VARIANTS.IS_DEFAULT','=',DB::raw("'1'"));

         })

        ->where('PRD_SUGGESTED_PROPERTY.F_USER_NO', '=', $userID)
        ->orderByDesc('ORDER_ID')
        ->paginate(10);
    }
}
