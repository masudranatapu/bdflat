<?php

namespace App\Models;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class RefundRequest extends Model
{
    protected $table 		= 'REFUND_REQUEST_REASON';
    protected $primaryKey   = 'PK_NO';
    public $timestamps      = false;
}
