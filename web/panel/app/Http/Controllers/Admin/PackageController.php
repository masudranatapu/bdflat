<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Repositories\Admin\Package\PackageInterface;
use App\Http\Requests\Admin\CityRequest;
use App\Models\Country;
use App\Models\City;
use Illuminate\Http\Request;
use DB;

class PackageController extends BaseController
{
    protected $packageInt;


    public function __construct(PackageInterface $packageInt)
    {
        $this->packageInt     = $packageInt;

    }

    //get package index
    public function getIndex(Request $request)
    {
        $data           = array();
        $this->resp     = $this->packageInt->getPaginatedList($request);
        $data['rows']    = $this->resp->data;
        // dd($data);
        return view('admin.package.index', compact('data'));
    }

    public function getCreate() {
        $data                   = array();
        //$data['country_combo']  = $this->country->getCountryCombo();
        return view('admin.package.create',compact('data'));
    }
    public function getView($id) {
        $data                   = array();
        //$data['country_combo']  = $this->country->getCountryCombo();
        return view('admin.package.view',compact('data'));
    }
    public function getEdit($id) {
        $data                   = array();
        //$data['country_combo']  = $this->country->getCountryCombo();
        return view('admin.package.edit',compact('data'));
    }

    public function postStore(CityRequest $request) {

        $this->resp = $this->packageInt->postStore($request);

        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function postEdit(Request $request, $id){

        $this->resp = $this->packageInt->findOrThrowException($id);
        //dd($this->resp->data);
        return view('admin.city.edit')->withBrand($this->resp->data);

    }

    public function postUpdate(CityRequest $request, $id)
    {
        //dd($id);
        $this->resp = $this->packageInt->postUpdate($request, $id);
        //dd($this->resp->data);

        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getDelete($id)
    {
        $this->resp = $this->packageInt->delete($id);

        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getAreaByLocation($cityOrDivision, $cityOrDivisionId)
    {
        $areas = $this->city->getAreaByLocation($cityOrDivision, $cityOrDivisionId);
        return response()->json($areas);
    }


}
