<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListingPayment extends Model
{
    public $timestamps      = false;
    protected $table        = 'ACC_LISTING_PAYMENTS';
    protected $primaryKey   = 'PK_NO';
    protected $fillable     = ['F_LISTING_NO', 'F_USER_NO', 'AMOUNT'];

}
