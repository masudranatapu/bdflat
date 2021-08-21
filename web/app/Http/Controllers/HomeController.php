<?php

namespace App\Http\Controllers;

use App\Models\PropertyType;
use App\Models\Slider;
use App\Models\WebAds;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $ads;
    protected $slider;
    protected $propertyType;

    public function __construct(Slider $slider, PropertyType $propertyType, WebAds $ads)
    {
        $this->slider = $slider;
        $this->propertyType = $propertyType;
        $this->ads = $ads;
    }

    public function index()
    {
        $data['sliders'] = $this->slider->getSliders();
        $data['categories'] = $this->propertyType->getPropertyTypes();
        $data['leftAd'] = $this->ads->getRandomAd(10);
        $data['rightAd'] = $this->ads->getRandomAd(102);
        $data['bottomAd'] = $this->ads->getRandomAd(101);
        return view('home.home', compact('data'));
    }
}
