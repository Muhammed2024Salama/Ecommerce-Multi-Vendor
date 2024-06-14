<?php

namespace Ecommerce\Frontend\Controllers;

use App\Http\Controllers\Controller;
use Ecommerce\Backend\Controllers\Admin\Brand\Models\Brand;
use Ecommerce\Backend\Controllers\Admin\FlashSale\Models\FlashSale;
use Ecommerce\Backend\Controllers\Admin\FlashSale\Models\FlashSaleItem;
use Ecommerce\Backend\Controllers\Admin\Slider\Models\Slider;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        $sliders = Cache::rememberForever('sliders', function(){
            return Slider::where('status', 1)->orderBy('serial', 'asc')->get();
        });

        $flashSaleDate = FlashSale::first();

        $flashSaleItems = FlashSaleItem::where('show_at_home', 1)->where('status', 1)->pluck('product_id')->toArray();

        $brands = Brand::where('status', 1)->where('is_featured', 1)->get();



        return view('frontend.home.home',
            compact(
                'sliders',
                'flashSaleDate',
                'flashSaleItems',
                'brands',
            ));
    }
}
