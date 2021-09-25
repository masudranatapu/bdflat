<?php

namespace App\Models;

use App\Traits\RepoResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class PaymentCustomer extends Model
{
    use RepoResponse;
    protected $table = 'ACC_CUSTOMER_PAYMENTS';

    protected $primaryKey = 'PK_NO';
    const CREATED_AT = 'SS_CREATED_ON';
    const UPDATED_AT = 'SS_MODIFIED_ON';
    protected $fillable = ['CODE', 'CUSTOMER_NAME'];

    private $user_id;

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $user = Auth::user();
            $model->F_SS_CREATED_BY = $user->PK_NO ?? $model->getsetApiAuthId();
        });

        static::updating(function ($model) {
            $user = Auth::user();
            $model->F_SS_MODIFIED_BY = $user->PK_NO ?? $model->getsetApiAuthId();
        });
    }

    public function setApiAuthId($user_id)
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

    public function bankTxn()
    {
        return $this->hasOne('App\Models\AccBankTxn', 'F_CUSTOMER_PAYMENT_NO', 'PK_NO');
    }

    public function allOrderPayments()
    {
        return $this->hasMany('App\Models\OrderPayment', 'F_ACC_CUSTOMER_PAYMENT_NO', 'PK_NO');
    }

    public function getRefundRequest($request)
    {
        return DB::table('ACC_CUSTOMER_REFUND')
            ->select('ACC_CUSTOMER_REFUND.*', 'WEB_USER.CODE as USER_CODE', 'WEB_USER.NAME as USER_NAME', 'WEB_USER.MOBILE_NO as USER_MOBILE_NO', 'ACC_CUSTOMER_TRANSACTION.CODE as TID')
            ->leftJoin('WEB_USER', 'WEB_USER.PK_NO', 'ACC_CUSTOMER_REFUND.F_USER_NO')
            ->leftJoin('ACC_CUSTOMER_TRANSACTION', 'ACC_CUSTOMER_TRANSACTION.F_LISTING_LEAD_PAYMENT_NO', 'ACC_CUSTOMER_REFUND.F_LISTING_LEAD_PAYMENT_NO')
            ->paginate(10);
    }

    public function getRefund($id)
    {
        return RefundRequest::query()
            ->select('ACC_CUSTOMER_REFUND.*', 'L.TITLE', 'L.CODE AS PROPERTY_ID', 'U.NAME AS OWNER_NAME', 'LLP.PURCHASE_DATE')
            ->leftJoin('ACC_LISTING_LEAD_PAYMENTS AS LLP', 'LLP.PK_NO', '=', 'ACC_CUSTOMER_REFUND.F_LISTING_LEAD_PAYMENT_NO')
            ->leftJoin('PRD_LISTINGS AS L', 'L.PK_NO', '=', 'LLP.F_LISTING_NO')
            ->leftJoin('WEB_USER AS U', 'U.PK_NO', '=', 'L.F_USER_NO')
            ->find($id);
    }

    public function updateRefund(Request $request, $id): object
    {
        DB::beginTransaction();
        try {
            $refund = $this->getRefund($id);

            $refund->STATUS = $request->status;
//            $refund->NOTE = $request->note;
            $refund->save();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

        DB::commit();
        return $this->formatResponse(true, 'Refund request updated', 'admin.refund_request');
    }

    public function getTransactions($date_from = null, $date_to = null, $type = 'all')
    {
        $data = DB::table('ACC_CUSTOMER_TRANSACTION')
            ->select('ACC_CUSTOMER_TRANSACTION.CODE', 'WEB_USER.CODE AS CUSTOMER_NO', 'ACC_CUSTOMER_TRANSACTION.TRANSACTION_DATE', 'ACC_CUSTOMER_TRANSACTION.TRANSACTION_TYPE', 'ACC_CUSTOMER_TRANSACTION.AMOUNT', 'ACC_CUSTOMER_TRANSACTION.IN_OUT')
            ->leftJoin('WEB_USER', 'WEB_USER.PK_NO', 'ACC_CUSTOMER_TRANSACTION.F_CUSTOMER_NO');

        // $transactions = PaymentCustomer::with(['customer' => function ($query) {
        //     $query->select('CODE');
        // }])->take($limit);
        // if ($date_from) {
        //     $transactions->whereDate('PAYMENT_DATE', '>=', date('Y-m-d', strtotime($date_from)));
        // }
        // if ($date_to) {
        //     $transactions->whereDate('PAYMENT_DATE', '<=', date('Y-m-d', strtotime($date_to)));
        // }

        return $data->orderBy('ACC_CUSTOMER_TRANSACTION.PK_NO', 'DESC')->get();
    }
}
