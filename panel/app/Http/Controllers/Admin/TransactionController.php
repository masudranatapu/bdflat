<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;


class TransactionController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getIndex(Request $request)
    {
        return view('admin.transaction.index');
    }

    public function getCreate()
    {
        return view('admin.transaction.create');
    }

    public function getEdit($request)
    {
        return view('admin.transaction.create');
    }

    public function postStore() {

    }
    public function postUpdate() {

    }

    public function getRefundRequest() {
        return view('admin.transaction.refund_request');
    }

    public function getRechargeRequest() {
        return view('admin.transaction.recharge_request');
    }

    public function getAgentCommission() {
        return view('admin.transaction.agent_commission');
    }




}
