<?php

namespace App\Http\Controllers\Owner;

use App\Models\FloorList;
use App\Models\ListingAdditionalInfo;
use App\Models\ListingFeatures;
use App\Models\ListingImages;
use App\Models\ListingVariants;
use App\Models\NearBy;
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
    protected $resp;

    public function __construct(User $user, Listings $listings)
    {
        $this->middleware('auth');
        $this->user = $user;
        $this->listings = $listings;
    }


    public function create(Request $request)
    {
        $data = $this->listings->getCreate($request)->data;
        return view('listing.create_listings', compact('data'));
    }


    public function store(ListingsRequest $request)
    {
        $this->resp = $this->listings->store($request);
        $msg = $this->resp->msg;
        $msg_title = $this->resp->msg_title;
        Toastr::success($msg, $msg_title, ["positionClass" => "toast-top-right"]);
        return redirect()->route('owner-listings')->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function update(ListingsRequest $request,$id)
    {
        $this->resp = $this->listings->postUpdate($request,$id);
        $msg = $this->resp->msg;
        $msg_title = $this->resp->msg_title;
        Toastr::success($msg, $msg_title, ["positionClass" => "toast-top-right"]);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function delete($id)
    {
        $this->resp = $this->listings->postDelete($id);
        $msg = $this->resp->msg;
        $msg_title = $this->resp->msg_title;
        Toastr::success($msg, $msg_title, ["positionClass" => "toast-top-right"]);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function edit($id)
    {
        $data = $this->listings->getEdit($id)->data;
        return view('listing.edit_listings', compact('data'));
    }

    public function addListingVariant(Request $request)
    {
        $data['html'] = view('listing._add_listing_variant',compact('request'))->render();
        return response()->json($data);
    }
    public function addListingPhone(Request $request)
    {
        $data['html'] = view('listing._add_listing_variant_phone',compact('request'))->render();
        return response()->json($data);
    }

    public function getAvailableFloor()
    {
        return FloorList::pluck('NAME', 'PK_NO');
    }

    public function deleteListingImage($id)
    {
        $img = ListingImages::find($id);
        if (file_exists(public_path($img->IMAGE_PATH)) && file_exists(public_path($img->THUMB_PATH)) ) {
            unlink(public_path($img->IMAGE_PATH));
            unlink(public_path($img->THUMB_PATH));
            $img->delete();
            $data['success'] = 'Image Deleted';
        } else {
            $data['error'] = 'Something Wrong!';
        }
        return response()->json($data);
    }

    public function getPropertyType($id)
    {
        return PropertyType::where('PK_NO',$id)->first()->TYPE;
//        return response()->json($data);
    }

    public function pay($id)
    {
        $data['listing'] = $this->listings->getListing($id);
        return view('owner.pay', compact('data'));
    }

    public function payStore(Request $request, $id)
    {
        $this->resp = $this->listings->storePayment($id);
        if ($this->resp->status) {
            Toastr()->success($this->resp->msg);
        } else {
            Toastr()->error($this->resp->msg);
        }
        return redirect()->route($this->resp->redirect_to);
    }

}
