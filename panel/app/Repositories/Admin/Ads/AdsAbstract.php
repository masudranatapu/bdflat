<?php
namespace App\Repositories\Admin\Ads;

use Illuminate\Support\Facades\DB;
use App\Models\Auth;
use App\Models\Web\Ads;
use App\Models\Web\AdsPosition;
use App\Models\UserGroup;
use App\Traits\RepoResponse;
use App\Models\AccountSource;
use App\Models\AuthUserGroup;
use App\Models\AdminUser as User;
use Illuminate\Support\Facades\Hash;

class AdsAbstract implements AdsInterface
{
    use RepoResponse;

    protected $ads;
    protected $adsPosition;

    public function __construct(Ads $ads,AdsPosition $adsPosition)
    {
        $this->ads = $ads;
        $this->adsPosition = $adsPosition;
    }

    public function getPaginatedList($request): object
    {
        $data = $this->ads->orderBy('PK_NO', 'ASC')->get();
        return $this->formatResponse(true, '', 'web.ads', $data);
    }

    public function storeAd($request): object
    {
        $status = false;
        $msg = 'Ad could not be added!';

        DB::beginTransaction();
        try {
            $ad = new Ads();
            $ad->F_AD_POSITION_NO = $request->position;
            $ad->AVAILABLE_TO = date('Y-m-d', strtotime($request->end_date));
            $ad->AVAILABLE_FROM = date('Y-m-d', strtotime($request->start_date));
            $ad->STATUS = $request->status;
            $ad->save();

            $status = true;
            $msg = 'Add added successfully!';
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

        DB::commit();
        return $this->formatResponse($status, $msg, 'web.ads');
    }

    public function editAd($id): object
    {
        $data['positions'] = $this->adsPosition->orderBy('PK_NO', 'ASC')->pluck('NAME', 'PK_NO');
        $data['ad'] = $this->ads->find($id);
        return $this->formatResponse(true, '', 'web.ads', $data);
    }

    public function updateAd($request, $id): object
    {
        $status = false;
        $msg = 'Ad could not be updated!';

        DB::beginTransaction();
        try {
            $ad = Ads::find($id);
            $ad->F_AD_POSITION_NO = $request->position;
            $ad->AVAILABLE_TO = date('Y-m-d', strtotime($request->end_date));
            $ad->AVAILABLE_FROM = date('Y-m-d', strtotime($request->start_date));
            $ad->STATUS = $request->status;
            $ad->save();

            $status = true;
            $msg = 'Add updated successfully!';
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

        DB::commit();
        return $this->formatResponse($status, $msg, 'web.ads');
    }

    public function getAdsPositions($request): object
    {
        $data = $this->adsPosition->orderBy('PK_NO', 'ASC')->get();
        return $this->formatResponse(true, '', 'web.ads_position', $data);
    }

    public function getAdsPosition(int $id)
    {
        return AdsPosition::find($id);
    }

    public function storeAdsPosition($request): object
    {
        $status = false;
        $msg = 'Could not add ads position!';

        DB::beginTransaction();
        try {
            $adsPosition = new AdsPosition();
            $adsPosition->NAME = $request->name;
            $adsPosition->POSITION_ID = $request->position;
            $adsPosition->IS_ACTIVE = $request->status;
            $adsPosition->save();

            $status = true;
            $msg = 'Ads position added';
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

        DB::commit();
        return $this->formatResponse($status, $msg, 'web.ads_position');
    }

    public function updateAdsPosition($request, $id): object
    {
        $status = false;
        $msg = 'Could not update ads position!';

        DB::beginTransaction();
        try {
            $adsPosition = $this->getAdsPosition($id);
            $adsPosition->NAME = $request->name;
            $adsPosition->POSITION_ID = $request->position;
            $adsPosition->IS_ACTIVE = $request->status;
            $adsPosition->save();

            $status = true;
            $msg = 'Ads position updated';
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

        DB::commit();
        return $this->formatResponse($status, $msg, 'web.ads_position');
    }

}
