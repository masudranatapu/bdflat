<?php

namespace App\Models;
use App\Traits\RepoResponse;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;

class CustomerRefund extends Model
{
    use RepoResponse;

    protected $table        = 'ACC_CUSTOMER_REFUND';
    protected $primaryKey   = 'PK_NO';
    public $timestamps = false;
    protected $fillable     = ['F_USER_NO','F_REQUEST_REASON_NO','REQUEST_REASON'];

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $row = ListingLeadPayment::where('PK_NO',$request->pk_no)->where('IS_CLAIM',0)->where('F_USER_NO',Auth::id())->first();
            if($row){
                $reson = DB::table('REFUND_REQUEST_REASON')->where('PK_NO',$request->refund_reason)->first();
                $list                                   = new CustomerRefund();
                $list->F_USER_NO                        = Auth::id();
                $list->F_REQUEST_REASON_NO              = $request->refund_reason;
                $list->REQUEST_REASON                   = $reson->TITLE;
                $list->REQUEST_AT                       = Carbon::now();
                $list->REQUEST_AMOUNT                   = $row->AMOUNT;
                $list->COMMENT                          = $request->comment;
                $list->F_LISTING_LEAD_PAYMENT_NO	    = $row->PK_NO;
                $list->STATUS                           = 1;
                $list->REFUND_TYPE                      = 1;
                $list->CREATED_AT                       = Carbon::now();
                $list->save();

                ListingLeadPayment::where('PK_NO',$request->pk_no)->update(['IS_CLAIM' => 1]);
            }


        }catch (\Exception $e){
            DB::rollback();
            return $this->formatResponse(false, 'Your Claiming is not submitted successfully !', 'contacted-properties');
        }

        DB::commit();
        return $this->formatResponse(true, 'Your Claiming is submitted successfully !', 'contacted-properties');
    }
}
