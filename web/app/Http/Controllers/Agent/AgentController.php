<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\CustomerPayment;
use App\Models\Listings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgentController extends Controller
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
        return view('agent.listings', compact('data'));
    }

    public function getLeads(Request $request)
    {
        $data = [];
        return view('agent.leads', compact('data'));
    }

    public function getBuyLeads(Request $request)
    {
        $data = [];
        return view('agent.buy_leads', compact('data'));
    }

    public function getPayments(Request $request)
    {
        $data['payments'] = $this->payment->getPayments(Auth::id());
        return view('agent.payments', compact('data'));
    }
}
