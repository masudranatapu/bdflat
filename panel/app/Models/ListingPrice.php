<?php

namespace App\Models;

use App\Traits\RepoResponse;
use Illuminate\Database\Eloquent\Model;

class ListingPrice extends Model
{
    use RepoResponse;
    protected $table = 'SS_LISTING_PRICE';
    protected $primaryKey = 'PK_NO';
    public $timestamps = false;


    /*public function getAgentCombo(){
        return Agent::where('IS_ACTIVE', 1)->pluck('NAME', 'PK_NO');
    }*/
    public function getPaginatedList()
    {
        return ListingPrice::find(1);
    }

    public function postUpdate($request)
    {
        try{
            $listing_price                                      = ListingPrice::find(1);
            $listing_price->GENERAL_SALES_PRICE                 = $request->gl_sale_price;
            $listing_price->GENERAL_SALES_DURATION              = $request->gl_sale_duration;
            $listing_price->GENERAL_RENT_PRICE                  = $request->gl_rent_price;
            $listing_price->GENERAL_RENT_PRICE_DURATION         = $request->gl_rent_duration;
            $listing_price->GENERAL_ROOMMATE_PRICE              = $request->gl_roommate_price;
            $listing_price->GENERAL_ROOMMATE_DURATION           = $request->gl_roommate_duration;
            $listing_price->FEATURE_SALES_PRICE                 = $request->fl_sale_price;
            $listing_price->FEATURE_SALES_DURATION              = $request->fl_sale_duration;
            $listing_price->FEATURE_RENT_PRICE                  = $request->fl_rent_price ;
            $listing_price->FEATURE_RENT_PRICE_DURATION         = $request->fl_rent_duration;
            $listing_price->FEATURE_ROOMMATE_PRICE              = $request->fl_roommate_price;
            $listing_price->FEATURE_ROOMMATE_DURATION           = $request->fl_roommate_duration;
            $listing_price->AUTO_GENERAL_SALES_PRICE            = $request->ag_sale_price;
            $listing_price->AUTO_GENERAL_SALES_DURATION         = $request->ag_sale_duration;
            $listing_price->AUTO_GENERAL_RENT_PRICE             = $request->ag_rent_price;
            $listing_price->AUTO_GENERAL_RENT_PRICE_DURATION    = $request->ag_rent_duration;
            $listing_price->AUTO_GENERAL_ROOMMATE_PRICE         = $request->ag_roommate_price;
            $listing_price->AUTO_GENERAL_ROOMMATE_DURATION      = $request->ag_roommate_duration;
            $listing_price->AUTO_FEATURE_SALES_PRICE            = $request->af_sale_price;
            $listing_price->AUTO_FEATURE_SALES_DURATION         = $request->af_sale_duration;
            $listing_price->AUTO_FEATURE_RENT_PRICE             = $request->af_rent_price;
            $listing_price->AUTO_FEATURE_RENT_PRICE_DURATION    = $request->af_rent_duration;
            $listing_price->AUTO_FEATURE_ROOMMATE_PRICE         = $request->af_roommate_price;
            $listing_price->AUTO_FEATURE_ROOMMATE_DURATION      = $request->af_roommate_duration;
            $listing_price->AGENT_PROP_VIEW_SALES_PRICE         = $request->apv_sale_price;
            $listing_price->AGENT_PROP_VIEW_RENT_PRICE          = $request->apv_rent_price;
            $listing_price->AGENT_PROP_VIEW_ROOMMATE_PRICE      = $request->apv_roommate_price;
            $listing_price->AGENT_COMM_SALES_PRICE              = $request->ac_sale_price;
            $listing_price->AGENT_COMM_RENT_PRICE               = $request->ac_rent_price;
            $listing_price->AGENT_COMM_ROOMMATE_PRICE           = $request->ac_roommate_price;
            $listing_price->LEAD_VIEW_SALES_PRICE               = $request->lv_sale_price;
            $listing_price->LEAD_VIEW_RENT_PRICE                = $request->lv_rent_price;
            $listing_price->LEAD_VIEW_ROOMMATE_PRICE            = $request->lv_roommate_price;
            $listing_price->update();

            return $this->formatResponse(true, 'Listing Price Updated', 'admin.listing_price.list');
        }catch (\Exception $e){
            dd($e);
        }
    }
}
