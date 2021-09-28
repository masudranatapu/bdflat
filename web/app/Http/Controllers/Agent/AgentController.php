<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\CustomerPayment;
use App\Models\Listings;
use App\Models\LeadShare;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgentController extends Controller
{
    protected $listings;
    protected $leadShare;
    protected $payment;

    public function __construct(Listings $listings, CustomerPayment $payment, LeadShare $leadShare)
    {
        $this->middleware('auth');
        $this->listings = $listings;
        $this->payment = $payment;
        $this->leadShare = $leadShare;
    }

    public function getListings()
    {
        $data['listings'] = $this->listings->getLatest(15);
        return view('agent.listings', compact('data'));
    }

    public function getLeads(Request $request)
    {
        $data = [];
        return view('agent.leads', compact('data'));
    }

    public function getBuyLeads(Request $request)
    {
        $data['listing'] = $this->leadShare->getSuggestedLead($request);
        return view('agent.buy_leads', compact('data'));
    }

    public function getBuyLeadsDetails($id)
    {
        $data['listing_details'] = $this->leadShare->getSuggestedLeadDetails($id);
        return view('agent.buy_leads_details', compact('data'));
    }

    public function getPayments(Request $request)
    {
        $data['payments'] = $this->payment->getPayments(Auth::id());
        return view('agent.payments', compact('data'));
    }

    public function getEarnings()
    {
        return view('agent.earnings');
    }

    public function getWithdraw()
    {
        return view('agent.withdraw');
    }
}
