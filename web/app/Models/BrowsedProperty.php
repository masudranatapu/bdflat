<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrowsedProperty extends Model
{
    protected $table = 'PRD_BROWSING_HISTORY';
    protected $primaryKey = 'PK_NO';
    public $timestamps = false;
}
