<?php

namespace App\Http\Controllers\Agency;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\CustomerPayment;
use App\Models\FloorList;
use App\Models\ListingFeatures;
use App\Models\Listings;
use App\Models\NearBy;
use App\Models\PropertyCondition;
use App\Models\PropertyFacing;
use App\Models\PropertyListingType;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgencyController extends Controller
{
    protected $listings;
    protected $payment;

    public function __construct(Listings $listings, CustomerPayment $payment)
    {
        $this->middleware('auth');
        $this->listings = $listings;
        $this->payment = $payment;
    }

    public function getListings()
    {
        $data['listings'] = $this->listings->getLatest(15);
        return view('agency.listings', compact('data'));
    }

    public function getLeads(Request $request)
    {
        $data = [];
        return view('agency.leads', compact('data'));
    }

    public function getBuyLeads(Request $request)
    {
        $data = [];
        return view('agency.buy_leads', compact('data'));
    }

    public function getPayments(Request $request)
    {
        $data['payments'] = $this->payment->getPayments(Auth::id());
        return view('agency.payments', compact('data'));
    }
}
