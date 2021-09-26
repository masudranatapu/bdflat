<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\RepoResponse;
use DB;

class PaymentMethod extends Model
{
    use RepoResponse;

    protected $table = 'ACC_PAYMENT_METHODS';
    protected $primaryKey = 'PK_NO';
    public $timestamps = false;
}
