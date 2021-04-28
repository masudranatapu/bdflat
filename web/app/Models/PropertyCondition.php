<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class PropertyCondition extends Model
{
    protected $table        = 'PRD_PROPERTY_CONDITION';
    protected $primaryKey   = 'PK_NO';
    protected $fillable     = ['PROD_CONDITION'];
}
