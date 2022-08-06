<?php

namespace App\Http\Controllers\Owner;

use Auth;
use Toastr;
use App\User;
use Validator;
use App\Product;
use Carbon\Carbon;
use App\Models\Area;
use App\Models\City;
use App\Models\Listings;
use App\Models\LeadShare;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\Models\ProductListing;
use App\Models\PropertyFacing;
use App\Models\PropertyCondition;
use App\Models\PropertyListingType;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\updateProfileRequest;
use App\Http\Requests\updatePasswordRequest;
use DB;

class OwnerController extends Controller
{
    protected $user;
    protected $listings;
    protected $leadShare;

    public function __construct(User $user, Listings $listings, LeadShare $leadShare)
    {
        $this->middleware('auth');
        $this->user = $user;
        $this->listings = $listings;
        $this->leadShare = $leadShare;
    }

    public function getOwnerBuyLeads(Request $request)
    {
        $data = array();
        $data['listing'] = $this->leadShare->getSuggestedLead($request);
        return view('owner.buy_leads', compact('data'));
    }

    public function getOwnerBuyLeadsDetails($id)
    {
        $data = array();
        $data['listing_details'] = $this->leadShare->getLeadDetails($id);
        return view('owner.buy_leads_details', compact('data'));
    }

    public function getMyListings(Request $request)
    {
        $data = array();
        $data['listing'] = $this->listings->getLatest(10);
        return view('owner.owner_listings', compact('data'));
    }

    public function getOwnerLeads(Request $request)
    {
        $data = array();
        $data['listing'] = $this->leadShare->getLeads($request);
        return view('owner.leads', compact('data'));
    }

    public function getArea($id)
    {
        $agent_area = DB::table('ss_agent_area')
            ->join('web_user', 'web_user.PK_NO', '=', 'ss_agent_area.F_USER_NO')
            ->where('F_USER_NO', Auth::user()->PK_NO)
            ->where('F_CITY_NO', $id)
            ->select('F_AREA_NO')
            ->get();
        
        // return response()->json($agent_area);
        
        $areaArray = [];
        
        foreach ($agent_area as $key => $value) {
            $areaArray[$key] = $value->F_AREA_NO;
        }

        // return response()->json($areaArray);

        $data['area'] = Area::whereIN('PK_NO', $areaArray)->pluck('AREA_NAME', 'PK_NO');
        return response()->json($data);
    }

}
