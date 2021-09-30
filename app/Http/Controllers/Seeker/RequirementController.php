<?php
namespace App\Http\Controllers\Seeker;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequirementsRequest;
use App\Http\Requests\updateProfileRequest;
use App\Http\Requests\updatePasswordRequest;
use App\Models\Area;
use App\Models\City;
use App\Models\ProductRequirements;
use App\Models\PropertyCondition;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\User;
use Toastr;
use App\Product;
use Auth;



class RequirementController extends Controller
{
    protected $userModel;
    protected $prdRequirementsModel;


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
        $data['row'] = ProductRequirements::where('CREATED_BY',Auth::user()->PK_NO)->orderByDesc('PK_NO')->first();
//        $data['city'] = City::select('CITY_NAME', 'PK_NO')->get(); // Previous modal version
        $data['city'] = City::orderByDesc('ORDER_ID')->pluck('CITY_NAME', 'PK_NO');
        $data['cond'] = PropertyCondition::where('IS_ACTIVE', '=', 1)
            ->orderByDesc('ORDER_ID')
            ->pluck('PROD_CONDITION', 'PK_NO');
        if($data['row'] && $data['row']->F_CITY_NO ){
            $data['areas'] = Area::where('F_CITY_NO', 1)->orderByDesc('ORDER_ID')->pluck('AREA_NAME', 'PK_NO');
        }
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

    public function getArea($id)
    {
        $html = Area::where('F_CITY_NO', $id)->pluck('AREA_NAME', 'PK_NO');
        if($html){
            return response()->json(['html' => $html, 'status' => 'success']);
        }else{
            return response()->json(['html' => [], 'status' => 'faild']);
        }

    }
}
