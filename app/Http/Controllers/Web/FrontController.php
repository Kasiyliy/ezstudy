<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\WebBaseController;

class FrontController extends WebBaseController
{
    public function index()
    {
        return view('front.index');
    }

    public function about()
    {
        return view('front.about');
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function services()
    {
        return view('front.services');
    }

    public function team()
    {
        return view('front.team');
    }
}
