<?php

namespace App\Http\Controllers\Admin;

use App\Models\Agent;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\CustomerRequest;
use App\Repositories\Admin\Customer\CustomerInterface;
use App\Models\Country;
use App\Models\City;
use App\Models\Division;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Validator;


class CustomerController extends BaseController
{
    protected $customer;
    protected $city;
    protected $division;

    public function __construct(CustomerInterface $customer, Customer $customermodel, Country $country, City $city, Division $division)
    {
        $this->customer        = $customer;
        $this->customermodel   = $customermodel;
        $this->country         = $country;
        $this->city            = $city;
        $this->division        = $division;
    }

    public function getIndex(Request $request)
    {
        $this->resp = $this->customer->getPaginatedList($request, 20);
        return view('admin.customer.index')->withRows($this->resp->data);
    }

    public function getCombo($type)
    {
        if ($type == 'agent') {
            $combo = $this->agent->getAgentComboCustomer();
        }elseif ($type == 'reseller') {
            $combo    = $this->reseller->getResellerComboCustomer();
        }else{
            $combo = [];
        }
        return response()->json($combo);

    }

    public function getCreate() {
        $data = array();
        $data['country'] = $this->country->getCountryCombo();

        return view('admin.customer.create', compact('data'));
    }

    public function postStore(CustomerRequest $request) {

        $this->resp = $this->customer->postStore($request);

        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getEdit($id)
    {
        $data                   = array();
        $this->resp             = $this->customer->getShow($id);
        $data['row']            = $this->resp->data;
        $data['city']           = $this->city->where('is_active',1)->get();
        $data['division']       = $this->division->where('is_active',1)->get();

        return view('admin.customer.edit', compact('data'));
    }

    public function postUpdate(CustomerRequest $request, $id)
    {
        $this->resp = $this->customer->postUpdate($request, $id);

        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getDelete($id)
    {
        $this->resp = $this->customer->delete($id);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }
    public function active($id)
    {
        $this->resp = $this->customer->active($id);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getView($id)
    {
        //$this->resp = $this->customer->getCusAdd($id);
        //$data['cus_info'] = $this->customer->getShow($id);

        return view('admin.customer.view');
    }
}

