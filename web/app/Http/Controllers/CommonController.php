<?php

namespace App\Http\Controllers;

use App\Http\Requests\contactRequest;
use App\Models\ContactForm;
use App\Models\CustomerPayment;
use App\Models\Listings;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Toastr;

class CommonController extends Controller
{
    protected $category;
    protected $contact;
    protected $payment;

    public function __construct(Category $category, ContactForm $contacts, CustomerPayment $payment)
    {
        $this->middleware('auth');
        $this->category = $category;
        $this->contact = $contacts;
        $this->payment = $payment;
    }


    /*    public function getCommon()
        {
            $data                   = array();
            $data['divisions']      = $this->division->getAlldivisions();
            $data['cities']         = $this->city->getCity();
            $data['areas']          = $this->area->getArea();
            $data['category']       = $this->category->getCategory();
            $data['subcategory']    = $this->category->getAllSubCategory();
            return $data;

        }*/


    public function getAboutUs(Request $request)
    {

        return view('common.about_us');
    }


    public function getContactUs(Request $request)
    {

        return view('common.contact_us');
    }

    public function storeContactUs(contactRequest $request)
    {
        $this->resp = $this->contact->store($request);
        $msg = $this->resp->msg;
        $msg_title = $this->resp->msg_title;
        Toastr::success($msg, $msg_title, ["positionClass" => "toast-top-right"]);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
//        return view('common.contact_us');
    }

    public function getTermsConditions(Request $request)
    {


        return view('common.terms_condition');

    }

    public function getSiteMap(Request $request)
    {
        $data = array();
        //$data['data'] =  $this->getCommon();
        return view('common.site-map', compact('data'));
    }


    /* public function getPrivacyPolicy(Request $request)
     {

         return view('common.privacy_policy');
     }

     public function getHowToSellFast(Request $request)
     {

         return view('common.how_to_sell_fast');
     }


     public function getMembership(Request $request)
     {

         return view('common.get_membership');
     }


     public function getMyAds(Request $request)
     {

         return view('common.my_ads');
     }


     public function getPromotions(Request $request)
     {

         return view('common.promotions');
     }




     public function getFaq(Request $request)
     {
         $faqs=DB::table('ss_faq')->orderBy('pk_no','DESC')->get();
         return view('common.faq', compact('faqs'));

     }

     public function getPackages(Request $request)
     {

         return view('common.packages');
     }




     public function getArea($location_id,$type)
     {
         $response = '<option value="">No data found</option>';

         if ($type == 'city') {
             $data = Area::where('city_pk_no',$location_id)->get();
         }elseif($type == 'division'){
             $data = Area::where('division_pk_no',$location_id)->get();
         }else{
             $data = null;
         }
         if ($data && count($data) > 0 ) {
             $response = '';
           foreach ($data as $key => $value) {
             $response .= '<option value="'.$value->pk_no.'">'.$value->name.'</option>';
           }
         }



         return response()->json($response);
     }
 */


    public function getDevListings(Request $request)
    {
        $data = array();
        $data['listing'] = Listings::select('PRD_LISTINGS.LISTING_TYPE', 'LT.SHORT_NAME', 'PRD_LISTINGS.MODIFIED_AT', 'PRD_LISTINGS.PROPERTY_FOR', 'PRD_LISTINGS.CODE', 'PRD_LISTINGS.TITLE', 'PRD_LISTINGS.CITY_NAME', 'PRD_LISTINGS.AREA_NAME', 'PRD_LISTINGS.PK_NO', 'PRD_LISTINGS.IS_FEATURE')
            ->where('PRD_LISTINGS.STATUS', '!=', 4)
            ->where('PRD_LISTINGS.F_USER_NO', '=', Auth::id())
            ->leftJoin('PRD_LISTING_TYPE AS LT', 'LT.PK_NO', '=', 'PRD_LISTINGS.F_LISTING_TYPE')
            ->get();
        return view('developer.developer_listings', compact('data'));
    }

    public function getdeveloperLeads(Request $request)
    {
        $data = array();
        return view('developer.developer_leads', compact('data'));
    }

    public function getdeveloperBuyLeads(Request $request)
    {
        $data = array();
        return view('developer.developer_buy_leads', compact('data'));
    }

    public function getdeveloperPayments(Request $request)
    {
        $data['payments'] = $this->payment->getPayments(Auth::id());
        return view('developer.developer_payments', compact('data'));
    }


}











