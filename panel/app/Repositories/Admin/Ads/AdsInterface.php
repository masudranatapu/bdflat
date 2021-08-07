<?php

namespace App\Repositories\Admin\Ads;

interface AdsInterface
{
    public function getPaginatedList($request);

    public function storeAd($request);

    public function editAd(int $id);

    public function updateAd($request, int $id);

    public function getAdsPositions($request);

    public function getAdsPosition(int $id);

    public function storeAdsPosition($request);

    public function updateAdsPosition($request, int $id);

}
