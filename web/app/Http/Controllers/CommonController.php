<?php

namespace App\Http\Controllers;

use App\Http\Requests\contactRequest;
use App\Http\Requests\ProductRequirementsRequest;
use App\Models\Area;
use App\Models\City;
use App\Models\ContactForm;
use App\Models\CustomerPayment;
use App\Models\Listings;
use App\Models\ProductRequirements;
use App\Models\PropertyType;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Toastr;
si
class CommonController extends Controller
{
    protected $category;
    protected $contact;
    protected $payment;
    protected $requirements;
    protected $resp;

    public function __construct(ProductRequirements $requirements, Category $category, ContactForm $contacts, CustomerPayment $payment)
    {
//        $this->middleware('auth')->except(['getPostRequirement', 'storePostRequirement']);
        $this->category = $category;
        $this->contact = $contacts;
        $this->payment = $payment;
        $this->requirements = $requirements;
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

    public function getPostRequirement()
    {
        $data['property_type'] = PropertyType::pluck('PROPERTY_TYPE', 'PK_NO');
//        $data['city'] = City::select('CITY_NAME', 'PK_NO')->get(); // Previous modal version
        $data['city'] = City::all(['CITY_NAME', 'PK_NO'])->pluck('CITY_NAME', 'PK_NO');
        $data['areas'] = Area::where('F_CITY_NO', 1)->pluck('AREA_NAME', 'PK_NO');
        return view('common.post-requirement', compact('data'));
    }

    public function storePostRequirement(ProductRequirementsRequest $request)
    {
        $request->validate([
            'email' => 'required|email|unique:WEB_USER,EMAIL',
            'password' => 'required|min:6',
        ]);


        DB::beginTransaction();
        try {
            $user = new User();
            $user->USER_TYPE    = 1;
            $user->EMAIL        = $request->email;
            $user->PASSWORD     = Hash::make($request->password);
            $user->save();

            $request->request->add(['auth_id' => $user->PK_NO]);
            Auth::attempt($request->only(['email', 'password']));
        } catch (\Exception $e) {
            DB::rollBack();
            return back();
        }

        $this->resp = $this->requirements->storeOrUpdate($request);
        if ($this->resp->status) {
            Toastr()->success($this->resp->msg);
        } else {
            Toastr()->error($this->resp->msg);
            return back();
        }

        DB::commit();
        return redirect()->route('my-account');
    }
}











