<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Repositories\Admin\Faq\FaqInterface;
use App\Http\Requests\Admin\FaqRequest;
use App\Models\Faq;
use Illuminate\Http\Request;
use DB;

class FaqController extends BaseController
{
    protected $faqInt;
    protected $faq;

    public function __construct(FaqInterface $faqInt, Faq $faq)
    {
        $this->faqInt  = $faqInt;
        $this->faq     = $faq;
    }



    public function getIndex(Request $request)
    {
        $this->resp     = $this->faqInt->getPaginatedList($request, 20);
        $data['data']   = $this->resp->data;
        return view('admin.faq.index', compact('data'));
    }

    public function getCreate() {
        return view('admin.faq.create');
    }

    public function postStore(FaqRequest $request) {

        $this->resp = $this->faqInt->postStore($request);

        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

     public function getEdit(Request $request, $id){
        
        $data                   = array();
        $this->resp             = $this->faqInt->findOrThrowException($id);
        $data['data']           = $this->resp->data;
        return view('admin.faq.edit', compact('data'));

     }

    public function postUpdate(FaqRequest $request, $id)
    {
        //dd($id);
        $this->resp = $this->faqInt->postUpdate($request, $id);
        //dd($this->resp->data);

        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }


    public function getView($id)
    {
        $data                   = array();
        $this->resp             = $this->faqInt->findOrThrowException($id);
        $data['data']           = $this->resp->data;
        return view('admin.faq.view', compact('data'));
    }

    public function getDelete($id)
    {
        $this->resp = $this->faqInt->delete($id);

        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

   


}
