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
    protected $fillable     = [
        'F_USER_NO',
        'F_REQUEST_REASON_NO',
        'REQUEST_REASON',
        'REQUEST_AT',
        'COMMENT',
        'REQUEST_AMOUNT',
        'F_LISTING_NO',
        'STATUS',
        'APPROVED_AT',
        'APPROVED_BY',
        'APPROVED_AMOUNT',
        'CREATED_AT',
        'CREATED_BY',
        'MODIFIED_AT',
        'MODIFIED_BY',
        'IS_DELETE',
    ];

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $list                                   = new CustomerRefund();
            $list->F_USER_NO                        = Auth::user()->PK_NO;
            $list->F_REQUEST_REASON_NO              = $request->claiming;
            $list->REQUEST_AT                       = Carbon::now();
            $list->REQUEST_AMOUNT                   = $request->request_amount;
            $list->COMMENT                          = $request->comment;
            $list->F_LISTING_NO                     = $request->f_listing_no;
            $list->STATUS                           = 1;
            $list->CREATED_AT                       = Carbon::now();
            $list->save();

        }catch (\Exception $e){
            dd($e);
            DB::rollback();
            return $this->formatResponse(false, 'Your Claiming is not submitted successfully !', 'contacted-properties');
        }

        DB::commit();
        return $this->formatResponse(true, 'Your Claiming is submitted successfully !', 'contacted-properties');
    }
}
