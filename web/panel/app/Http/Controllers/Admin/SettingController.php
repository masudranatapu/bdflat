<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Repositories\Admin\City\CityInterface;
use App\Http\Requests\Admin\CityRequest;
use App\Models\Country;
use App\Models\City;
use Illuminate\Http\Request;
use DB;

class SettingController extends BaseController
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

    public function getAboutUs()
    {
        $data           = array();
        //$this->resp     = $this->cityInt->getPaginatedList($request, 20);
        //$data['data']   = $this->resp->data;
        return view('admin.web.about',compact('data'));

    }

    public function getContactUs() {
        $data           = array();
        //$this->resp     = $this->cityInt->getPaginatedList($request, 20);
        //$data['data']   = $this->resp->data;
        return view('admin.web.contact',compact('data'));
    } 
    public function getTermsConditions() {
        $data           = array();
        //$this->resp     = $this->cityInt->getPaginatedList($request, 20);
        //$data['data']   = $this->resp->data;
        return view('admin.web.terms-conditions',compact('data'));
    }
    public function getPrivacyPolicy() {
        $data           = array();
        //$this->resp     = $this->cityInt->getPaginatedList($request, 20);
        //$data['data']   = $this->resp->data;
        return view('admin.web.privacy-policy',compact('data'));
    }
    public function getQuickRules() {
        $data           = array();
        //$this->resp     = $this->cityInt->getPaginatedList($request, 20);
        //$data['data']   = $this->resp->data;
        return view('admin.web.quick-rules',compact('data'));
    }
    public function gethowtoSellFast() {
        $data           = array();
        //$this->resp     = $this->cityInt->getPaginatedList($request, 20);
        //$data['data']   = $this->resp->data;
        return view('admin.web.how-to-sell',compact('data'));
    }
    public function getWhyMembership() {
        $data           = array();
        //$this->resp     = $this->cityInt->getPaginatedList($request, 20);
        //$data['data']   = $this->resp->data;
        return view('admin.web.why-membership',compact('data'));
    }
    
    public function getMailConfig() {
        $data           = array();
        //$this->resp     = $this->cityInt->getPaginatedList($request, 20);
        //$data['data']   = $this->resp->data;
        return view('admin.web.mail-config',compact('data'));
    }
    public function getFooter() {
        $data           = array();
        //$this->resp     = $this->cityInt->getPaginatedList($request, 20);
        //$data['data']   = $this->resp->data;
        return view('admin.web.footer',compact('data'));
    }
     public function getCopyRight() {
        $data           = array();
        //$this->resp     = $this->cityInt->getPaginatedList($request, 20);
        //$data['data']   = $this->resp->data;
        return view('admin.web.copy-right',compact('data'));
    }
  

    


}
