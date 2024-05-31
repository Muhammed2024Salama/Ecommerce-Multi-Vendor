<?php

namespace Ecommerce\Frontend\Controllers;

use App\Http\Controllers\Controller;
use Ecommerce\Backend\Controllers\Admin\FlashSale\Models\FlashSale;
use Ecommerce\Backend\Controllers\Admin\FlashSale\Models\FlashSaleItem;

class FlashSaleController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        $flashSaleDate = FlashSale::first();
        $flashSaleItems = FlashSaleItem::where('status', 1)->orderBy('id', 'ASC')->pluck('product_id')->toArray();
        return view('frontend.pages.flash-sale', compact('flashSaleDate', 'flashSaleItems'));
    }
}
