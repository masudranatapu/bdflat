<?php

namespace App\Http\Controllers;

use App\Models\PropertyType;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $slider;
    protected $propertyType;

    public function __construct(Slider $slider, PropertyType $propertyType)
    {
        $this->slider = $slider;
        $this->propertyType = $propertyType;
    }

    public function index()
    {
        $data['sliders'] = $this->slider->getSliders();
        $data['categories'] = $this->propertyType->getPropertyTypes();
        return view('home.home', compact('data'));
    }
}
