<?php

namespace App\Models;

use App\Traits\RepoResponse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ListingLeadPayment extends Model
{
    use RepoResponse;

    protected $table = 'ACC_LISTING_LEAD_PAYMENTS';
    protected $primaryKey = 'PK_NO';
    const CREATED_AT = 'CREATE_AT';
    const UPDATED_AT = 'MODIFIED_AT';

    public function leadPay($id): object
    {


        DB::beginTransaction();
        try {
            $listing = Listings::find($id);
            $browsed = DB::table('PRD_BROWSING_HISTORY')->where('F_USER_NO', Auth::user()->id)->orderByDesc('LAST_BROWES_TIME')->first();

            if ($browsed) {
                $browsed->IS_PAY_ATTEMPT = 1;
                $browsed->save();
            }

            $payment = new ListingLeadPayment();
            $payment->F_LISTING_NO  = $id;
            $payment->F_USER_NO     = Auth::id();
            $payment->AMOUNT        = $listing->CI_PRICE;
            $payment->PURCHASE_DATE = date('Y-m-d H:i:s');
            $payment->CREATED_BY    = Auth::id();
            $payment->MODIFIED_BY   = Auth::id();
            $payment->save();

            $check = DB::table('PRD_SUGGESTED_PROPERTY')->where('F_LISTING_NO',$id)->where('F_USER_NO',Auth::id())->first();
            if($check){
                DB::table('PRD_SUGGESTED_PROPERTY')->where('F_LISTING_NO',$id)->where('F_USER_NO',Auth::id())->update(['STATUS' => 1]);
            }else{
                DB::table('PRD_SUGGESTED_PROPERTY')->insert([
                        'F_LISTING_NO'  => $id,
                        'F_COMPANY_NO'  => $listing->F_USER_NO,
                        'F_USER_NO'     => Auth::id(),
                        'CREATED_AT'    => date('Y-m-d H:i:s'),
                        'CREATED_BY'    => Auth::id(),
                        'PROPERTY_FOR'  => $listing->PROPERTY_FOR,
                        'PROPERTY_TYPE' => $listing->PROPERTY_TYPE,
                        'AREA'          => $listing->F_AREA_NO,
                        'SIZE'          => '',
                        'BEDROOM'       => '',
                        'BATHROOM'      => '',
                        'TOTAL_PRICE'   => '',
                        'PROPERTY_CONDITION' => '',
                        'STATUS'        => 1,
                        'ORDER_ID'      => 1
                ]);
            }

            $check_sugg = SuggestedProperty::where('F_LISTING_NO',$id)->where('F_USER_NO', Auth::id())->first();
            if($check_sugg){
                SuggestedProperty::where('F_LISTING_NO',$id)->where('F_USER_NO',Auth::id())->update(['STATUS' => 1]);
            }

            // Remove attempt if paid
            if ($browsed) {
                $browsed->IS_PAY_ATTEMPT = 0;
                $browsed->save();
            }
        }catch (\Exception $e){
            DB::rollback();
            dd($e);
            return $this->formatResponse(false, 'Payment not successful !', 'home');
        }
        DB::commit();
        return $this->formatResponse(true, 'Payment successful !', 'home');

    }

    public function listing() {
        return $this->belongsTo('App\Models\Listings', 'F_LISTING_NO');
      }

    public function getContactedProperties($request){
        $user_id = Auth::id();
        $data = ListingLeadPayment::select('ACC_LISTING_LEAD_PAYMENTS.PK_NO','ACC_LISTING_LEAD_PAYMENTS.F_LISTING_NO','ACC_LISTING_LEAD_PAYMENTS.AMOUNT as PAID_AMOUNT','ACC_LISTING_LEAD_PAYMENTS.PURCHASE_DATE', 'ACC_LISTING_LEAD_PAYMENTS.CREATE_AT', 'ACC_LISTING_LEAD_PAYMENTS.IS_CLAIM')->where('ACC_LISTING_LEAD_PAYMENTS.F_USER_NO', $user_id)->paginate(20);
        return $data;

    }

}
