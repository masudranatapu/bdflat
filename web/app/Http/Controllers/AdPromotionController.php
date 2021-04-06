<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Traits\RepoResponse;
use App\City;
use App\User;
use App\Product;
use App\Promotion;
use Toastr;
use Auth;

class AdPromotionController extends Controller
{
    use RepoResponse;

    protected $city;
    protected $user;
    protected $prodModel;

    public function __construct(City $city, User $user, Product $prodModel)
    {
        $this->middleware('auth');
        $this->city         = $city;
        $this->userModel    = $user;
        $this->prodModel    = $prodModel;
          
    }

   
    public function getPromoteAd($id)
    {
        $data               = array();
        $data['row']        = Product::where('pk_no',$id)->where('customer_pk_no',Auth::user()->id)->first(); 
        $data['promotions'] = Promotion::where('is_active',1)->orderBy('pk_no','ASC')->get();
        $date1 = date('d-m-Y',strtotime(Auth::user()->created_at));
        $date2 = date('d-m-Y');
        $data['day_diff_with_regi'] = (int) $this->dateDiffInDays($date1,$date2);

        return view('promotion.promote_ad',compact('data'));
    }


    
    public function getpromotedAds(Request $request)
    {
        $data                   = array();
        $data['promoted_ads']   = $this->prodModel->getpromotedAds(); 
        return view('promotion.promoted_ads', compact('data'));
    }

    public function getAdsPromotion(Request $request)
    {
        return view('promotion.promoted_ads');
    }
    
}
