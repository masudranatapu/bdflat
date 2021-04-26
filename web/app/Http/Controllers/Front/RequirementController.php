<?php
namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Http\Requests\updateProfileRequest;
use App\Http\Requests\updatePasswordRequest;
use Illuminate\Http\Request;
use App\User;
use Toastr;
use App\Product;
use Auth;



class RequirementController extends Controller
{
    protected $user;


    public function __construct(User $user)
    {
        $this->middleware('auth');
        $this->userModel    = $user;

    }


    public function getMyRequirement(Request $request)
    {
         $data = array();
        return view('seeker.my_requirement',compact('data'));
    }



}
