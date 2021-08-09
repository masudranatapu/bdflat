<?php

namespace App\Http\Controllers\Admin;

use App\Models\Agent;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\AgentRequest;
use App\Repositories\Admin\Agent\AgentInterface;

class AgentsController extends BaseController
{
    protected $agent;

    public function __construct(AgentInterface $agent, Agent $agentmodel)
    {
        $this->agent        = $agent;
        $this->agentmodel   = $agentmodel;
    }

    public function getIndex(Request $request)
    {
        /*$this->resp = $this->agent->getPaginatedList($request, 20);
        return view('admin.agent.index')->withRows($this->resp->data);*/
        return view('admin.agents.index');
    }

    public function getCreate() {
        return view('admin.agents.create');
    }

    public function postStore(AgentRequest $request) {

        $this->resp = $this->agent->postStore($request);

        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getEdit($id)
    {
        $agent    = Agent::find($id);
        $payment_method = PaymentMethod::orderBy('NAME')->pluck('NAME','PK_NO');

        if (!$agent) {
            return redirect()->route('admin.agent.list');
        }
        return view('admin.agents.edit')->withAgent($agent)->withPayment($payment_method);
    }

    public function postUpdate(AgentRequest $request, $id)
    {
        $this->resp = $this->agent->postUpdate($request, $id);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getDelete($id)
    {
        $this->resp = $this->agent->delete($id);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getEarnings($id)
    {
        return view('admin.agents.earnings');
    }

    public function getWithdrawCredit()
    {
        $data = [];
        $data['payment_method'] = PaymentMethod::where('IS_ACTIVE',1)->pluck('NAME','PK_NO');
        return view('admin.agents.withdraw',compact('data'));
    }


}
