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

    /*protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->CREATED_BY = Auth::id();
        });

        static::updating(function ($model) {
            $model->MODIFIED_BY = Auth::id();
        });
    }*/

    public function leadPay($id): object
    {
        $price = Listings::with(['images', 'getListingVariant', 'additionalInfo', 'owner'])
            ->select('PRD_LISTINGS.URL_SLUG',DB::raw('(CASE WHEN PRD_LISTINGS.PROPERTY_FOR = "sale" THEN SS_LISTING_PRICE.SELL_PRICE WHEN PRD_LISTINGS.PROPERTY_FOR = "rent" THEN SS_LISTING_PRICE.RENT_PRICE  WHEN PRD_LISTINGS.PROPERTY_FOR = "roommate" THEN SS_LISTING_PRICE.ROOMMAT_PRICE ELSE 0 END) AS PRICE'))
            ->leftJoin('SS_LISTING_PRICE', 'SS_LISTING_PRICE.F_LISTING_TYPE_NO', 'PRD_LISTINGS.F_LISTING_TYPE')
            ->where('STATUS', '=', 10)
            ->where('PRD_LISTINGS.PK_NO', '=', $id)
            ->first();

        DB::beginTransaction();
        try {
            $payment = new ListingLeadPayment();

            $payment->F_LISTING_NO = $id;
            $payment->F_USER_NO = Auth::id();
            $payment->AMOUNT = $price->PRICE;
            $payment->PURCHASE_DATE = date('Y-m-d H:i:s');
            $payment->CREATED_BY = Auth::id();
            $payment->MODIFIED_BY = Auth::id();
            $payment->save();

            $msg = 'Payment successful !';

        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();
        }

        DB::commit();
        return $this->formatResponse(true, $msg, 'ad');
    }
}
