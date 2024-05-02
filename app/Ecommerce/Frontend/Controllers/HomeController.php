<?php

namespace Ecommerce\Frontend\Controllers;

use App\Http\Controllers\Controller;
use Ecommerce\Backend\Controllers\Admin\Slider\Models\Slider;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        $sliders = Slider::where('status' , 1)->orderBy('serial' , 'asc')->get();
        // dd($sliders)
        return view('frontend.home.home' ,
            compact(
                'sliders'
            ));
    }
}
