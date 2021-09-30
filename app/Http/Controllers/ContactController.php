<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\contactRequest;
use App\Contact;
use Toastr;

class ContactController extends Controller
{


    protected $contactModel;
    public function __construct(Contact $contactModel)
    {
       $this->contactModel = $contactModel;
    }
    //contact us
        public function contactUs(contactRequest $request)
        {
          if ($request->capt != $request->randtotal)
          {
            Toastr::error('Summation result is wrong !!', 'Error', ["positionClass" => "toast-top-right"]);
            return redirect()->back()->withInput();
          }

          $this->resp     = $this->contactModel->postContact($request);
          $msg            = $this->resp->msg;
          $msg_title      = $this->resp->msg_title;
          Toastr::success($msg, $msg_title, ["positionClass" => "toast-top-right"]);
          return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
        }
     
}











