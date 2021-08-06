<?php

namespace App\Http\Controllers\Web;

use App\Traits;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Http\Controllers\BaseController;

class PaymentMethodController extends BaseController
{


    public function __construct()
    {

    }

    public function getIndex(Request $request) {
    	$data = [];
    	$data['rows'] = PaymentMethod::where('IS_ACTIVE',1)->get();
        return view('admin.web.payment_method.index',compact('data'));

    }


}

