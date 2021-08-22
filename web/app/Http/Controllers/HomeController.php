<?php

namespace App\Http\Controllers;

use App\Models\Listings;
use App\Models\PropertyType;
use App\Models\Slider;
use App\Models\WebAds;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $ads;
    protected $listings;
    protected $slider;
    protected $propertyType;

    public function __construct(Slider $slider, PropertyType $propertyType, WebAds $ads, Listings $listings)
    {
        $this->slider = $slider;
        $this->propertyType = $propertyType;
        $this->ads = $ads;
        $this->listings = $listings;
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
//        dd($data['verifiedProperties']);
        return view('home.home', compact('data'));
    }
}
