<?php

namespace Ecommerce\Backend\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Ecommerce\Backend\Controllers\Admin\Order\Models\Order;
use Ecommerce\Backend\Controllers\Admin\Product\Models\Product;
use Ecommerce\Backend\Controllers\Admin\Reviews\Models\ProductReview;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function dashboard()
    {
        $todaysOrder = Order::whereDate('created_at', Carbon::today())->whereHas('orderProducts', function($query){
            $query->where('vendor_id', Auth::user()->vendor->id);
        })->count();
        $todaysPendingOrder = Order::whereDate('created_at', Carbon::today())
            ->where('order_status', 'pending')
            ->whereHas('orderProducts', function($query){
                $query->where('vendor_id', Auth::user()->vendor->id);
            })->count();
        $totalOrder = Order::whereHas('orderProducts', function($query){
            $query->where('vendor_id', Auth::user()->vendor->id);
        })->count();
        $totalPendingOrder = Order::where('order_status', 'pending')
            ->whereHas('orderProducts', function($query){
                $query->where('vendor_id', Auth::user()->vendor->id);
            })->count();
        $totalCompleteOrder = Order::where('order_status', 'delivered')
            ->whereHas('orderProducts', function($query){
                $query->where('vendor_id', Auth::user()->vendor->id);
            })->count();
        $totalProducts = Product::where('vendor_id', Auth::user()->vendor->id)->count();

        $todaysEarnings = Order::where('order_status', 'delivered')
            ->where('payment_status',1)
            ->whereDate('created_at', Carbon::today())
            ->whereHas('orderProducts', function($query){
                $query->where('vendor_id', Auth::user()->vendor->id);
            })->sum('sub_total');

        $monthEarnings = Order::where('order_status', 'delivered')
            ->where('payment_status',1)
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereHas('orderProducts', function($query){
                $query->where('vendor_id', Auth::user()->vendor->id);
            })->sum('sub_total');

        $yearEarnings = Order::where('order_status', 'delivered')
            ->where('payment_status',1)
            ->whereYear('created_at', Carbon::now()->year)
            ->whereHas('orderProducts', function($query){
                $query->where('vendor_id', Auth::user()->vendor->id);
            })->sum('sub_total');


        $toalEarnings = Order::where('order_status', 'delivered')
            ->whereHas('orderProducts', function($query){
                $query->where('vendor_id', Auth::user()->vendor->id);
            })->sum('sub_total');

        $totalReviews = ProductReview::whereHas('product', function($query){
            $query->where('vendor_id', Auth::user()->vendor->id);
        })->count();



        return view('vendor.dashboard.dashboard', compact(
            'todaysOrder',
            'todaysPendingOrder',
            'totalOrder',
            'totalPendingOrder',
            'totalCompleteOrder',
            'totalProducts',
            'todaysEarnings',
            'monthEarnings',
            'yearEarnings',
            'toalEarnings',
            'totalReviews'
        ));
    }
}
