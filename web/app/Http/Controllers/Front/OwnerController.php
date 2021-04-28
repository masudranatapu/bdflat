<?php
namespace App\Http\Controllers\Front;
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
        $this->userModel    = $user;
    }

    public function getOwnerBuyLeads(Request $request)
    {
        $data = array();
        return view('owner.buy_leads',compact('data'));
    }
    public function getOwnerProperties(Request $request)
    {
        $data = array();
        return view('owner.owner_properties',compact('data'));
    }
    public function getNewProperties(Request $request)
    {
        $data = array();
        $data['property_type'] = PropertyType::pluck('PROPERTY_TYPE','PK_NO');
        return view('owner.new_properties',compact('data'));
    }
    public function getOwnerLeads(Request $request)
    {
        $data = array();
        return view('owner.leads',compact('data'));
    }


}
