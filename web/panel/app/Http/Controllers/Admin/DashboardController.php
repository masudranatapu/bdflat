<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function __construct()
    {

    }

    public function getIndex() {
        return view('admin.dashboard.index');
    }

    public function homepage() {
        return view('admin.dashboard.home');
    }
}
