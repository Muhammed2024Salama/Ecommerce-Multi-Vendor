<?php

namespace Ecommerce\Frontend\Controllers;

use App\Http\Controllers\Controller;
use Ecommerce\Backend\Controllers\Admin\Order\Models\Order;
use Illuminate\Http\Request;

class ProductTrackController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index(Request $request)
    {
        if($request->has('tracker')){
            $order = Order::where('invocie_id', $request->tracker)->first();

            return view('frontend.pages.product-track', compact('order'));
        }else {
            return view('frontend.pages.product-track');
        }
    }
}
