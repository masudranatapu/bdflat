<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageCategory extends Model
{
    protected $table = 'WEB_PAGE_CATEGORY';
    protected $primaryKey = 'PK_NO';
    const CREATED_AT = 'CREATED_ON';
    const UPDATED_AT = 'MODIFIED_ON';

    public function pages(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\Page', 'F_PAGE_CATEGORY_NO', 'PK_NO');
    }

    public function getPageCategories($type, $limit = 6)
    {
        return PageCategory::with(['pages' => function ($query) {
            $query->where('IS_BOTTOM_VIEW', '=', 1);
        }])
            ->where('PROPERTY_FOR', '=', $type)
            ->where('IS_ACTIVE', '=', 1)
            ->orderByDesc('ORDER_ID')
            ->take($limit)
            ->get();
    }
}
