<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $table = 'WEB_USER';
    protected $primaryKey = 'PK_NO';
    const CREATED_AT = 'CREATED_AT';
    const UPDATED_AT = 'UPDATED_AT';

    public function info(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne('App\Models\OwnerInfo', 'F_USER_NO', 'PK_NO');
    }

    public function listings(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\Listings', 'F_USER_NO', 'PK_NO')
            ->with(['getDefaultThumb', 'getListingVariant']);
    }

    public function getFeatured($type, $limit = 12)
    {
        return Owner::with(['info'])
            ->where('USER_TYPE', '=', $type)
            ->where('IS_FEATURE', '=', 1)
            ->take($limit)
            ->get();
    }

    public function getOwner($slug)
    {
        return Owner::with(['info', 'listings' => function ($query) {
            $query->orderByDesc('PK_NO');
            $query->where('STATUS', '=', 10);
            $query->take(8);
        }])
//            ->where('URL_SLUG', '=', $slug) // Maybe later
            ->where('PK_NO', '=', $slug)
            ->first();
    }
}
