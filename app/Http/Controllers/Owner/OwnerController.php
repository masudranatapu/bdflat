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

    public function getArea($city_id)
    {
        $area = Area::orderBy('AREA_NAME','ASC')->where('F_CITY_NO', $city_id)->whereNull('F_PARENT_AREA_NO')->get(['AREA_NAME', 'PK_NO']);

        $area = DB::table('SS_AGENT_AREA')->leftJoin('SS_AREA','SS_AREA.PK_NO','SS_AGENT_AREA.F_AREA_NO')->where('SS_AGENT_AREA.F_CITY_NO', $city_id)->get(['SS_AREA.AREA_NAME', 'SS_AREA.PK_NO']);
        return response()->json($area);
    }
    public function getSubArea($area_id)
    {
        $area = Area::orderBy('AREA_NAME','ASC')->where('F_PARENT_AREA_NO', $area_id)->get(['AREA_NAME', 'PK_NO']);
        return response()->json($area);
    }

}
