<?php

namespace App\Http\Controllers\Front;

use App\Models\Area;
use App\Models\City;
use App\Models\PropertyCondition;
use App\Models\PropertyFacing;
use Auth;
use Toastr;
use App\User;
use App\Product;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\updateProfileRequest;
use App\Http\Requests\updatePasswordRequest;

class OwnerController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->middleware('auth');
        $this->userModel = $user;
    }

    public function getOwnerBuyLeads(Request $request)
    {
        $data = array();
        return view('owner.buy_leads', compact('data'));
    }

    public function getOwnerProperties(Request $request)
    {
        $data = array();
        return view('owner.owner_properties', compact('data'));
    }

    public function getNewProperties(Request $request)
    {
        $data = array();
        $data['property_type'] = PropertyType::pluck('PROPERTY_TYPE', 'PK_NO');
        $data['city'] = City::pluck('CITY_NAME', 'PK_NO');
        $data['property_condition'] = PropertyCondition::where('IS_ACTIVE', 1)->pluck('PROD_CONDITION', 'PK_NO');
        $data['property_facing'] = PropertyFacing::where('IS_ACTIVE', 1)->pluck('TITLE', 'PK_NO');
        return view('owner.new_properties', compact('data'));
    }

    public function getOwnerLeads(Request $request)
    {
        $data = array();
        return view('owner.leads', compact('data'));
    }

    public function getArea($id)
    {
        $data['area'] = Area::where('F_CITY_NO', $id)->pluck('AREA_NAME', 'PK_NO');
        return response()->json($data);
    }

    public function addSize(Request $request)
    {
        $data['html'] = view('owner.add_size')->render();
        return response()->json($data);
    }

}
