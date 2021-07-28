<?php
namespace App\Http\Controllers;
use App\Http\Requests\CustomerRefundRequest;
use App\Http\Requests\updateProfileRequest;
use App\Http\Requests\updatePasswordRequest;
use App\Http\Requests\UserRequest;
use App\Models\CustomerRefund;
use App\Models\Listings;
use Illuminate\Http\Request;
use App\User;
use Toastr;
use App\Product;
use Auth;

class UserController extends Controller
{
    protected $user;


    public function __construct(User $user,CustomerRefund $customerRefund)
    {
        $this->middleware('auth');
        $this->userModel                = $user;
        $this->customerRefundModel      = $customerRefund;

    }

    public function getMyAccount(Request $request)
    {
        $data       = array();
        $user_id    = Auth::user()->PK_NO;
        $user_type  = Auth::user()->USER_TYPE;


        $data['my_balance'] = 0;
        //$data['city_combo'] = $this->city->getCityCombo();
        return view('common.my_account',compact('data'));
    }

    public function getEditProfile(Request $request)
    {
        $user_id = Auth::user()->PK_NO;
        $user_type = Auth::user()->USER_TYPE;
        $data = array();
        $data['user_data'] = User::where('PK_NO',$user_id)->first();

        //$data['city_combo'] = $this->city->getCityCombo();
        return view('common.edit_profile',compact('data'));
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
        return view('seeker.my_requirement',compact('data'));
    }
    public function getSuggestedProperties(Request $request)
    {
         $data = array();
        //$data['city_combo'] = $this->city->getCityCombo();
        return view('seeker.suggested_properties',compact('data'));
    }
    public function getVarifiedProperties(Request $request)
    {
         $data = array();
        //$data['city_combo'] = $this->city->getCityCombo();
        return view('seeker.varified_properties',compact('data'));
    }
    public function getContactedProperties(Request $request)
    {
        $data = array();
        $data['rows'] = Listings::select('PK_NO','TITLE','CITY_NAME','AREA_NAME', 'IS_FEATURE')->get();
    //    dd($data['rows'][0]);
        return view('seeker.contacted_properties',compact('data'));
    }
    public function getBrowsedProperties(Request $request)
    {
         $data = array();
        //$data['city_combo'] = $this->city->getCityCombo();
        return view('seeker.browsed_properties',compact('data'));
    }
    public function getRechargeBalance(Request $request)
    {
         $data = array();
        //$data['city_combo'] = $this->city->getCityCombo();
        return view('seeker.recharge_balance',compact('data'));
    }
    public function getRefundRequest(Request $request, $id)
    {
        $data = array();
        $data['product_list_details'] = Listings::where('PK_NO',$id)->select('CODE','CITY_NAME','AREA_NAME','PK_NO', 'IS_FEATURE')->first();
        return view('seeker.refund_request',compact('data'));
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
         return view('seeker.payment_history',compact('data'));
    }


    public function getVariants($id)
    {
        $data = Listings::where('PK_NO',$id)->first();
        $output = '';
        foreach ($data->getListingVariants as $item){
            $output.='
                <tr>
                  <td>'.$item->BEDROOM.' Bed</td>
                  <td>'.$item->BATHROOM.' Bath</td>
                  <td>'.$item->TOTAL_PRICE.'</td>
                </tr>
            ';
        }
        return response()->json($output);
    }


}
