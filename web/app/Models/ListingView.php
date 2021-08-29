<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListingView extends Model
{
    protected $table = 'PRD_LISTING_VIEW';
    protected $primaryKey = 'PK_NO';
    public $timestamps = false;
    protected $fillable = ['DATE', 'COUNTER'];
}
