<?php

namespace Ecommerce\Frontend\Controllers;

use App\Http\Controllers\Controller;

class UserDashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        return view('frontend.dashboard.dashboard');
    }
}
