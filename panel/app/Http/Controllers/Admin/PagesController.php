<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;


class PagesController extends BaseController
{
    public function __construct()
    {

    }

    public function getIndex(Request $request)
    {
        return view('admin.pages.index');
    }

    public function getCreate()
    {
        return view('admin.pages.create');
    }

    public function getEdit($request)
    {
        return view('admin.pages.create');
    }

    public function postStore() {

    }
    public function postUpdate() {

    }






}
