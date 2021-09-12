<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrowsedProperty extends Model
{
    protected $table = 'PRD_BROWSING_HISTORY';
    protected $primaryKey = 'PK_NO';
    public $timestamps = false;

    public function listing(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\Listings', 'F_LISTING_NO', 'PK_NO');
    }
}
