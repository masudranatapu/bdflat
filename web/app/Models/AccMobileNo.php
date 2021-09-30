<?php

namespace App\Models;

use App\Traits\RepoResponse;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AccMobileNo extends Model
{
    use RepoResponse;
    protected $table = 'ACC_MOBILE_NO';
    protected $primaryKey = 'PK_NO';
    public $timestamps = false;
}
