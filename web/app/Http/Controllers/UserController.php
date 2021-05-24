<?php
namespace App\Http\Controllers;
use App\Http\Requests\updateProfileRequest;
use App\Http\Requests\updatePasswordRequest;
use Illuminate\Http\Request;
use App\User;
use Toastr;
use App\Product;
use Auth;

class UserController extends Controller
{
    protected $user;


    public function __construct(User $user)
    {
        $this->middleware('auth');
        $this->userModel    = $user;

    }

    public function getMyAccount(Request $request)
    {
        $user_id = Auth::user()->PK_NO;
        $user_type = Auth::user()->USER_TYPE;
        $data = array();
        if($user_type == 1){
            $view = 'seeker.my_account';
        }elseif($user_type == 2){
            $view = 'owner.my_account';
        }else{
            $view = 'users.my_account';
        }
        //$data['city_combo'] = $this->city->getCityCombo();
        return view($view,compact('data'));
    }

    public function getEditProfile(Request $request)
    {
        $user_id = Auth::user()->PK_NO;
        $user_type = Auth::user()->USER_TYPE;
        $data = array();
        if($user_type == 1){
            $view = 'seeker.edit_profile';
        }else{
            $view = 'users.edit_profile';
        }
        //$data['city_combo'] = $this->city->getCityCombo();
        return view($view,compact('data'));
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
        //$data['city_combo'] = $this->city->getCityCombo();
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
    public function getRefundRequest(Request $request)
    {
         $data = array();
        //$data['city_combo'] = $this->city->getCityCombo();
        return view('seeker.refund_request',compact('data'));
    }



}
