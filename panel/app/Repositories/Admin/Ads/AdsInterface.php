<?php

namespace App\Repositories\Admin\Ads;

interface AdsInterface
{
    public function getPaginatedList($request);
    public function getAdsPosition($request);

}
