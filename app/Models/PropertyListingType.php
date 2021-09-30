<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class PropertyListingType extends Model
{
    protected $table        = 'PRD_LISTING_TYPE';
    protected $primaryKey   = 'PK_NO';
    protected $fillable     = ['NAME'];
}
