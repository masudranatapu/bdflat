<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table        = 'SS_AREA';
    protected $primaryKey   = 'PK_NO';
    protected $fillable     = ['AREA_NAME'];
}
