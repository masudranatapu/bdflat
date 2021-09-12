<?php

namespace App\Models;

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

    public function getProperties($userID = null)
    {
        if (!$userID) {
            $userID = Auth::id();
        }

        return SuggestedProperty::with(['listing'])
            ->where('F_USER_NO', '=', $userID)
            ->orderByDesc('ORDER_ID')
            ->get();
    }
}
