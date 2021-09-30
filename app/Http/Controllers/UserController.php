<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRefundRequest;
use App\Http\Requests\updateProfileRequest;
use App\Http\Requests\updatePasswordRequest;
use App\Http\Requests\UserRequest;
use App\Models\BrowsedProperty;
use App\Models\CustomerRefund;
use App\Models\Listings;
use App\Models\SuggestedProperty;
use Illuminate\Http\Request;
use App\User;
use Toastr;
use App\Product;
use Illuminate\Support\Facades\Auth;
use DB;

class UserController extends Controller
{
    protected $user;
    protected $userModel;
    protected $customerRefundModel;
    protected $listings;


    public function __construct(User $user, CustomerRefund $customerRefund, Listings $listings)
    {
        $this->middleware('auth');
        $this->userModel = $user;
        $this->customerRefundModel = $customerRefund;
        $this->listings = $listings;
    }

    public function getMyAccount(Request $request)
    {
        $data = array();
        $user_id = Auth::user()->PK_NO;
        $user_type = Auth::user()->USER_TYPE;


        $data['my_balance'] = 0;
        //$data['city_combo'] = $this->city->getCityCombo();
        if ($user_type == 1) {
            $data['properties'] = BrowsedProperty::with(['listing'])
                ->where('IS_PAY_ATTEMPT', '=', 1)
                ->where('F_USER_NO', '=', $user_id)
                ->orderByDesc('LAST_BROWES_TIME')
                ->take(8)
                ->get();

            $data['suggestedProperty'] = SuggestedProperty::select('PRD_LISTINGS.PK_NO', 'PRD_LISTINGS.URL_SLUG','PRD_LISTINGS.TITLE', 'PRD_LISTINGS.IS_VERIFIED','PRD_LISTINGS.IS_TOP','PRD_LISTINGS.CI_PRICE','PRD_LISTINGS.AREA_NAME','PRD_LISTINGS.CITY_NAME','PRD_LISTING_IMAGES.THUMB_PATH','PRD_LISTING_VARIANTS.PROPERTY_SIZE','PRD_LISTING_VARIANTS.BEDROOM','PRD_LISTING_VARIANTS.TOTAL_PRICE','PRD_LISTING_VARIANTS.BATHROOM')
                    ->leftJoin('PRD_LISTINGS', 'PRD_LISTINGS.PK_NO', 'PRD_SUGGESTED_PROPERTY.F_LISTING_NO')
                    ->leftJoin('PRD_LISTING_IMAGES', function($join)
                    {
                        $join->on('PRD_LISTINGS.PK_NO', '=', 'PRD_LISTING_IMAGES.F_LISTING_NO');
                        $join->on('PRD_LISTING_IMAGES.IS_DEFAULT','=',DB::raw("'1'"));

                    })
                    ->leftJoin('PRD_LISTING_VARIANTS', function($join)
                    {
                        $join->on('PRD_LISTINGS.PK_NO', '=', 'PRD_LISTING_VARIANTS.F_LISTING_NO');
                        $join->on('PRD_LISTING_VARIANTS.IS_DEFAULT','=',DB::raw("'1'"));

                    })

                    ->where('PRD_SUGGESTED_PROPERTY.F_USER_NO', '=', $user_id)
                    ->orderByDesc('ORDER_ID')
                    ->limit(5)
                    ->get();
//            dd($data);
        } else {
            $data['properties'] = $this->listings->getLatest(2);
        }
//        dd($data);
        return view('common.my_account', compact('data'));
    }

    public function getEditProfile(Request $request)
    {
        $user_id = Auth::user()->PK_NO;
        $user_type = Auth::user()->USER_TYPE;
        $data = array();
        $data['user_data'] = User::with(['info'])->where('PK_NO', $user_id)->first();

        //$data['city_combo'] = $this->city->getCityCombo();
        return view('common.edit_profile', compact('data'));
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
        $request->validate([
            'password' => 'required|min:6'
        ]);
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
        $data = array();
        //$data['city_combo'] = $this->city->getCityCombo();
        return view('seeker.suggested_properties', compact('data'));
    }

    public function getVarifiedProperties(Request $request)
    {
        $data = array();
        //$data['city_combo'] = $this->city->getCityCombo();
        return view('seeker.varified_properties', compact('data'));
    }

    public function getContactedProperties(Request $request)
    {
        $data = array();
        $data['rows'] = Listings::select('PK_NO', 'TITLE', 'CITY_NAME', 'AREA_NAME', 'IS_FEATURE')->get();
        //    dd($data['rows'][0]);
        return view('seeker.contacted_properties', compact('data'));
    }

    public function getBrowsedProperties(Request $request)
    {
        $data = array();
        //$data['city_combo'] = $this->city->getCityCombo();
        return view('seeker.browsed_properties', compact('data'));
    }

    public function getRechargeBalance(Request $request)
    {
        $data = array();
        //$data['city_combo'] = $this->city->getCityCombo();
        return view('seeker.recharge_balance', compact('data'));
    }

    public function getRefundRequest(Request $request, $id)
    {
        $data = array();
        $data['product_list_details'] = Listings::where('PK_NO', $id)->select('CODE', 'CITY_NAME', 'AREA_NAME', 'PK_NO', 'IS_FEATURE')->first();
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
        $data = array();
        // $this->resp = $this->userModel->paymentHistory($request);
        // $msg        = $this->resp->msg;
        // $msg_title  = $this->resp->msg_title;
        // Toastr::success($msg, $msg_title, ["positionClass" => "toast-top-right"]);
        // return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
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
                  <td>' . $item->TOTAL_PRICE . '</td>
                </tr>
            ';
        }
        return response()->json($output);
    }


}
