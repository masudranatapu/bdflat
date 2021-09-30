<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'WEB_SLIDER';
    protected $primaryKey = 'PK_NO';
    const CREATED_AT = 'CREATED_ON';
    const UPDATED_AT = 'MODIFIED_ON';

    public function getSliders()
    {
        return Slider::where('IS_ACTIVE', '=', 1)
            ->orderByDesc('ORDER_BY')
            ->get();
    }
}
