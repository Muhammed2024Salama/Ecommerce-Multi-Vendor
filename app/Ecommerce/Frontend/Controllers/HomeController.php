<?php

namespace Ecommerce\Frontend\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.home.home');
    }
}
