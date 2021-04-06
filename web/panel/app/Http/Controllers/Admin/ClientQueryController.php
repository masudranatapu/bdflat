<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Repositories\Admin\City\CityInterface;
use App\Http\Requests\Admin\CityRequest;
use App\Models\Country;
use App\Models\City;
use Illuminate\Http\Request;
use DB;

class ClientQueryController extends BaseController
{
    protected $cityInt;
    protected $city;
    protected $country;

    public function __construct(CityInterface $cityInt, Country $country, City $city)
    {
        $this->cityInt     = $cityInt;
        $this->city     = $city;
        $this->country  = $country;
    }

    public function getIndex() {
        $data           = array();
        //$this->resp     = $this->cityInt->getPaginatedList($request, 20);
        //$data['data']   = $this->resp->data;
        return view('admin.client-query.index',compact('data'));
    }
    public function getView() {
        $data           = array();
        //$this->resp     = $this->cityInt->getPaginatedList($request, 20);
        //$data['data']   = $this->resp->data;
        return view('admin.client-query.view',compact('data'));
    }
    public function getReply() {
        $data           = array();
        //$this->resp     = $this->cityInt->getPaginatedList($request, 20);
        //$data['data']   = $this->resp->data;
        return view('admin.client-query.reply',compact('data'));
    }

   
    

    


}
