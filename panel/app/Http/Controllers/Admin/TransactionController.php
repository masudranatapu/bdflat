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
        $data['transactions'] = $this->paymentCustomer->getTransactions($date_from, $date_to, $type);
//        dd($data);
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

    public function getRefundRequest()
    {
        return view('admin.transaction.refund_request');
    }

    public function getRechargeRequest()
    {
        return view('admin.transaction.recharge_request');
    }

    public function getAgentCommission()
    {
        return view('admin.transaction.agent_commission');
    }


}
