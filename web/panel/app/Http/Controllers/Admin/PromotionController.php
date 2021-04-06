<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\Promotion;
use App\Models\PromotionDetails;
use App\Repositories\Admin\Promotion\PromotionInterface;
use DB;

class PromotionController extends BaseController
{
    protected $promotion;
    protected $promotionDetails;
    protected $promotionInt;
 

    public function __construct(Promotion $promotion, PromotionDetails $promotionDetails, PromotionInterface $promotionInt)
    {
        $this->promotion            = $promotion;
        $this->promotionDetails     = $promotionDetails;
        $this->promotionInt         = $promotionInt; 

    }

    //get package index
    public function getIndex(Request $request)
    {
        $data           = array();
        $data['rows'] = $this->promotionDetails->get();
     
        return view('admin.promotion.index', compact('data'));
    }

    public function getCreate() {
        $data                   = array();
        return view('admin.promotion.create',compact('data'));
    }

    // public function getView($id) {
    //     $data                   = array();

    //     return view('admin.promotion.view',compact('data'));
    // }
    
    public function getEdit($id) {
        $data                   = array();
        $data['row']  = $this->promotionDetails->where('pk_no',$id)->first();
        return view('admin.promotion.edit',compact('data'));
    }

/*
    public function postStore(CityRequest $request) {

        $this->resp = $this->cityInt->postStore($request);

        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function postEdit(Request $request, $id){

        $this->resp = $this->cityInt->findOrThrowException($id);
        return view('admin.city.edit')->withBrand($this->resp->data);

    } */

    public function postUpdate(Request $request, $id)
    {
    
        $this->resp = $this->promotionInt->postUpdate($request, $id);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }
/*
    public function getDelete($id)
    {
        $this->resp = $this->cityInt->delete($id);

        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getAreaByLocation($cityOrDivision, $cityOrDivisionId)
    {
        $areas = $this->city->getAreaByLocation($cityOrDivision, $cityOrDivisionId);
        return response()->json($areas);
    } */


}
