<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    protected $table        = 'PRD_PROPERTY_TYPE';
    protected $primaryKey   = 'PK_NO';
    protected $fillable     = ['PROPERTY_TYPE'];

    public function getPropertyTypes()
    {
        return PropertyType::where('IS_ACTIVE', 1)
            ->orderByDesc('ORDER_ID')
            ->get();
    }
}
