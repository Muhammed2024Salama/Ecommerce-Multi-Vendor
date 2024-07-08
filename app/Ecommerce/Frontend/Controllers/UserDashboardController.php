<?php

namespace Ecommerce\Frontend\Controllers;

use App\Http\Controllers\Controller;
use Ecommerce\Backend\Controllers\Admin\Order\Models\Order;
use Ecommerce\Backend\Controllers\Admin\Reviews\Models\ProductReview;
use Ecommerce\Frontend\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        $totalOrder = Order::where('user_id', Auth::user()->id)->count();
        $pendingOrder = Order::where('user_id', Auth::user()->id)
            ->where('order_status', 'pending')->count();
        $completeOrder = Order::where('user_id', Auth::user()->id)
            ->where('order_status', 'delivered')->count();
        $reviews = ProductReview::where('user_id', Auth::user()->id)->count();
        $wishlist = Wishlist::where('user_id', Auth::user()->id)->count();

        return view('frontend.dashboard.dashboard', compact(
            'totalOrder',
            'pendingOrder',
            'completeOrder',
            'reviews',
            'wishlist'
        ));
    }
}
