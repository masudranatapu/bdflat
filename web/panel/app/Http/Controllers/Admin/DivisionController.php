<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\Country;
use App\Models\Division;
use Illuminate\Http\Request;
use DB;

class DivisionController extends BaseController
{
    protected $country;

    public function __construct(Country $country)
    {
        $this->country  = $country;
    }

    public function getIndex(Request $request)
    {
        $data           = array();
        $data['data']   = Division::where('is_active',1)->orderBy('order_id','ASC')->get();
        return view('admin.division.index',compact('data'));

    }

    

}
