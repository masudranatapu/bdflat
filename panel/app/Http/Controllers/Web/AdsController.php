<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\AdsPositionRequest;
use App\Http\Requests\AdsRequest;
use Auth;
use App\Models\Web\Ads;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Web\BlogCategory;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Repositories\Admin\Ads\AdsInterface;


class AdsController extends Controller
{

    protected $ads;
    protected $resp;

    public function __construct(AdsInterface $ads)
    {
        $this->ads = $ads;
    }

    public function getIndex(Request $request)
    {
        $this->resp = $this->ads->getPaginatedList($request);
        $data['rows'] = $this->resp->data;
        return view('admin.ads.index', compact('data'));
    }

    public function createAd(Request $request)
    {
        $data['positions'] = $this->ads->getAdsPositions($request)->data->pluck('NAME', 'PK_NO');
        return view('admin.ads.add_ad', compact('data'));
    }

    public function storeAd(AdsRequest $request): RedirectResponse
    {
        $this->resp = $this->ads->storeAd($request);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function editAd($id)
    {
        $data = $this->ads->editAd($id)->data;
        return view('admin.ads.edit_ad', compact('data'));
    }

    public function updateAd(AdsRequest $request, $id)
    {
        $this->resp = $this->ads->updateAd($request, $id);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    // Ads Position
    public function getAdsPosition(Request $request)
    {
        $this->resp = $this->ads->getAdsPositions($request);
        $data['rows'] = $this->resp->data;
        return view('admin.ads.ad_position', compact('data'));
    }

    public function createAdsPosition()
    {
        return view('admin.ads.add_ad_position');
    }

    public function storeAdsPosition(AdsPositionRequest $request): RedirectResponse
    {
        $this->resp = $this->ads->storeAdsPosition($request);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function editAdsPosition($id)
    {
        $data['position'] = $this->ads->getAdsPosition($id);
        return view('admin.ads.edit_ad_position', compact('data'));
    }

    public function updateAdsPosition(AdsPositionRequest $request, $id): RedirectResponse
    {
        $this->resp = $this->ads->updateAdsPosition($request, $id);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

}
