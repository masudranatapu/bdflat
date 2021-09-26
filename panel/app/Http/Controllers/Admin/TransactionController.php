<?php

namespace App\Http\Controllers\Admin;

use App\Models\PaymentCustomer;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class TransactionController extends BaseController
{
    protected $paymentCustomer;

    public function __construct(PaymentCustomer $paymentCustomer)
    {
        parent::__construct();
        $this->paymentCustomer = $paymentCustomer;
    }

    public function getIndex(Request $request)
    {
        $date_from = $request->query->get('from_date');
        $date_to = $request->query->get('to_date');
        $type = $request->query->get('transaction_type');
        $data['rows'] = $this->paymentCustomer->getTransactions($date_from, $date_to, $type);
        return view('admin.transaction.index', compact('data'));
    }

    public function getCreate()
    {
        return view('admin.transaction.create');
    }

    public function getEdit($request)
    {
        return view('admin.transaction.create');
    }

    public function postStore()
    {

    }

    public function postUpdate()
    {

    }

    public function getRefundRequest(Request $request)
    {
        $data['rows'] = $this->paymentCustomer->getRefundRequest($request);
        return view('admin.transaction.refund_request', compact('data'));
    }

    public function getRechargeRequest(Request $request)
    {
        $data['rows'] = $this->paymentCustomer->getRechargeRequest($request);
        return view('admin.transaction.recharge_request', compact('data'));
    }

    public function getAgentCommission()
    {
        return view('admin.transaction.agent_commission');
    }


}
