<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListingVariants extends Model
{
    protected $table = 'PRD_LISTING_VARIANTS';
    protected $primaryKey = 'PK_NO';
    protected $fillable = ['F_LISTING_NO', 'PROPERTY_SIZE', 'BEDROOM', 'BATHROOM','TOTAL_PRICE'];
}
