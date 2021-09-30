<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CustomerTxn extends Model
{
    protected $table = 'ACC_CUSTOMER_TRANSACTION';
    protected $primaryKey = 'PK_NO';
    const CREATED_AT = 'SS_CREATED_ON';
    const UPDATED_AT = 'SS_MODIFIED_ON';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->F_SS_CREATED_BY = Auth::id();
        });

        static::updating(function ($model) {
            $model->F_SS_MODIFIED_BY = Auth::id();
        });
    }

    public function payment(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\CustomerPayment', 'F_CUSTOMER_PAYMENT_NO', 'PK_NO');
    }

    public function getTxnHistory($userID = null)
    {
        if (!$userID) {
            $userID = Auth::id();
        }

        return CustomerTxn::with(['payment'])
            ->where('F_CUSTOMER_NO', '=', $userID)
            ->paginate(10);


    }
}
