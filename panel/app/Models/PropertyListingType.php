<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class PropertyListingType extends Model
{
    protected $table        = 'PRD_LISTING_TYPE';
    protected $primaryKey   = 'PK_NO';
    protected $fillable     = ['NAME'];

    public function getPropertyListingType()
    {
        return $data = PropertyListingType::where('IS_ACTIVE', 1)->pluck('NAME', 'PK_NO');
    }
}
