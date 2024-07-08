<?php

namespace Ecommerce\Backend\Controllers\Admin;

use App\Http\Controllers\Controller;
use Ecommerce\Backend\Controllers\Admin\Blog\Models\Blog;
use Ecommerce\Backend\Controllers\Admin\Brand\Models\Brand;
use Ecommerce\Backend\Controllers\Admin\Category\Models\Category;
use Ecommerce\Backend\Controllers\Admin\Order\Models\Order;
use Ecommerce\Backend\Controllers\Admin\Reviews\Models\ProductReview;
use Ecommerce\Frontend\Models\NewsletterSubscriber;
use Ecommerce\Frontend\Models\User;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function dashboard()
    {
        $todaysOrder = Order::whereDate('created_at', Carbon::today())->count();
        $todaysPendingOrder = Order::whereDate('created_at', Carbon::today())
            ->where('order_status', 'pending')->count();
        $totalOrders = Order::count();
        $totalPendingOrders = Order::where('order_status', 'pending')->count();
        $totalCanceledOrders = Order::where('order_status', 'canceled')->count();
        $totalCompleteOrders = Order::where('order_status', 'delivered')->count();

        $todaysEarnings = Order::where('order_status','!=', 'canceled')
            ->where('payment_status',1)
            ->whereDate('created_at', Carbon::today())
            ->sum('sub_total');

        $monthEarnings = Order::where('order_status','!=', 'canceled')
            ->where('payment_status',1)
            ->whereMonth('created_at', Carbon::now()->month)
            ->sum('sub_total');

        $yearEarnings = Order::where('order_status','!=', 'canceled')
            ->where('payment_status',1)
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('sub_total');

        $totalReview = ProductReview::count();

        $totalBrands = Brand::count();
        $totalCategories = Category::count();
        $totalBlogs = Blog::count();
        $totalSubscriber = NewsletterSubscriber::count();
        $totalVendors = User::where('role', 'vendor')->count();
        $totalUsers = User::where('role', 'user')->count();



        return view('admin.dashboard', compact(
            'todaysOrder',
            'todaysPendingOrder',
            'totalOrders',
            'totalPendingOrders',
            'totalCanceledOrders',
            'totalCompleteOrders',
            'todaysEarnings',
            'monthEarnings',
            'yearEarnings',
            'totalReview',
            'totalBrands',
            'totalCategories',
            'totalBlogs',
            'totalSubscriber',
            'totalVendors',
            'totalUsers'
        ));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function login()
    {
        return view('admin.auth.login');
    }
}
