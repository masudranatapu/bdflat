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
         $data = array();
        //$data['city_combo'] = $this->city->getCityCombo();
        return view('users.my_account',compact('data'));
    }
    public function getMyRequirement(Request $request)
    {
         $data = array();
        //$data['city_combo'] = $this->city->getCityCombo();
        return view('users.my_requirement',compact('data'));
    }
    public function getSuggestedProperties(Request $request)
    {
         $data = array();
        //$data['city_combo'] = $this->city->getCityCombo();
        return view('users.suggested_properties',compact('data'));
    }
    public function getVarifiedProperties(Request $request)
    {
         $data = array();
        //$data['city_combo'] = $this->city->getCityCombo();
        return view('users.varified_properties',compact('data'));
    }
    public function getContactedProperties(Request $request)
    {
         $data = array();
        //$data['city_combo'] = $this->city->getCityCombo();
        return view('users.contacted_properties',compact('data'));
    }
    public function getBrowsedProperties(Request $request)
    {
         $data = array();
        //$data['city_combo'] = $this->city->getCityCombo();
        return view('users.browsed_properties',compact('data'));
    }
    public function getRechargeBalance(Request $request)
    {
         $data = array();
        //$data['city_combo'] = $this->city->getCityCombo();
        return view('users.recharge_balance',compact('data'));
    }

   
}
