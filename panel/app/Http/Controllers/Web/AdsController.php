<?php

namespace App\Http\Controllers\Web;
use Auth;
use App\Models\Web\Ads;
use Illuminate\Http\Request;
use App\Models\Web\BlogCategory;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Repositories\Admin\Ads\AdsInterface;


class AdsController extends Controller
{

    protected $ads;

    public function __construct(AdsInterface $ads)
    {
        $this->ads     = $ads;
    }

    public function getIndex(Request $request){
        $this->resp = $this->ads->getPaginatedList($request);
        $data['rows'] = $this->resp->data;
        return view('admin.ads.index', compact('data'));
    }

     public function getAdsPosition(Request $request){
        $this->resp = $this->ads->getAdsPosition($request);
        $data['rows'] = $this->resp->data;
        return view('admin.ads.ad_position', compact('data'));
    }



}
