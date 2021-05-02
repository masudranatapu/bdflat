<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListingImages extends Model
{
    public $timestamps = false;
    protected $table = 'PRD_LISTING_IMAGES';
    protected $primaryKey = 'PK_NO';
    protected $fillable = ['F_LISTING_NO', 'IMAGE_PATH', 'IMAGE'];
}
