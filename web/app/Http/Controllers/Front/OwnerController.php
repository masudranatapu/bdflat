<?php

namespace App\Http\Controllers\Front;

use App\Models\Area;
use App\Models\City;
use App\Models\ProductListing;
use App\Models\PropertyCondition;
use App\Models\PropertyFacing;
use App\Models\PropertyListingType;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Toastr;
use App\User;
use App\Product;
use Validator;
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
        $data['property_listing_type'] = PropertyListingType::where('IS_ACTIVE', 1)->pluck('NAME', 'PK_NO');
        return view('owner.new_properties', compact('data'));
    }

    public function storeNewProperties(Request $request)
    {
        $request->validate([
            'property_for' => 'required',
            'property_type' => 'required',
            'city' => 'required',
            'area' => 'required',
            'address' => 'required',
            'condition' => 'required',
            'property_price' => 'required',
            'contactPerson' => 'required',
            'mobileNum' => 'required',
            'listing_type' => 'required',
        ]);


        $city_name  = City::where('PK_NO',$request->city)->first()->CITY_NAME;
        $area_name  = Area::where('PK_NO',$request->area)->first()->AREA_NAME;
        $p_condition_name  = PropertyCondition::where('PK_NO',$request->condition)->first()->PROD_CONDITION;

        $user = new ProductListing();
        $user->PROPERTY_FOR = $request->property_for;
        $user->PROPERTY_TYPE = $request->property_type;
        $user->F_CITY_NO = $request->city;
        $user->CITY_NAME = $city_name;
        $user->F_AREA_NO = $request->area;
        $user->AREA_NAME = $area_name;
        $user->ADDRESS = $request->address;
        $user->PROPERTY_CONDITION = $request->condition;
        $user->PROPERTY_CONDITION = $p_condition_name;

//        $user->PROPERTY_SIZE = $request->size;
//        $user->BEDROOM = $request->bedroom;
//        $user->BATHROOM = $request->bathroom;
//        $user->TOTAL_PRICE = $request->price;

        $user->PRICE_TYPE = $request->property_price;
//        $user-> = $request->floor;
        $user->MOBILE1 = $request->mobileNum;
        $user->MOBILE2 = $request->mobileNum;

        $user->CREATED_AT = Carbon::now();
        $user->MODIFIED_AT = Carbon::now();
        $user->save();

        return redirect()->back()->with('success', 'Success');
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
