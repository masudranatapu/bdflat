<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Repositories\Admin\City\CityInterface;
use App\Http\Requests\Admin\CityRequest;
use App\Models\Country;
use App\Models\City;
use Illuminate\Http\Request;
use DB;

class CityController extends BaseController
{
    protected $cityInt;
    protected $city;
    protected $country;

    public function __construct(CityInterface $cityInt, Country $country, City $city)
    {
        $this->cityInt  = $cityInt;
        $this->city     = $city;
        $this->country  = $country;
    }

    public function getIndex(Request $request)
    {
        $data           = array();
        $this->resp     = $this->cityInt->getPaginatedList($request, 20);
        $data['data']   = $this->resp->data;
        return view('admin.city.index',compact('data'));

    }

    public function getCreate() {
        $data                   = array();
        $data['country_combo']  = $this->country->getCountryCombo();
        return view('admin.city.create',compact('data'));
    }

    public function postStore(CityRequest $request) {

        $this->resp = $this->cityInt->postStore($request);

        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function postEdit(Request $request, $id){

        $this->resp = $this->cityInt->findOrThrowException($id);
        //dd($this->resp->data);
        return view('admin.city.edit')->withBrand($this->resp->data);

    }

    public function postUpdate(CityRequest $request, $id)
    {
        //dd($id);
        $this->resp = $this->cityInt->postUpdate($request, $id);
        //dd($this->resp->data);

        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getDelete($id)
    {
        $this->resp = $this->cityInt->delete($id);

        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getAreaByLocation($cityOrDivision, $cityOrDivisionId)
    {
        $areas = $this->city->getAreaByLocation($cityOrDivision, $cityOrDivisionId);
        return response()->json($areas);
    }


}
