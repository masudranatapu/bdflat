<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
use App\Package;
use DB;
use Auth;
use Toastr;

class PackageController extends Controller
{
    protected $package;
   
    public function __construct(Package $package)
    {
       $this->middleware('auth');
       $this->package = $package;
    }

   
    public function getPackages(Request $request)
    {
        $data = array();
        $data['rows'] = $this->package->getPackages(); 

        return view('package.index', compact('data'));
    }

    public function getFreePackage(Request $request)
    {
        DB::beginTransaction();
        
        try {

            $my_id =  Auth::user()->id;
            if(Auth::user()->package_id == 1){
                    DB::SELECT("update ss_customers set package_id = 2, package_start_date = CURRENT_DATE(), package_end_date = DATE_ADD(CURRENT_DATE(), INTERVAL 30 day) where ss_customers.id = $my_id ");
            }
        


        } catch (\Exception $e) {
            DB::rollback();

            Toastr::error('Failed to change package', 'Error', ["positionClass" => "toast-top-right"]);
            return redirect()->route('packages');
         
        }

            DB::commit(); 
            Toastr::success('Package changed successfully.', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->route('my-dashboard');
    }


    


    


     
}











