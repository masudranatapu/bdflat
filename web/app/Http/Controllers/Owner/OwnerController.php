<?php

namespace App\Http\Controllers\Owner;

use App\Models\Area;
use App\Models\City;
use App\Models\Listings;
use App\Models\ProductListing;
use App\Models\PropertyCondition;
use App\Models\PropertyFacing;
use App\Models\PropertyListingType;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Toastr;
use App\User;
use App\Product;
use Validator;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\updateProfileRequest;
use App\Http\Requests\updatePasswordRequest;

class OwnerController extends Controller
{
    protected $user;
    protected $listings;

    public function __construct(User $user, Listings $listings)
    {
        $this->middleware('auth');
        $this->user = $user;
        $this->listings = $listings;
    }

    public function getOwnerBuyLeads(Request $request)
    {
        $data = array();
        return view('owner.buy_leads', compact('data'));
    }

    public function getMyListings(Request $request)
    {
        $data = array();
        $data['listing'] = $this->listings->getLatest(15);
        return view('owner.owner_listings', compact('data'));
    }

    public function getOwnerLeads(Request $request)
    {
        $data = array();
        return view('owner.leads', compact('data'));
    }

    public function getArea($id)
    {
        $data['area'] = Area::where('F_CITY_NO', $id)->pluck('AREA_NAME', 'PK_NO');
        return response()->json($data);
    }

}
