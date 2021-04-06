<?php
namespace App\Repositories\Admin\Promotion;

use App\Models\Promotion;
use App\Models\PromotionDetails;
use App\Traits\RepoResponse;
use DB;

class PromotionAbstract implements PromotionInterface
{
    use RepoResponse;

    protected $promotion;
    protected $promotionDetails;

    public function __construct(Promotion $promotion, PromotionDetails $promotionDetails)
    {
        $this->promotion = $promotion;
        $this->promotionDetails = $promotionDetails;
    }

    

 
   
    public function postUpdate($request, int $id)
    {
        DB::beginTransaction();

        try {
            $promo              = $this->promotionDetails->where('pk_no', $id)->first();
            $promo->day_limit   = $request->day;
            $promo->price       = $request->price;
            $promo->update();

        } catch (\Exception $e) {
            DB::rollback();

            return $this->formatResponse(false, 'Unable to update promotion !', 'admin.promotion.list');
        }

        DB::commit();

        return $this->formatResponse(true, 'Promotion has been updated successfully !', 'admin.promotion.list');
    }

    
    

}
