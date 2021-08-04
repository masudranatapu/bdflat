<?php

namespace App\Http\Controllers\Developer;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\contactRequest;
use App\Models\ContactForm;
use App\Models\CustomerPayment;
use App\Models\Listings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeveloperController extends Controller
{
    protected $listings;
    protected $payment;

    public function __construct(Listings $listings, CustomerPayment $payment)
    {
        $this->middleware('auth');
        $this->payment = $payment;
        $this->listings = $listings;
    }

    public function getDevListings(Request $request)
    {
        $data = array();
        $data['listing'] = $this->listings->getLatest(15);
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
