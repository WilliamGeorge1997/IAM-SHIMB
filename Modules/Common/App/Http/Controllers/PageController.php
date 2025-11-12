<?php

namespace Modules\Common\App\Http\Controllers;

use App\Http\Controllers\Controller;

class PageController extends Controller
{

    public function index()
    {
        return view('common::pages.index');
    }

    public function about()
    {
        return view('common::pages.about');
    }
}
