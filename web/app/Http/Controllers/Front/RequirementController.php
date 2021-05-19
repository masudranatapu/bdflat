<?php
namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequirementsRequest;
use App\Http\Requests\updateProfileRequest;
use App\Http\Requests\updatePasswordRequest;
use App\Models\ProductRequirements;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\User;
use Toastr;
use App\Product;
use Auth;



class RequirementController extends Controller
{
    protected $user;


    public function __construct(User $user,ProductRequirements $prd_requirements)
    {
        $this->middleware('auth');
        $this->userModel    = $user;
        $this->prdRequirementsModel    = $prd_requirements;

    }


    public function getMyRequirement(Request $request)
    {
        $data = array();
        $data['property_type'] = PropertyType::pluck('PROPERTY_TYPE', 'PK_NO');
        $data['row'] = ProductRequirements::where('CREATED_BY',Auth::user()->PK_NO)->first();
        return view('seeker.my_requirement',compact('data'));
    }

    public function storeOrUpdate(ProductRequirementsRequest $request)
    {
        $this->resp = $this->prdRequirementsModel->storeOrUpdate($request);
        $msg = $this->resp->msg;
        $msg_title = $this->resp->msg_title;
        Toastr::success($msg, $msg_title, ["positionClass" => "toast-top-right"]);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }
}
