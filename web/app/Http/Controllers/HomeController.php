<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Listings;
use App\Models\Newsletter;
use App\Models\Owner;
use App\Models\PageCategory;
use App\Models\PropertyCondition;
use App\Models\PropertyType;
use App\Models\Slider;
use App\Models\WebAds;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    protected $ads;
    protected $listings;
    protected $slider;
    protected $propertyType;
    protected $city;
    protected $pageCategory;
    protected $owner;
    protected $propertyCondition;

    public function __construct(
        Slider $slider,
        PropertyType $propertyType,
        WebAds $ads,
        Listings $listings,
        City $city,
        PageCategory $pageCategory,
        Owner $owner,
        PropertyCondition $propertyCondition
    )
    {
        $this->slider = $slider;
        $this->propertyType = $propertyType;
        $this->ads = $ads;
        $this->listings = $listings;
        $this->city = $city;
        $this->pageCategory = $pageCategory;
        $this->owner = $owner;
        $this->propertyCondition = $propertyCondition;
    }

    public function index()
    {
        $data['sliders'] = $this->slider->getSliders();
        $data['categories'] = $this->propertyType->getPropertyTypes();
        $data['leftAd'] = $this->ads->getRandomAd(10);
        $data['rightAd'] = $this->ads->getRandomAd(102);
        $data['bottomAd'] = $this->ads->getRandomAd(101);
        $data['bottomFeatureAdLeft'] = $this->ads->getRandomAd(103);
        $data['bottomFeatureAdCenter'] = $this->ads->getRandomAd(104);
        $data['bottomFeatureAdRight'] = $this->ads->getRandomAd(105);
        $data['featuredProperties'] = $this->listings->getFeatureListings();
        $data['verifiedProperties'] = $this->listings->getVerifiedListings();
        $data['verifiedBottomAd'] = $this->ads->getRandomAd(106);
        $data['sellProperties'] = $this->listings->getListings('sell');
        $data['rentProperties'] = $this->listings->getListings('rent');
        $data['roommateProperties'] = $this->listings->getListings('roommate');
        $data['popularCities'] = $this->city->getPopularCities();
        $data['sellPageCategories'] = $this->pageCategory->getPageCategories('sell');
        $data['hasSellPageCategories'] = $this->isAvailable($data['sellPageCategories']);
        $data['rentPageCategories'] = $this->pageCategory->getPageCategories('rent');
        $data['hasRentPageCategories'] = $this->isAvailable($data['rentPageCategories']);
        $data['roommatePageCategories'] = $this->pageCategory->getPageCategories('roommate');
        $data['hasRoommatePageCategories'] = $this->isAvailable($data['roommatePageCategories']);
        $data['featuredDevelopers'] = $this->owner->getFeatured(3);
        $data['featuredAgencies'] = $this->owner->getFeatured(4);
//        dd($data['verifiedProperties']);
        return view('home.home', compact('data'));
    }

    public function owner($slug)
    {
        $days = [
            0 => 'Sun',
            1 => 'Mon',
            2 => 'Tue',
            3 => 'Wed',
            4 => 'Thu',
            5 => 'Fri',
            6 => 'Sat'
        ];
        $data['owner'] = $this->owner->getOwner($slug);
        $data['open'] = in_array(Carbon::now()->dayOfWeek, $days);
        $start = Carbon::createFromFormat('H:i', $data['owner']->info->SHOP_OPEN_TIME ?? '12:00');
        $end = Carbon::createFromFormat('H:i', $data['owner']->info->SHOP_CLOSE_TIME ?? '12:00');
        $data['open'] &= Carbon::now()->between($start, $end, true);
        return view('page.owner', compact('data'));
    }

    public function properties(Request $request)
    {
        $data['listings'] = $this->listings->getProperties($request);
        $data['listings']->appends($request->except('page'));
        $data['categories'] = $this->propertyType->getPropertyTypes();
        $data['conditions'] = $this->propertyCondition->getConditions();
        return view('page.properties', compact('data'));
    }

    public function details($slug)
    {
        $data['listing'] = $this->listings->getListingDetails($slug);
        $data['features'] = $this->listings->getListingFeatures($data['listing']->additionalInfo->F_FEATURE_NOS);
        $data['similarListings'] = $this->listings->getSimilarListings($data['listing']->PROPERTY_FOR, $data['listing']->PK_NO);
        $data['rightAd'] = $this->ads->getRandomAd(200);
        return view('page.details', compact('data'));
    }

    public function storeNewsLetter(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'email' => 'required|email|unique:WEB_NEWSLETTER,EMAIL',
            ]);

            $news = new Newsletter();
            $news->EMAIL = $request->get('email');
            $news->CREATED_ON = date('Y-m-d H:i:s');
            $news->save();

            Toastr()->success('Thank you for subscription!');
        } catch (\Exception $e) {
            Toastr()->error('Subscription unsuccessful!');
            DB::rollBack();
        }

        DB::commit();
        return back();
    }

    private function isAvailable($categories): bool
    {
        foreach ($categories as $category) {
            if ($category->pages && count($category->pages)) {
                return true;
            }
        }
        return false;
    }
}
