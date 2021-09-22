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
        $price = Listings::select('PRD_LISTINGS.URL_SLUG',DB::raw('(CASE WHEN PRD_LISTINGS.PROPERTY_FOR = "sale" THEN SS_LISTING_PRICE.SELL_PRICE WHEN PRD_LISTINGS.PROPERTY_FOR = "rent" THEN SS_LISTING_PRICE.RENT_PRICE  WHEN PRD_LISTINGS.PROPERTY_FOR = "roommate" THEN SS_LISTING_PRICE.ROOMMAT_PRICE ELSE 0 END) AS PRICE'))
            ->leftJoin('SS_LISTING_PRICE', 'SS_LISTING_PRICE.F_LISTING_TYPE_NO', 'PRD_LISTINGS.F_LISTING_TYPE')
            ->where('PRD_LISTINGS.PK_NO', '=', $id)
            ->first();

        DB::beginTransaction();
        try {
            $browsed = DB::table('PRD_BROWSING_HISTORY')->where('F_USER_NO', Auth::user()->id)->orderByDesc('LAST_BROWES_TIME')->first();

            if ($browsed) {
                $browsed->IS_PAY_ATTEMPT = 1;
                $browsed->save();
            }

            $payment = new ListingLeadPayment();
            $payment->F_LISTING_NO = $id;
            $payment->F_USER_NO = Auth::id();
            $payment->AMOUNT = $price->PRICE;
            $payment->PURCHASE_DATE = date('Y-m-d H:i:s');
            $payment->CREATED_BY = Auth::id();
            $payment->MODIFIED_BY = Auth::id();
            $payment->save();

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
}
