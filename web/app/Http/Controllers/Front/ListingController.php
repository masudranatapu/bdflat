<?php

namespace App\Http\Controllers\Front;
use Toastr;
use App\User;
use App\Models\Area;
use App\Models\City;
use App\Models\Listings;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\Models\PropertyFacing;
use App\Models\PropertyCondition;
use App\Models\PropertyListingType;
use App\Http\Controllers\Controller;
use App\Http\Requests\ListingsRequest;

class ListingController extends Controller
{
    protected $user;
    protected $listings;

    public function __construct(User $user,Listings $listings)
    {
        $this->middleware('auth');
        $this->userModel = $user;
        $this->listingsModel = $listings;
    }


    public function create(Request $request)
    {
        $data = array();
        $data['property_type'] = PropertyType::pluck('PROPERTY_TYPE', 'PK_NO');
        $data['city'] = City::pluck('CITY_NAME', 'PK_NO');
        $data['property_condition'] = PropertyCondition::where('IS_ACTIVE', 1)->pluck('PROD_CONDITION', 'PK_NO');
        $data['property_facing'] = PropertyFacing::where('IS_ACTIVE', 1)->pluck('TITLE', 'PK_NO');
        $data['property_listing_type'] = PropertyListingType::where('IS_ACTIVE', 1)->pluck('NAME', 'PK_NO');
        return view('owner.create_listings', compact('data'));
    }

    public function store(ListingsRequest $request)
    {
        $this->resp     = $this->listingsModel->store($request);
        $msg            = $this->resp->msg;
        $msg_title      = $this->resp->msg_title;
        Toastr::success($msg, $msg_title, ["positionClass" => "toast-top-right"]);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function addListingVariant(Request $request)
    {
        $data['html'] = view('owner._add_listing_variant')->render();
        return response()->json($data);
    }



}
