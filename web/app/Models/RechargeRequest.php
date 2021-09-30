<?php

namespace App\Models;

use App\Traits\RepoResponse;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RechargeRequest extends Model
{
    use RepoResponse;
    protected $table        = 'ACC_RECHARGE_REQUEST';
    protected $primaryKey   = 'PK_NO';
    public $timestamps      = false;

    public function getPaymentMethod()
    {
        return $this->hasOne('App\Models\PaymentMethod',  'PK_NO','F_ACC_PAYMENT_METHOD_NO');
    }



    public function postRechargeRequest($request)
    {
        DB::beginTransaction();
        try {
            $list = new RechargeRequest();
            $list->F_CUSTOMER_NO            = Auth::id();
            $list->AMOUNT                   = $request->amount;
            $list->F_ACC_PAYMENT_METHOD_NO  = $request->payment_method;
            if($request->payment_method == 1){
                $list->F_PAYMENT_BANK_ACC       = $request->bkash_no;
            }elseif($request->payment_method == 2){
                $list->F_PAYMENT_BANK_ACC       = $request->rocket_no;
            }
            $list->PAYMENT_NOTE             = $request->note;
            $list->SLIP_NUMBER              = $request->txn_id;
            $list->STATUS                   = 0;
            $list->PAYMENT_DATE             = Carbon::parse($request->recharge_date)->format('Y-m-d H:i:s');
            $list->F_SS_CREATED_BY          = Auth::id();
            $list->SS_CREATED_ON            = Carbon::now();
            $list->F_SS_MODIFIED_BY         = Auth::id();
            $list->SS_CREATED_ON            = Carbon::now();

            if($request->hasfile('image')){
                if (\File::exists(public_path($list->ATTACHMENT_PATH))) {
                    \File::delete(public_path($list->ATTACHMENT_PATH));
                }
                $image = $request->file('image');
                $name = uniqid() . '.' . $image->getClientOriginalExtension();
                $path = '/uploads/recharge_request/' . Auth::user()->PK_NO . '/' . $name;
                $image->move(public_path('/uploads/recharge_request/' . Auth::user()->PK_NO), $name);
                $list->ATTACHMENT_PATH = $path;
            }

            $list->save();

        } catch (\Exception $e) {
            DB::rollback();
            return $this->formatResponse(false, 'Recharge Request is not Submitted !', 'recharge-request');
        }
        DB::commit();
        return $this->formatResponse(true, 'Recharge Request Submitted Successfully !', 'payment-history');
    }


    public function getRechargeReq($userID)
    {
        return RechargeRequest::select('ACC_RECHARGE_REQUEST.*')
            ->leftJoin('')
            ->where('F_CUSTOMER_NO', '=', $userID)
            ->whereIn('STATUS',[0,2])
            ->get();
    }
}
