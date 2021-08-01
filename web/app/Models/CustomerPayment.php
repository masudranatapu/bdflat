<?php

namespace App\Models;

use App\Traits\RepoResponse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomerPayment extends Model
{
    use RepoResponse;

    protected $table = 'ACC_CUSTOMER_PAYMENTS';
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

    public function customer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\User', 'F_CUSTOMER_NO', 'PK_NO');
    }

    public function getPayments($userId)
    {
        return CustomerPayment::with('customer')
            ->where('F_CUSTOMER_NO', '=', $userId)
            ->get();
    }

    public function getPayment($id)
    {
        return CustomerPayment::with('customer')
            ->find($id);
    }

    public function storePayment(Request $request): object
    {
        $status = false;
        $msg = 'Payment unsuccessful !';
        $payment = null;

        DB::beginTransaction();
        try {
            $payment = new CustomerPayment();
            $payment->F_CUSTOMER_NO = Auth::id();
            $payment->AMOUNT = $request->amount;
            $payment->F_ACC_PAYMENT_BANK_NO = 1; // SSL PK_NO
            $payment->PAYMENT_CONFIRMED_STATUS = 0; // NOT CONFIRMED
            $payment->PAYMENT_DATE = date('Y-m-d H:i:s');
            $payment->IS_COD = 0;
            $payment->save();

            $status = true;
            $msg = 'Payment successful !';
        } catch (\Exception $e) {
            DB::rollBack();
        }

        DB::commit();
        return $this->formatResponse($status, $msg, 'recharge-balance', $payment);
    }
}
