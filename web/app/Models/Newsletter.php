<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    protected $table = 'WEB_NEWSLETTER';
    protected $primaryKey = 'PK_NO';
    public $timestamps = false;
}
