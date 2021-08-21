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
        $data['leftAd'] = $this->ads->getRandomAd(10)->first();
        $data['rightAd'] = $this->ads->getRandomAd(102)->first();
        $data['bottomAd'] = $this->ads->getRandomAd(101)->first();
        $data['bottomFeatureAds'] = $this->ads->getRandomAd(103, 3);
        $data['featuredProperties'] = $this->listings->getFeatureListings();
        return view('home.home', compact('data'));
    }
}
