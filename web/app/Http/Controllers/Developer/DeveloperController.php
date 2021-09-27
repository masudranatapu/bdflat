<?php

namespace App\Http\Controllers\Developer;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\contactRequest;
use App\Models\AccLeadPayment;
use App\Models\ContactForm;
use App\Models\CustomerPayment;
use App\Models\LeadShare;
use App\Models\Listings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Toastr;
use DB;

class DeveloperController extends Controller
{
    protected $listings;
    protected $payment;
    protected $leadShare;
    protected $devLeadPayment;

    public function __construct(Listings $listings, CustomerPayment $payment,LeadShare $leadShare, AccLeadPayment $devLeadPayment)
    {
        $this->middleware('auth');
        $this->payment      = $payment;
        $this->listings     = $listings;
        $this->leadShare    = $leadShare;
        $this->devLeadPayment    = $devLeadPayment;
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
        $data['listing'] = $this->leadShare->getSuggestedLead($request);
        return view('developer.developer_leads', compact('data'));
    }

    public function getdeveloperLeadsDetails($id)
    {
        $data = array();
        $data['listing_details'] = $this->leadShare->getSuggestedLeadDetails($id);
        $data['is_paid'] = AccLeadPayment::where('F_LEAD_SHARE_NO',$id)->first();
        return view('developer.developer_leads_details', compact('data'));
    }

    public function getdeveloperBuyLeads(Request $request)
    {
        $data = array();
        $data['listing'] = $this->leadShare->getSuggestedLead($request);
        return view('developer.developer_buy_leads', compact('data'));
    }

    public function getdeveloperBuyLeadsDetails($id)
    {
        $data = array();
        $data['listing_details'] = $this->leadShare->getSuggestedLeadDetails($id);
        return view('developer.developer_buy_leads_details', compact('data'));
    }


    public function getdeveloperPayments(Request $request)
    {
        $data['payments'] = $this->payment->getPayments(Auth::id());
        return view('developer.developer_payments', compact('data'));
    }

    public function developerLeadPay(Request $request, $id)
    {
        $this->resp = $this->devLeadPayment->developerLeadPay($request, $id);
        $msg = $this->resp->msg;
        $msg_title = $this->resp->msg_title;
        Toastr::success($msg, $msg_title, ["positionClass" => "toast-top-right"]);
        return redirect()->back()->with($this->resp->redirect_class, $this->resp->msg);
    }
}

