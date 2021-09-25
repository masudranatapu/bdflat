<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

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

    public function getRefundRequest($request){
        $data = DB::table('ACC_CUSTOMER_REFUND')
        ->select('ACC_CUSTOMER_REFUND.*', 'WEB_USER.CODE as USER_CODE', 'WEB_USER.NAME as USER_NAME', 'WEB_USER.MOBILE_NO as USER_MOBILE_NO','ACC_CUSTOMER_TRANSACTION.CODE as TID')
        ->leftJoin('WEB_USER','WEB_USER.PK_NO','ACC_CUSTOMER_REFUND.F_USER_NO')
        ->leftJoin('ACC_CUSTOMER_TRANSACTION','ACC_CUSTOMER_TRANSACTION.F_LISTING_LEAD_PAYMENT_NO','ACC_CUSTOMER_REFUND.F_LISTING_LEAD_PAYMENT_NO')
        ->paginate(10);

        return $data;
    }

    public function getTransactions($date_from = null, $date_to = null, $type = 'all')
    {
        $data = DB::table('ACC_CUSTOMER_TRANSACTION')
        ->select('ACC_CUSTOMER_TRANSACTION.CODE','WEB_USER.CODE AS CUSTOMER_NO','ACC_CUSTOMER_TRANSACTION.TRANSACTION_DATE','ACC_CUSTOMER_TRANSACTION.TRANSACTION_TYPE','ACC_CUSTOMER_TRANSACTION.AMOUNT','ACC_CUSTOMER_TRANSACTION.IN_OUT')
        ->leftJoin('WEB_USER','WEB_USER.PK_NO','ACC_CUSTOMER_TRANSACTION.F_CUSTOMER_NO');

        // $transactions = PaymentCustomer::with(['customer' => function ($query) {
        //     $query->select('CODE');
        // }])->take($limit);
        // if ($date_from) {
        //     $transactions->whereDate('PAYMENT_DATE', '>=', date('Y-m-d', strtotime($date_from)));
        // }
        // if ($date_to) {
        //     $transactions->whereDate('PAYMENT_DATE', '<=', date('Y-m-d', strtotime($date_to)));
        // }

        return $data->orderBy('ACC_CUSTOMER_TRANSACTION.PK_NO','DESC')->get();
    }
}
