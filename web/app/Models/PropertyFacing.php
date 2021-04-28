<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class PropertyFacing extends Model
{
    protected $table        = 'PRD_PROPERTY_FACING';
    protected $primaryKey   = 'PK_NO';
    protected $fillable     = ['TITLE'];
}
