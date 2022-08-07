<?php

namespace App\Http\Controllers\Agency;

use App\Models\Area;
use App\Models\City;
use App\Models\NearBy;
use App\Models\Listings;
use App\Models\FloorList;
use App\Models\LeadShare;
use App\Models\CustomerTxn;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\Models\PropertyFacing;
use App\Models\CustomerPayment;
use App\Models\ListingFeatures;
use App\Models\RechargeRequest;
use App\Models\PropertyCondition;
use App\Models\PropertyListingType;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class AgencyController extends Controller
{
    protected $listings;
    protected $payment;

    public function __construct(RechargeRequest $recharge_request, Listings $listings, CustomerPayment $payment,LeadShare $leadShare,CustomerTxn $txn)
    {
        $this->middleware('auth');
        $this->listings = $listings;
        $this->payment = $payment;
        $this->leadShare            = $leadShare;
        $this->txn                  = $txn;
        $this->recharge_request     = $recharge_request;
    }

    public function getListings()
    {
        $data['listings'] = $this->listings->getLatest(15);
        return view('agency.listings', compact('data'));
    }

    public function getLeads(Request $request)
    {
        $data = array();
        $data['listing'] = $this->leadShare->getdeveloperLeads($request);
        $data['title'] = 'Leads';
        $data['active'] = 'agency-leads';
        return view('agency.agency_leads', compact('data'));
    }

    public function getBuyLeads(Request $request)
    {
        $data = array();
        $data['listing'] = $this->leadShare->getSuggestedLead($request);
        $data['title'] = 'Suggested Leads';
        $data['active'] = 'agency-buy-leads';
        return view('agency.agency_leads', compact('data'));
    }

    public function getPayments(Request $request)
    {
        $data['payments'] = $this->txn->getTxnHistory(Auth::id());
        $data['recharge_request'] = $this->recharge_request->getRechargeReq(Auth::id());
        return view('agency.agency_payments', compact('data'));

    }

    public function getLeadsDetails($id)
    {
        $data = array();
        $data['row'] = $this->leadShare->getLeadDetails($id);
        return view('agency.leads_details', compact('data'));
    }



}
