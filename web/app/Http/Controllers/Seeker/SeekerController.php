<?php

namespace App\Http\Controllers\Seeker;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRefundRequest;
use App\Http\Requests\updateProfileRequest;
use App\Http\Requests\updatePasswordRequest;
use App\Http\Requests\UserRequest;
use App\Models\BrowsedProperty;
use App\Models\CustomerPayment;
use App\Models\CustomerRefund;
use App\Models\CustomerTxn;
use App\Models\ListingLeadPayment;
use App\Models\Listings;
use App\Models\MobileNumber;
use App\Models\PaymentMethod;
use App\Models\RechargeRequest;
use App\Models\RefundRequest;
use App\Models\SuggestedProperty;
use Illuminate\Http\Request;
use App\User;
use Toastr;
use DB;
use Illuminate\Support\Facades\Auth;

class SeekerController extends Controller
{
    protected $userModel;
    protected $customerRefundModel;
    protected $payment;
    protected $leadPayment;
    protected $txn;
    protected $suggestedProperty;
    protected $rechargeRequest;

    public function __construct(RechargeRequest $rechargeRequest,SuggestedProperty $suggestedProperty, User $user, CustomerRefund $customerRefund, CustomerPayment $payment, ListingLeadPayment $leadPayment, CustomerTxn $txn)
    {
        $this->middleware('auth');
        $this->userModel = $user;
        $this->customerRefundModel = $customerRefund;
        $this->payment = $payment;
        $this->leadPayment = $leadPayment;
        $this->txn = $txn;
        $this->suggestedProperty = $suggestedProperty;
        $this->rechargeRequest = $rechargeRequest;
    }

    public function getMyAccount(Request $request)
    {
        $data = array();
        $user_id = Auth::user()->PK_NO;
        $user_type = Auth::user()->USER_TYPE;

        if ($user_type == 1) {
            $view = 'seeker.my_account';
        } elseif ($user_type == 2) {
            $view = 'owner.my_account';
        } else {
            $view = 'users.my_account';
        }
        $data['my_balance'] = 0;
        //$data['city_combo'] = $this->city->getCityCombo();
        return view($view, compact('data'));
    }

    public function getEditProfile(Request $request)
    {
        $user_id = Auth::user()->PK_NO;
        $user_type = Auth::user()->USER_TYPE;
        $data = array();
        $data['user_data'] = User::where('PK_NO', $user_id)->first();
        if ($user_type == 1) {
            $view = 'seeker.edit_profile';
        } else {
            $view = 'users.edit_profile';
        }
        //$data['city_combo'] = $this->city->getCityCombo();
        return view($view, compact('data'));
    }

    public function updateProfile(UserRequest $request)
    {
        $this->resp = $this->userModel->updateProfile($request);
        $msg = $this->resp->msg;
        $msg_title = $this->resp->msg_title;
        Toastr::success($msg, $msg_title, ["positionClass" => "toast-top-right"]);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function updatePass(Request $request)
    {
        $this->resp = $this->userModel->updatePass($request);
        $msg = $this->resp->msg;
        $msg_title = $this->resp->msg_title;
        Toastr::success($msg, $msg_title, ["positionClass" => "toast-top-right"]);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }


    public function getMyRequirement(Request $request)
    {
        $data = array();
        //$data['city_combo'] = $this->city->getCityCombo();
        return view('seeker.my_requirement', compact('data'));
    }

    public function getSuggestedProperties(Request $request)
    {
        $data['properties'] = $this->suggestedProperty->getProperties($request);
//        dd($data['properties']);
        return view('seeker.suggested_properties', compact('data'));
    }

    public function getContactedProperties(Request $request)
    {
        $data           = array();
        $data['rows']   = $this->leadPayment->getContactedProperties($request);
        $claim_hour = DB::table('WEB_SETTINGS')->select('LISTING_LEAD_CLAIMED_TIME')->first();
        $data['claim_hour'] = $claim_hour->LISTING_LEAD_CLAIMED_TIME ?? 0;
        return view('seeker.contacted_properties', compact('data'));
    }

    public function getBrowsedProperties(Request $request)
    {
        $data['browsedProperties'] = Auth::user()->browsedProperties()
            ->with(['getDefaultThumb', 'getListingVariant'])
            ->distinct()
            ->orderByDesc('PRD_BROWSING_HISTORY.LAST_BROWES_TIME')
            ->get();
        //        ddd($data);
        return view('seeker.browsed_properties', compact('data'));
    }

    public function getRechargeBalance(Request $request)
    {
        $user_id = Auth::id();
        $data = array();
        if ($request->query->get('attempt') == 1) {
            $browsed = BrowsedProperty::where('F_USER_NO', $user_id)->orderByDesc('LAST_BROWES_TIME')->first();
            if ($browsed) {
                $browsed->IS_PAY_ATTEMPT = 1;
                $browsed->update();
            }
        }
        //$data['city_combo'] = $this->city->getCityCombo();
        return view('seeker.recharge_balance', compact('data'));
    }

    public function getRechargeRequest(Request $request)
    {
        $data = array();
        $data['bkash'] = MobileNumber::where('F_PAYMENT_METHOD_NO',2)->pluck('MOBILE_NO','PK_NO');
        $data['rocket'] = MobileNumber::where('F_PAYMENT_METHOD_NO',3)->pluck('MOBILE_NO','PK_NO');
        //dd($data);
        return view('seeker.confirm_payment', compact('data'));
    }
    public function postRechargeRequest(Request $request)
    {
        $this->resp = $this->rechargeRequest->postRechargeRequest($request);
        $msg = $this->resp->msg;
        $msg_title = $this->resp->msg_title;
        Toastr::success($msg, $msg_title, ["positionClass" => "toast-top-right"]);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getRefundRequest(Request $request, $id)
    {
        $data = array();
        $data['row'] = ListingLeadPayment::where('PK_NO',$id)->where('F_USER_NO',Auth::id())->first();
        $data['reasons'] = RefundRequest::where('IS_ACTIVE',1)->orderBy('ORDER_ID','DESC')->pluck('TITLE','PK_NO');
        return view('seeker.refund_request', compact('data'));
    }

    public function customerRefundStore(CustomerRefundRequest $request)
    {
        $this->resp = $this->customerRefundModel->store($request);
        $msg = $this->resp->msg;
        $msg_title = $this->resp->msg_title;
        Toastr::success($msg, $msg_title, ["positionClass" => "toast-top-right"]);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function paymentHistory(Request $request)
    {
        $data['payments'] = $this->txn->getTxnHistory();
        return view('seeker.payment_history', compact('data'));
    }


    public function getVariants($id)
    {
        $data = Listings::where('PK_NO', $id)->first();
        $output = '';
        foreach ($data->getListingVariants as $item) {
            $output .= '
                <tr>
                  <td>' . $item->BEDROOM . ' Bed</td>
                  <td>' . $item->BATHROOM . ' Bath</td>
                  <td>' . number_format($item->TOTAL_PRICE, 2) . '</td>
                </tr>
            ';
        }
        return response()->json($output);
    }

    public function leadPay($id)
    {
        $this->resp = $this->leadPayment->leadPay($id);
        $msg = $this->resp->msg;
        $msg_title = $this->resp->msg_title;
        Toastr::success($msg, $msg_title, ["positionClass" => "toast-top-right"]);
        return redirect()->back()->with($this->resp->redirect_class, $this->resp->msg);
    }


}
