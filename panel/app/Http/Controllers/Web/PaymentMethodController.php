<?php

namespace App\Http\Controllers\Web;

use App\Traits;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Http\Controllers\BaseController;

class PaymentMethodController extends BaseController
{

    protected $payment_method;

    public function __construct(PaymentMethod $payment_method)
    {
        $this->payment_method     = $payment_method;
    }

    public function getIndex(Request $request) {
    	$data = [];
    	$data['rows'] = PaymentMethod::get();
        return view('admin.web.payment_method.index',compact('data'));
    }

    public function getCreate() {
        return view('admin.web.payment_method.create');
    }

    public function getEdit($id) {
        $data = [];
        $data['rows'] = PaymentMethod::where('PK_NO',$id)->first();
        return view('admin.web.payment_method.edit',compact('data'));
    }

    public function postStore(Request $request) {
        $this->resp = $this->payment_method->postStore($request);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function postUpdate(Request $request,$id) {
        $this->resp = $this->payment_method->postUpdate($request, $id);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }


}

