<?php
namespace App\Repositories\Admin\Ads;

use DB;
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

    public function getPaginatedList($request)
    {
        $data = $this->ads->where('IS_ACTIVE',1)->orderBy('PK_NO', 'ASC')->get();
        return $this->formatResponse(true, '', 'web.ads', $data);
    }

    public function getAdsPosition($request)
    {
        $data = $this->adsPosition->where('IS_ACTIVE',1)->orderBy('PK_NO', 'ASC')->get();
        return $this->formatResponse(true, '', 'web.ads_position', $data);
    }


}
