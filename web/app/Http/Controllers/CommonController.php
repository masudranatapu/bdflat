<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;

class CommonController extends Controller
{
    protected $category;
  
    
    public function __construct(Category $category)
    {
       $this->category  = $category;
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


    


     
}











