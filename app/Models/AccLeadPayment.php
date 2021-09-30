<?php

namespace App\Models;

use App\Traits\RepoResponse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccLeadPayment extends Model
{
    use RepoResponse;

    protected $table = 'ACC_LEAD_PAYMENTS';
    protected $primaryKey = 'PK_NO';
    const CREATED_AT = 'CREATE_AT';
    const UPDATED_AT = 'MODIFIED_AT';

    public function developerLeadPay($request, $id): object
    {

        DB::beginTransaction();
        try {
            $listing = Listings::find($id);

            $payment = new AccLeadPayment();
            $payment->F_COMPANY_NO      = $listing->F_USER_NO;
            $payment->F_USER_NO         = Auth::id();
            $payment->F_LEAD_SHARE_NO   = $request->f_lead_share_no;
            $payment->F_REQUIREMENT_NO  = $request->f_requirement_no;
            $payment->AMOUNT            = $request->price;
            $payment->PURCHASE_DATE     = date('Y-m-d H:i:s');
            $payment->CREATED_BY        = Auth::id();
            $payment->MODIFIED_BY       = Auth::id();
            $payment->save();

        }catch (\Exception $e){
            DB::rollback();
            dd($e);
            return $this->formatResponse(false, 'Payment not successful !', 'home');
        }
        DB::commit();
        return $this->formatResponse(true, 'Payment successful !', 'home');

    }

}
