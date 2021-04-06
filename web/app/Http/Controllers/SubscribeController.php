<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\subscribeRequest;
use App\Subscribe;
use Toastr;

class SubscribeController extends Controller
{


    protected $subscribeModel;
    public function __construct(Subscribe $subscribeModel)
    {
       $this->subscribeModel = $subscribeModel;
    }
    //contact us
        public function subscribeUs(subscribeRequest $request)
        {
          
          $this->resp     = $this->subscribeModel->postSubscribe($request);
          $msg            = $this->resp->msg;
          $msg_title      = $this->resp->msg_title;
          Toastr::success($msg, $msg_title, ["positionClass" => "toast-top-right"]);
          return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
        }



    


     
}











