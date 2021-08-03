<?php

namespace App\Http\Controllers\Admin;

use App\Models\Agent;
use App\Models\ListingPrice;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\AgentRequest;
use App\Repositories\Admin\Agent\AgentInterface;

class ListingPriceController extends BaseController
{
    protected $listing_price;

    public function __construct(ListingPrice $listing_price)
    {
        $this->listing_price    = $listing_price;
    }

    public function getIndex(Request $request)
    {
        $this->resp = $this->listing_price->getPaginatedList();
        return view('admin.listing_price.index')->withData($this->resp);
    }

    public function postUpdate(Request $request)
    {
        $this->resp = $this->listing_price->postUpdate($request);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }
}
