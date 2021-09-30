<?php

namespace App\Http\Controllers;

use App\Http\Requests\contactRequest;
use App\Http\Requests\ProductRequirementsRequest;
use App\Models\AboutUs;
use App\Models\Area;
use App\Models\City;
use App\Models\ContactForm;
use App\Models\CustomerPayment;
use App\Models\Listings;
use App\Models\ProductRequirements;
use App\Models\PropertyType;
use App\Models\TeamMember;
use App\Models\Testimonials;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Toastr;
class CommonUserController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
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
        return view('seeker.recharge_balance', compact('data'));
    }



}











