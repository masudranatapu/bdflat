<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PaymentCustomer extends Model
{
    protected $table = 'ACC_CUSTOMER_PAYMENTS';

    protected $primaryKey   = 'PK_NO';
    const CREATED_AT        = 'SS_CREATED_ON';
    const UPDATED_AT        = 'SS_MODIFIED_ON';
    protected $fillable     = ['CODE', 'CUSTOMER_NAME'];

    private $user_id;
    public static function boot()
        {
           parent::boot();
           static::creating(function($model)
           {
               $user = Auth::user();
               $model->F_SS_CREATED_BY = $user->PK_NO ?? $model->getsetApiAuthId();
           });

           static::updating(function($model)
           {
               $user = Auth::user();
               $model->F_SS_MODIFIED_BY = $user->PK_NO ?? $model->getsetApiAuthId();
           });
       }

    public function setApiAuthId( $user_id )
    {
        $this->user_id = $user_id;
    }

    public function getsetApiAuthId()
    {
        return $this->user_id;
    }

    public function entryBy()
    {
        return $this->belongsTo('App\Models\Auth', 'F_SS_CREATED_BY');
    }


    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'F_CUSTOMER_NO');
    }

    public function bankTxn() {
        return $this->hasOne('App\Models\AccBankTxn', 'F_CUSTOMER_PAYMENT_NO', 'PK_NO');
    }

    public function allOrderPayments() {
        return $this->hasMany('App\Models\OrderPayment', 'F_ACC_CUSTOMER_PAYMENT_NO', 'PK_NO');
    }

    public function getTransactions($date_from = null, $date_to = null, $type = 'all', $limit = 2000)
    {
        $transactions = PaymentCustomer::with(['customer' => function ($query) {
            $query->select('CODE');
        }])->take($limit);
        if ($date_from) {
            $transactions->whereDate('PAYMENT_DATE', '>=', date('Y-m-d', strtotime($date_from)));
        }
        if ($date_to) {
            $transactions->whereDate('PAYMENT_DATE', '<=', date('Y-m-d', strtotime($date_to)));
        }
//        switch ($type) {
//            case 'listing_ad':
//                break;
//            case 'lead_purchase':
//                break;
//            case 'contact_view':
//                break;
//            case 'recharge':
//                break;
//            case 'commission':
//                break;
//            case 'refund':
//                break;
//            default:
//        }
        return $transactions->get();
    }
}
